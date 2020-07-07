@extends('directeurs.template')
@section('page')
<div class="ajout col-lg-6">
<div class="card card-info">
    <div class="card-header">
        Reinscription éléve
    </div>
    <div class="card-body">
<form action="{{ route('inscription.store') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="anneeScolaire">Annee Scolaire*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>

                <input type="text" name="anneeScolaire" value="{{ anneescolaire()}}" class="form-control" disabled/>
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
                @foreach(App\Models\Classe::all() as $classe)
                    <option {{ old('classe')==$classe->nomClasse? "selected":"" }}> {{ $classe->nomClasse   }}</option>
                @endforeach
            </select>
        </div>
        @error('classe')
<span class="helper helper-danger">{{ $message }}</span>
@enderror

    <div class="form-group">
        <label for="nomUtilisateur">Identifiant de l'éléve</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="nomUtilisateur" placeholder="entrer l'identifiant de l'éléve" class="form-control @error('nomUtilisateur') is-invalid @enderror" value="{{ ($eleve->nomUtilisateur) ?? old('nomUtilisateur') }}" />
    </div>
    @error('nomUtilisateur')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="nom">Somme versée*</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="sommeVerse" id="sommeVerse" placeholder="Entere la somme verser a l'inscription" class="form-control @error('sommeVerse') is-invalid @enderror" value="{{ ($inscription->sommeVersee) ?? old('sommeVerse') }}" />
</div>
@error('sommeVerse')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
</div>
    <input type="submit"  name="valider" value="Reinscrire l'éléve" role="button" class="btn btn-primary form-control"/>
</form>
</div>
</div>
</div>
@endsection
