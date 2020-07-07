@extends('directeurs.template')
@section('page')
<div class="ajout col-lg-8">
<div class="card card-info">
    <div class="card-header">
        Ajouter une Matiere
    </div>
    <div class="card-body">
<form action="{{ route('classematiere.store') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="classe">Classe*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <select class="form-control @error('classe') is-invalid @enderror" name="classe">
                <option value="">--selectionner--</option>
                @foreach(App\Models\Classe::all() as $classe)
                    <option {{ old('classe')==$classe->nomClasse? "selected":"" }}> {{ $classe->nomClasse   }}</option>
                @endforeach
            </select>
        </div>
        @error('classe')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
 </div>
<!--<div class="form-group">
    <label for="matiere">Matiere*</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select class="form-control @error('matiere') is-invalid @enderror" name="matiere[]" class="selectpicker" multiple>
        <option value="">--selectionner--</option>
        @foreach($matieres as $matiere)
            <option {{ old('matiere')==$matiere->nomMatiere ? "selected":"" }}> {{ $matiere->nomMatiere   }}</option>
        @endforeach
    </select>
</div>
@error('matiere')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
!-->
<div class="form-group ml-3">
<fieldset>
<legend>Choisir les matieres Français</legend>
    <div class="row">
        @foreach($matieres->whereNull('nomArabe') as $matiere)
        <div class="custom-control custom-checkbox col-lg-4">
        <input type="checkbox" class="custom-control-input" id="{{ $matiere->reference }}" name="matiere[]" value="{{  $matiere->reference }}"  {{ old('matiere')== $matiere->nomMatiere?'checked':''}}>
        <label class="custom-control-label" for="{{ $matiere->reference }}">{{ $matiere->nomMatiere }}</label>
        </div>
      @endforeach
    </div>

</fieldset>
    </div>
    @error('matiere')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
<div class="form-group ml-3">
    <fieldset>
    <legend>Choisir les matieres Arabe</legend>
        <div class="row">
    @foreach($matieres->whereNotNull('nomArabe') as $matiere)
    <div class="custom-control custom-checkbox col-lg-4">
    <input type="checkbox" class="custom-control-input" id="{{ $matiere->reference }}" name="matiere[]" value="{{  $matiere->reference }}"  {{ old('matiere')== $matiere->nomMatiere?'checked':''}}>
    <label class="custom-control-label" for="{{ $matiere->reference }}">{{ $matiere->nomMatiere }}-{{ $matiere->nomArabe }}</label>
    </div>
  @endforeach
    </div>
    </fieldset>
     </div>
        @error('matiere')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
    <input type="submit"  name="valider" value="ajouter les matieres" role="button" class="btn btn-primary form-control"/>
</form>
</div>
</div>
</div>
@endsection
