@extends('directeurs.template')
@section('page')
<h1 class="text-center mt-4 mb-4">Nombre de classe : <strong>{{ $classe->count() }}</strong></h1>
<a  href="#" class="btn btn-primary mt'4 mb-4" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Ajouter une nouvelle classe</a>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Classe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card card-info">
                <div class="card-header">
                    Ajouter une Classe
                    </div>
                <div class="card-body">
                <form method="POST" action="{{ route('classe.store') }}" id="form"  class="">
                    @csrf
                    @include('utilisateur.formClasse',['bouton'=>'enregister la classe'])
                </div>
        </div>
      </div>
    </div>
  </div>
</div>
@if(! $classe->isEmpty())
<table class="table table-striped text-center">
    <thead>
        <th>Nom de la Classe</th>
        <th>Montant de l'inscription</th>
        <th>Mensualité</th>
        <th colspan="3">Action</th>
    </thead>
    </tr>
@foreach($classe as $classe)
<tr>
    <td>{{ $classe->nomClasse }}</td>
    <td>{{ $classe->montantInscription }}</td>
    <td>{{ $classe->mensualite }}</td>
    <td><a class="btn btn-warning" href="{{ route('classe.show',['classe'=>$classe])}}">voir</a></td>
    <td><a class="btn btn-success" href="{{ route('classe.edit',['classe'=>$classe])}}">Modifier</a></td>

    <td><form  action="{{ route('classe.destroy',['classe'=>$classe])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Supprimer" class="btn btn-danger"/>
        </form>
    </td>
</tr>
@endforeach
</table>
@else
{{ __('Aucun classe ') }}
@endif
@endsection
