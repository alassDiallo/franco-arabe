@extends('directeurs.template')
@section('page')
<div class="card card-info form">
    <div class="card-header">
        Modifeir un Surveillant
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('surveillant.update',['surveillant'=>$surveillant]) }}" id="form"  class="">
        @csrf
        @method('put')
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="nom">nom *</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="nom" maxlength="20" placeholder="entrer le le nom du surveillant" class="form-control @error('nom') is-invalid @enderror" value="{{ $surveillant->nom ?? old('nom') }}" />
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
        <input type="text" name="prenom" placeholder="entrer le prenom du surveillant" maxlength="50" class="form-control @error('prenom') is-invalid @enderror" value="{{ $surveillant->prenom ?? old('prenom') }}" />
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
            <input type="text" maxlength="30" name="adresse" placeholder="entrer l'adresse du surveillant" class="form-control @error('adresse') is-invalid @enderror" value="{{ ($surveillant->adresse) ?? old('adresse') }}" />
    </div>
    @error('adresse')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
    </div>
<div class="form-group col-lg-6">
        <label for="telephone">telephone*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
            <input type="text" name="telephone" maxlength="9" placeholder="entrer le le numero de téléphone du surveillant" class="form-control @error('telephone') is-invalid @enderror" value="{{ ($surveillant->telephone) ?? old('telephone') }}" />
    </div>
    @error('telephone')
<p class="helper helper-danger">{{ $message }}</p>
@enderror
    </div>
</div>
    <input type="submit"  name="valider" value="Enregistrer les modification" role="button" class="btn btn-primary form-control"/>
</form>
</div>
</div>
@endsection
