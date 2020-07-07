@extends('directeurs.template')
@section('page')
@if(session()->has('message'))
    <span class="helper helper-danger">{{ session()->get('message') }}</span>
@endif
<div class="ajout col-lg-6">
<div class="card card-info">
    <div class="card-header">
        Affecrter un Surveillant à un ou plusieurs classe(s)
    </div>
    <div class="card-body">
<form action="{{ route('surveille') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nomUtilisateur">Identifiant du surveillant</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="nomUtilisateur" placeholder="entrer l'identifiant du surveillant" class="form-control @error('nomUtilisateur') is-invalid @enderror" value="{{ old('nomUtilisateur') }}" maxlength="9"/>
    </div>
    @error('nomUtilisateur')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
</div>
    <div class="form-group ml-3">
    <fieldset>
    <legend>Choisir le(s) classe(s)</legend>
        <div class="row">
            @foreach(App\Models\Classe::all() as $classes)
            <div class="custom-control custom-checkbox col-lg-4">
            <input type="checkbox" class="custom-control-input" id="{{ $classes->nomClasse }}" name="classe[]" value="{{  $classes->nomClasse }}"  {{ old('classe')== $classes->nomClasse?'checked':''}}>
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
@endsection
