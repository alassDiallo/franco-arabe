@extends('directeurs.template')
@section('page')
<div class="card card-info form">
    <div class="card-header">
        Ajouter un Professeur
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('professeur.store') }}" id="form"  class="">
        @csrf
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="nom">nom *</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="nom" maxlength="20" placeholder="entrer le le nom de l'éléve" class="form-control @error('nom') is-invalid @enderror" value="{{ $professeur->nom ?? old('nom') }}" />
</div>
@error('nom')
        <span class="helper" role="alert">
           {{ $message }}
        </span>
 @enderror

</div>

    <div class="form-group col-lg-6">
        <label for="nom">prenom *</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
        <input type="text" name="prenom" placeholder="entrer le prenom de l'éléve" maxlength="50" class="form-control @error('prenom') is-invalid @enderror" value="{{ $professeur->prenom ?? old('prenom') }}" />
    </div>
    @error('prenom')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
    </div>
<div class="row">
    <div class="form-group col-lg-6">
        <label for="adresse">Adresse*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" maxlength="30" name="adresse" placeholder="entrer l'adresse de l'éléve" class="form-control @error('adresse') is-invalid @enderror" value="{{ ($professeur->adresse) ?? old('adresse') }}" />
    </div>
    @error('adresse')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
<div class="form-group col-lg-6">
    <label for="profil">Sexe*</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select class="form-control @error('sexe') is-invalid @enderror" name="sexe" value="{{ $professeur->sexe ?? old('sexe') }}">
        <option value="">--selectionner--</option>
        <option  {{ old('sexe')=="homme"?"selected":"" }}>homme</option>
        <option {{ old('sexe')=="femme"?"selected":"" }}>femme</option>
    </select>
</div>
@error('sexe')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
</div>
</div>
<div class="row">
<div class="form-group col-lg-12">
        <label for="telephone">telephone*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" name="telephone" maxlength="9" placeholder="entrer le le numero de téléphone de l'éléve" class="form-control @error('telephone') is-invalid @enderror" value="{{ ($professeur->telephone) ?? old('telephone') }}" />
    </div>
    @error('telephone')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
    </div>
    <div class="form-group col-lg-12 ml-4">
    <fieldset>
    <legend>Choisir les matieres Enseigner</legend>
    <h6>Matiere français</h6>
    <div class="row">

            @foreach($matieres->whereNull('nomArabe') as $matiere)
            <div class="custom-control custom-checkbox col-lg-4 ml-2">
            <input type="checkbox" class="custom-control-input" id="{{ $matiere->reference }}" name="matiere[]" value="{{  $matiere->reference }}">
            <label class="custom-control-label" for="{{ $matiere->reference }}">{{ $matiere->nomMatiere }}</label>
            </div>
          @endforeach
        </div>
        <h6>Matieres Arabes</h6>
        <div class="row">

            @foreach($matieres->whereNotNull('nomArabe') as $matiere)
            <div class="custom-control custom-checkbox col-lg-4 ml-2">
            <input type="checkbox" class="custom-control-input" id="{{ $matiere->reference }}" name="matiere[]" value="{{  $matiere->reference }}">
            <label class="custom-control-label" for="{{ $matiere->reference }}">{{ $matiere->nomMatiere }}-{{ $matiere->nomArabe }}</label>
            </div>
          @endforeach
        </div>
    </fieldset>
        </div>
        @error('matiere')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
</div>
    <input type="submit"  name="valider" value="Enregistrer le professeur" role="button" class="btn btn-primary form-control"/>
</form>
</div>
</div>
@endsection
