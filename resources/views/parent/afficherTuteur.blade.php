@extends('directeurs.template')
@section('page')
<div class="container">
<h1>Nombre d' {{ Str::plural('éléve',$tuteur->eleves->count()) }} : {{ $tuteur->eleves->count() }}</h1>
</div>
<div class="">
    @if(session()->has('notification.message'))
    <div class="alert alert-{{ session('notification.type') }}">
            {{ session()->get('notification.message') }}
         </div>
         @endif
         @if(! $tuteur->eleves->isEmpty())
<table class="table table-stripped table-bordered text-center">
    <thead>
    <tr>
        <th>Nom Utilisateur</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>date de naissace et Lieu de naissance</th>
        <th colspan="3">Afficher notes</th>
    </tr>
    </thead>
    <tbody>
@foreach($tuteur->eleves as $eleve)
<tr>
    <td>{{ $eleve->nomUtilisateur }}</td>
    <td>{{ $eleve->nom }}</td>
    <td>{{ $eleve->prenom }}</td>
<td>{{ ($eleve->dateDeNaissance)->format('d/m/Y') }} à {{ $eleve->lieuDeNaissance }}</td>
<td><a href="{{ route('eleve.show',['eleve'=>$eleve]) }}" class="btn btn-info btn-xs">semestre 1</a></td>
<td><a href="{{ route('eleve.show',['eleve'=>$eleve]) }}" class="btn btn-success">semestre 2</a></td>
</td>
</tr>
@endforeach
    </tbody>
</table>
@else
<div class="col-lg-12 alert alert-success">
<h1>{{ __('Aucun tuteur ') }}</h1>
</div>
@endif
</div>
@endsection
