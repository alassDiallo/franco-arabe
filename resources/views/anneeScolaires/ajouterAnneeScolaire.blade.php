@extends('directeurs.template')
@section('page')
<div class="ajout col-lg-6">
<div class="card card-info">
    <div class="card-header">
        Ajouter une Annee Scolaire
    </div>
    <div class="card-body">
    <form action="{{ route('anneeScolaire.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="anneeDebut">Annee Debut*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
        <input type="text" name="anneeDebut" placeholder="entrer l'annee de debut scolaire" class="form-control @error('anneeDebut') is-invalid @enderror" value="{{ old('anneeDebut')}}"/>
    </div>
    @error('anneeDebut')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
    </div>
    <div class="form-group">
        <label for="anneeFin">Annee Fin*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <input type="text" name="anneeFin" placeholder="entrer l'annee de fin scolaire" class="form-control @error('anneeFin') is-invalid @enderror" value="{{ old('anneeFin')}}"/>
    </div>
    @error('anneeFin')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
    </div>
<input type="submit"  name="valider" value="ajouter l'année scolaire" role="button" class="btn btn-primary form-control"/>
</form>
    </div>
    @endsection
