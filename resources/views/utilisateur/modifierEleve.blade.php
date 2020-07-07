@extends('directeurs.template')
@section('page')
<div class="card card-info form">
    <div class="card-header">
        Modifier  un eleve
    </div>
    <div class="card-body">
<form method="POST" action="{{ route('eleve.update',['eleve'=>$eleve]) }}" id="form">
        @csrf
        {{ method_field('PUT') }}
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="nom">nom *</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="nom" maxlength="20" placeholder="entrer le le nom de l'éléve" class="form-control @error('nom') is-invalid @enderror" value="{{ $eleve->nom ?? old('nom') }}" />
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
        <input type="text" name="prenom" placeholder="entrer le prenom de l'éléve" maxlength="50" class="form-control @error('prenom') is-invalid @enderror" value="{{ $eleve->prenom ?? old('prenom') }}" />
    </div>
    @error('prenom')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
    </div>
<div class="row">
    <div class="form-group col-lg-6">
        <label for="nom">date de naissance *</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
        <input type="date" name="dateDeNaissance" placeholder="" class="form-control @error('dateDeNaissance') is-invalid @enderror" value="{{ $eleve->dateDeNaissance ?? old('dateDeNaissance') }}"/>
    </div>
    @error('dateDeNaissance')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
    <div class="form-group col-lg-6">
        <label for="nom">lieu de naissance *</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" maxlength="20" name="lieudenaissance" placeholder="entrer le lieu de naissance de l'éléve" class="form-control @error('lieudenaissance') is-invalid @enderror" value="{{ ($eleve->lieuDeNaissance) ?? old('lieudenaissance') }}" />
</div>
@error('lieudenaissance')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
</div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        <label for="adresse">Adresse*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" maxlength="30" name="adresse" placeholder="entrer l'adresse de l'éléve" class="form-control @error('adresse') is-invalid @enderror" value="{{ ($eleve->adresse) ?? old('adresse') }}" />
    </div>
    @error('adresse')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
<div class="form-group col-lg-6">
        <label for="telephone">telephone*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" name="telephone" maxlength="9" placeholder="entrer le le numero de téléphone" class="form-control @error('telephone') is-invalid @enderror" value="{{ $eleve->telephone ?? old('telephone') }}" />
    </div>
    @error('telephone')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
    </div>
</div>
<h3>Tuteur</h3><hr>
<div class="row">
    <div class="form-group col-lg-4">
        <label for="nomTuteur">nom*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" maxlength="30" name="nomTuteur" placeholder="entrer nom du tuteur de l'éléve" class="form-control @error('nomTuteur') is-invalid @enderror" value="{{ ($eleve->tuteur()->first()->nom) ?? old('nomTuteur') }}" disabled/>
    </div>
    @error('nomTuteur')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
<div class="form-group col-lg-4">
        <label for="prenomTuteur">prenom</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" name="prenomTuteur" maxlength="9" placeholder="entrer le le numero de prenom du tuteur l'éléve" class="form-control @error('prenomTuteur') is-invalid @enderror" value="{{ $eleve->tuteur()->first()->prenom ?? old('prenomTuteur') }}" disabled/>
    </div>
    @error('prenomTuteur')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
    <div class="form-group col-lg-4">
        <label for="telephoneTuteur">telephone*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" name="telephoneTuteur" maxlength="9" placeholder="entrer le le numero de téléphone du tuteur l'éléve" class="form-control @error('telephoneTuteur') is-invalid @enderror" value="{{ $eleve->tuteur()->first()->telephoneTuteur ?? old('telephoneTuteur') }}" disabled/>
    </div>
    @error('telephoneTuteur')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>

</div>
<input type="submit"  name="valider" value="Modifier" role="button" class="btn btn-primary form-control"/>
</div>
</form>
</div>
    </div>
@endsection
