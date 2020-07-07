@extends('directeurs.template')
@section('page')
<!--<style>
    .input-group input{
        border:none;
        border-bottom:1 solid red;
    }
    .input-group{
        width:100%;
        overflow:hidden;
        font-size:20px;
        padding:8px;
        margin:8px 0;
        border-bottom:1px solid red;
    }
    </style>!-->
    <div>
       <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">-->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ajouter matiere Français</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ajouter matiere Arabe</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                Accueil
            </div>
            <div class="tab-pane fade mt-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="ajout col-lg-6">
                    <div class="card card-info">
                        <div class="card-header">
                            Ajouter une Matiere
                        </div>
                        <div class="card-body">
                    <form action="{{ route('matiere.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="nomMatiere">Matiere*</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <input type="text" class="form-control @error('nomMatiere') is-invalid @enderror" name="nomMatiere" placeholder="entrer le nom de la matiére" value="{{ old('nomMatiere') }}"/>
                            </div>
                            @if(session()->has('message'))
                            <span class="helper helper-danger">{{ session()->get('message') }}</span>
                            @endif
                            @error('nomMatiere')
                        <span class="helper helper-danger">{{ $message }}</span>
                        @enderror
                            </div>
                        <input type="submit"  name="valider" value="ajouter la matiere" role="button" class="btn btn-primary form-control"/>
                    </form>
                    </div>
                    </div>
                    </div>

            </div>
            <div class="tab-pane fade mt-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="ajout col-lg-6">
                    <div class="card card-info">
                        <div class="card-header">
                            Ajouter une Matiere Arabe
                        </div>
                        <div class="card-body">
                    <form action="{{ route('matiereArabe.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="nomFr">Nom En français</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <input type="text" class="form-control" name="nomFr" placeholder="entrer le nom de la matiére en français" value="{{ old('nomFr') }}"/>
                            </div>
                            @if(session()->has('message'))
                            <span class="helper helper-danger">{{ session()->get('message') }}</span>
                            @endif
                            @error('nomFr')
                        <span class="helper helper-danger">{{ $message }}</span>
                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomArabe">Nom en Arabe*</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <input type="text" class="form-control" name="nomArabe" placeholder="entrer le nom de la matiére en Arabe" value="{{ old('nomArabe') }}"/>
                            </div>
                            @if(session()->has('message'))
                            <span class="helper helper-danger">{{ session()->get('message') }}</span>
                            @endif
                            @error('nomArabe')
                        <span class="helper helper-danger">{{ $message }}</span>
                        @enderror
                            </div>
                        <input type="submit"  name="valider" value="ajouter la matiere" role="button" class="btn btn-primary form-control"/>
                    </form>
                    </div>
                    </div>
                    </div>

            </div>
          </div>
    </div>

<!--<div class="ajout col-lg-6">
<div class="card card-info">
    <div class="card-header">
        Ajouter une Matiere
    </div>
    <div class="card-body">
<form action="{{ route('matiere.store') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="nomMatiere">Matiere*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <input type="text" class="form-control" name="nomMatiere" placeholder="entrer le nom de la matiére" value="{{ old('nomMatiere') }}"/>
        </div>
        @if(session()->has('message'))
        <span class="helper helper-danger">{{ session()->get('message') }}</span>
        @endif
        @error('nomMatiere')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
        </div>
    <input type="submit"  name="valider" value="ajouter la matiere" role="button" class="btn btn-primary form-control"/>
</form>
</div>
</div>
</div>-->
@endsection
