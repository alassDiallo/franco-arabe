@extends('directeurs.template')
@section('page')
<div class="container">
<h1>Nombre de {{ Str::plural('matiére',App\Models\Matiere::all()->count()) }} : {{ App\Models\Matiere::all()->count() }}</h1>
</div>
<div class="ml-4">
        <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">-->
             <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
             <li class="nav-item">
               <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" id="matiereFr-tab" data-toggle="tab" href="#matiereFr" role="tab" aria-controls="matiereFr" aria-selected="false">Liste matiere Français</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" id="matiereAr-tab" data-toggle="tab" href="#matiereAr" role="tab" aria-controls="matiereAr" aria-selected="false">Liste matiere Arabe</a>
             </li>
           </ul>
           <div class="tab-content" id="myTabContent">
             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                 Accueil
             </div>
             <div class="tab-pane fade mt-4" id="matiereFr" role="tabpanel" aria-labelledby="matiereFr-tab">
            @if(session()->has('notification.message'))
            <div class="alert alert-{{ session('notification.type') }}">
            {{ session()->get('notification.message') }}
         </div>
            @endif
         <a  href="#"class="btn btn-primary mt'4 mb-4" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Ajouter une nouvelle matiere</a>
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">ajouter une Matiere</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
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
            </div>
          </div>
         @if(! $matiere->isEmpty())
        <table class="table table-inbox table-hover table-striped">
        <thead>
        <tr>
            <th colspan="">Nom Matiere</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        <form action="{{ route('supprimer.matiere')}}" method="POST">
            @csrf
            @method('DELETE')
    @foreach ($matiere as $matiere)
            <tr class="unread text-center">
              <td class="inbox-small-cells">
              <div class="custom-control custom-checkbox col-lg-4">
                <input type="checkbox" class="custom-control-input mr-2" id="{{ $matiere->nomMatiere }}" name="matiere[]" value="{{  $matiere->nomMatiere }}">
                <label class="custom-control-label ml-4" for="{{ $matiere->nomMatiere }}">{{ $matiere->nomMatiere }}</label>
                </div>
              </td>

<td><a href="{{ route('matiere.show',['matiere'=>$matiere]) }}" class="btn btn-info btn-xs">modifier</a></td>
<td><a href="{{ route('matiere.destroy',['matiere'=>$matiere]) }}" class="btn btn-success">supprimer</a></td>
</tr>
@endforeach
<tr>
<td colspan="4"><input type="submit" name="valider" value="supprimer la ou les matiere(s)"class="form-control btn btn-primary"></td>
</tr>
    </form>
    </tbody>
</table>
@else
<div class="col-lg-12 alert alert-success">
<h1>{{ __('Aucun tuteur ') }}</h1>
</div>
@endif
</div>
<div class="tab-pane fade mt-4" id="matiereAr" role="tabpanel" aria-labelledby="matiereAr-tab">
    @if(session()->has('notification.message'))
    <div class="alert alert-{{ session('notification.type') }}">
    {{ session()->get('notification.message') }}
 </div>
    @endif
    <a  href="#"class="btn btn-primary mt'4 mb-4" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Ajouter une nouvelle matiere</a>
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">ajouter une Matiere</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
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
                                <label for="nomAr">Nom en Arabe*</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <input type="text" class="form-control" name="nomAr" placeholder="entrer le nom de la matiére en Arabe" value="{{ old('nomAr') }}"/>
                            </div>
                            @if(session()->has('message'))
                            <span class="helper helper-danger">{{ session()->get('message') }}</span>
                            @endif
                            @error('nomAr')
                        <span class="helper helper-danger">{{ $message }}</span>
                        @enderror
                            </div>
                        <input type="submit"  name="valider" value="ajouter la matiere" role="button" class="btn btn-primary form-control"/>
                    </form>
                </div>
              </div>
            </div>
          </div>
 @if(! $matiereAr->isEmpty())
<table class="table table-inbox table-hover table-striped">
<thead>
<tr>
    <th colspan="">Nom Matiere en Français</th>
    <th colspan="">Nom Matiere en Arabe</th>
    <th colspan="2">Action</th>
</tr>
</thead>
<tbody>
<form action="{{ route('supprimer.matiere')}}" method="POST">
    @csrf
    @method('DELETE')
@foreach ($matiereAr as $matiere)
    <tr class="unread text-center">
      <td class="inbox-small-cells">
      <div class="custom-control custom-checkbox col-lg-4">
        <input type="checkbox" class="custom-control-input mr-2" id="{{ $matiere->nomArabe }}" name="matiere[]" value="{{  $matiere->nomFr }}">
        <label class="custom-control-label ml-4" for="{{ $matiere->nomArabe }}">{{ $matiere->nomMatiere }}</label>
        </div>
      </td>
      <td>
          {{ $matiere->nomArabe }}
      </td>

<td><a href="{{ route('matiere.show',['matiere'=>$matiere]) }}" class="btn btn-info btn-xs">modifier</a></td>
<td><a href="{{ route('matiere.destroy',['matiere'=>$matiere]) }}" class="btn btn-success">supprimer</a></td>
</tr>
@endforeach
<tr>
<td colspan="4"><input type="submit" name="valider" value="supprimer la ou les matiere(s)"class="form-control btn btn-primary"></td>
</tr>
</form>
</tbody>
</table>
@else
<div class="col-lg-12">
<h4>{{ __('Aucun matiere ') }}</h4>
</div>
@endif
</div>
</div></div></div>
@endsection
