@extends('profs.accueil')
@section('contenu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <img src="/img/{{ Auth::user()->photo }}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px">
            <h4>Profil de {{ $prof->prenom.'  '.$prof->nom }}</h4>
            <form enctype="multipart/form-data" action="{{ route('modifierProfil') }}" method="POST">
                @csrf
                <label>Modifier la photo de profil</label>
                <input type="file" name='profil' class="file-control">
                <input type="submit" name="valider" value="modifier" class="pull-right btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
