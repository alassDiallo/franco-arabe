@extends('directeurs.template')
@section('page')
<div class="card card-info form">
    <div class="card-header">
        Ajouter un Surveillant
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('surveillant.store') }}" id="form">
            @csrf
        <div class="row">
        <div class="form-group col-lg-6">
            <label for="nom">nom *</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="nom" placeholder="entrer le le nom de l'éléve" class="form-control @error('nom') is-invalid @enderror" value="{{ $eleve->nom ?? old('nom') }}" />
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
        <input type="text" name="prenom" placeholder="entrer le prenom de l'éléve" class="form-control @error('prenom') is-invalid @enderror" value="{{ $eleve->prenom ?? old('prenom') }}" />
    </div>
    @error('prenom')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
    </div>

    </div>

<div class="row">
    <div class="form-group col-lg-6">
        <label for="adresse">Adresse*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" name="adresse" placeholder="entrer l'adresse de l'éléve" class="form-control @error('adresse') is-invalid @enderror" value="{{ ($eleve->adresse) ?? old('adresse') }}" />
    </div>
    @error('adresse')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
</div>
<div class="form-group col-lg-6">
    <label for="profil">Sexe*</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select class="form-control @error('sexe') is-invalid @enderror" name="sexe" value="{{ $eleve->sexe ?? old('sexe') }}">
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
            <input type="text" name="telephone" maxlength='9' placeholder="entrer le le numero de téléphone de l'éléve" class="form-control @error('telephone') is-invalid @enderror" value="{{ ($eleve->telephone) ?? old('telephone') }}" />
    </div>
    @error('telephone')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
</div>
</div>
<input type="submit"  name="valider" value="Enregister le surveillant" role="button" class="btn btn-primary form-control"/>
</form>
</div>
@endsection
