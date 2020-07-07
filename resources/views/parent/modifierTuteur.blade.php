@extends('directeurs.template')
@section('page')
<div class="ajout col-lg-6">
    <div class="card card-info">
        <div class="card-header">
            Modifier le Tuteur
            </div>
        <div class="card-body">
<form method="POST" action="{{ route('tuteur.update',['tuteur'=>$tuteur]) }}" id="form">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nom">Nom Tuteur</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="nomTuteur" placeholder="entrer le nom du tuteur" class="form-control @error('nomTuteur') is-invalid @enderror mt-2" value="{{ $tuteur->nom ?? old('nomClasse') }}" />
    </div>
    </div>
    @error('nomTuteur')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
    <div class="form-group">
        <label for="montantInscription">Prenom Tuteur</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="prenomTuteur" placeholder="entrer le prenom du tuteur" class="form-control @error('prenomTuteur') is-invalid @enderror" value="{{ $tuteur->prenom ?? old('prenomTuteur') }}" />
    </div>
    </div>
    @error('prenomTuteur')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror

    <div class="form-group">
        <label for="mensualite">Telephone Tuteur</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="telephoneTuteur" placeholder="entrer le telephone du tuteur" class="form-control @error('telephoneTuteur') is-invalid @enderror" value="{{ $tuteur->telephoneTuteur ?? old('telephoneTuteur') }}" />
    </div>
    </div>
    @error('telephoneTuteur')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
    <input type="submit"  name="valider" value="modifier le tuteur" role="button" class="btn btn-primary form-control"/>
    </form>
</div>
</div>
@endsection
