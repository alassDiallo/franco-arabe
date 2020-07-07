@extends('directeurs.template')
@section('page')
<div class="card card-info form">
    <div class="card-header">
        Ajouter un eleve
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('eleve.store') }}" id="form" enctype="multipart/form-data"  class="">
        @csrf
        @include('utilisateur._form',['validation'=>'Enregistre'])
@endsection
@section('formulaire')
<script>
    var nouveau = "<hr><div class='col-lg-12'>Information tuteur<hr/></div><div class='row'><div class='form-group col-lg-6'><label for='nomTuteur'>nom tuteur *</label><div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-book'></i></span><input type='text' maxlength='20' name='nomTuteur' placeholder='entrer le  nom du tuteur' class='form-control @error('nomTuteur') is-invalid @enderror' value='{{ $eleve->tuteur->nom ?? old('nomTuteur') }}' /></div>@error('nomTuteur')<span class='helper' role='alert'>{{ $message }}</span>@enderror</div><div class='form-group col-lg-6'><label for='prenomTuteur'>prenom Tuteur*</label><div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-book'></i></span><input type='text' maxlength='50' name='prenomTuteur' placeholder='entrer le prenom du tuteur' class='form-control @error('prenomTuteur') is-invalid @enderror' value='{{ $eleve->tuteur->prenom ?? old('prenomTuteur') }}' /></div>@error('prenomTuteur')<p class='helper helper-danger'>{{ $message }}</p>@enderror</div></div><div class='form-group'><label for='telephoneTuteur'>telephone Tuteur*</label><div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-book'></i></span><input type='text' maxlength='9' name='telephoneTuteur' placeholder='entrer le numero de telephone du tuteur' class='form-control @error('telephoneTuteur') is-invalid @enderror' value='{{ ($eleve->tuteur->telephoneTuteur) ?? old('telephoneTuteur') }}' /></div>@error('telephoneTuteur')<span class='helper helper-danger'>{{ $message }}</span>@enderror</div>";
    var ancien = "<hr><div class='col-lg-12'>Information tuteur<hr/></div><div class='row'><div class='form-group col-lg-12'><label for='numeroTuteur'>numero de Telephone ou nom Utilisateur du tuteur *</label><div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-book'></i></span><input type='text' name='numeroTuteur' placeholder='entrer le  numero du tuteur' maxlength='9' class='form-control @error('numeroTuteur') is-invalid @enderror' value='{{ old('numeroTuteur') }}' required/></div>@error('numeroTuteur')<span class='helper' role='alert'>{{ $message }}</span>@enderror</div>";
    function Monchoix(){
    var choix = document.getElementById("choix").value;
    if(choix == "ancien"){
        document.getElementById("demo").innerHTML = ancien;
    }
    else{
    document.getElementById("demo").innerHTML = nouveau;
    }
    }



</script>
@endsection



