@extends('directeurs.template')
@section('page')
@if(session()->has('message'))
    <span class="helper helper-danger">{{ session()->get('message') }}</span>
@endif
@if(session()->has('d'))
<div class="alert alert-success mt-4 mb-4">
    Matiere enseigné par ce professeur :
    @foreach (session()->get('d') as $item)
    {{ $item }}</t>
    @endforeach
</div>
@endif
     <div class="ajout col-lg-6">
            <div class="card card-info">
                <div class="card-header">
                    Affecrter un professeurs à un ou plusieurs classe(s)
                </div>
                <div class="card-body">
            <form action="{{ route('classeProf.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomUtilisateur">Identifiant du professeur</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                <input type="text" name="nomUtilisateur" placeholder="entrer l'identifiant du professeur" class="form-control @error('nomUtilisateur') is-invalid @enderror" value="{{ old('nomUtilisateur') }}" maxlength="9"/>
                </div>
                @error('nomUtilisateur')
            <span class="helper helper-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="matiere">Matiere Enseigné</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <select class="selectpicker form-control @error('matiere') is-invalid @enderror" name="matiere">
                <option value="">--Selectionner--</option>
                @if(! $matiere->isEmpty())
                <optgroup label="Matiere Français">
                    @foreach ($matiere->whereNull('nomArabe') as $matiere)
                    <option  value="{{ $matiere->reference }}">{{ $matiere->nomMatiere }}</option>
                    @endforeach
            </optgroup>
            <optgroup label="Matiere Arabe">
                @foreach ($matiere->whereNotNull('nomArabe')->get() as $matiere)
                <option value="{{ $matiere->reference }}">{{ $matiere->nomMatiere }}-{{ $matiere->nomArabe }}</option>
                @endforeach
        </optgroup>
        @endif
            </select>
            </div>
            @error('matiere')
            <span class="helper helper-danger">{{ $message }}</span>
            @enderror
            </div>
                <div class="form-group ml-3">
                <fieldset>
                <legend>Choisir le(s) classe(s)</legend>
                    <div class="row">
                        @foreach(App\Models\Classe::all() as $classes)
                        <div class="custom-control custom-checkbox col-lg-4">
                        <input type="checkbox" class="custom-control-input" id="{{ $classes->nomClasse }}" name="classe[]" value="{{ $classes->nomClasse }}"  {{ old('classe')== $classes->nomClasse?'checked':''}}>
                        <label class="custom-control-label" for="{{ $classes->nomClasse }}">{{ $classes->nomClasse }}</label>
                        </div>
                      @endforeach
                    </div>
                </fieldset>
                    </div>
                    @error('classe')
                <span class="helper helper-danger">{{ $message }}</span>
                @enderror

                <input type="submit"  name="valider" value="Enregistrer" role="button" class="btn btn-primary form-control"/>
            </form>
            </div>
            </div>
            </div>
    </div>
    @endsection
