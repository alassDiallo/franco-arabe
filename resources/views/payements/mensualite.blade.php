@extends('directeurs.template')
@section('page')
@if(session()->has('message'))
    <span class="helper helper-danger">{{ session()->get('message') }}</span>
@endif
<div class="ajout col-lg-6">
<div class="card card-info">
    <div class="card-header">
        Effectuer un payements de mensuel
    </div>
    <div class="card-body">
<form action="{{ route('mensualite.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="anneeScolaire">Annee Scolaire*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
        <select class="form-control @error('anneeScolaire') is-invalid class="form-control" @enderror" name="anneeScolaire">
            <option value="">--selectionner--</option>
            @foreach($annee as $annee)
            <option {{ old('anneeScolaire')==$annee->anneeDebut-$annee->anneeFin?"selected":""}}>{{ $annee->anneeDebut }}-{{ $annee->anneeFin }}</option>
            @endforeach
        </select>
    </div>
    @error('anneeScolaire')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
    </div>
        <div class="form-group">
            <label for="classe">Classe*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <select class="form-control @error('classe') is-invalid @enderror" name="classe">
                <option value="">--selectionner--</option>
                @foreach($classe as $classe)
                    <option {{ old('classe')==$classe->nomClasse? "selected":"" }}> {{ $classe->nomClasse   }}</option>
                @endforeach
            </select>
        </div>
        @error('classe')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
 </div>

<div class="form-group">
    <label for="nomUtilisateur">Identifiant de l'éléve</label>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
<input type="text" name="nomUtilisateur" placeholder="entrer l'identifiant de l'éléve" class="form-control @error('nomUtilisateur') is-invalid @enderror" value="{{ ($eleve->nomUtilisateur) ?? old('nomUtilisateur') }}" maxlength="9" />
</div>
@error('nomUtilisateur')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
</div>

<div class="form-group ml-3">
    <fieldset>
    <legend>Choisir le(s) mois</legend>
        <div class="row">
            @foreach($mois as $mois)
            <div class="custom-control custom-checkbox col-lg-4">
            <input type="checkbox" class="custom-control-input" id="{{ $mois->nomMois }}" name="mois[]" value="{{  $mois->nomMois }}">
            <label class="custom-control-label" for="{{ $mois->nomMois }}">{{ $mois->nomMois }}</label>
            </div>
          @endforeach
        </div>
    </fieldset>
        </div>
        @error('mois')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
<div class="form-group">
<label for="nom">Somme versée*</label>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
<input type="text" name="sommeVerse" id="sommeVerse" placeholder="Entere la somme verser a l'inscription" class="form-control @error('sommeVerse') is-invalid @enderror" value="{{ ($inscription->sommeVersee) ?? old('sommeVerse') }}" />
</div>
@error('sommeVerse')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
</div>
    <input type="submit"  name="valider" value="Effectuer le payement" role="button" class="btn btn-primary form-control"/>
</form>
</div>
</div>
</div>
@endsection
