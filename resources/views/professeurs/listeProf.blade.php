@extends('directeurs.template')
@section('page')
<div class="container">
<h1>Nombre de {{ Str::plural('professeur',$professeur->count()) }} : {{ $professeur->count() }}</h1>
</div>
@if(! $professeur->isEmpty())
<table class="table table-stripped table-bordered text-center">
    <thead>
    <tr>
        <th>nom utilisateur</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Sexe</th>
        <th>Telephone</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
@foreach($professeur as $prof)
<tr>
    <td>{{ $prof->nomUtilisateur }}</td>
    <td>{{ $prof->prenom }}</td>
    <td>{{ $prof->nom }}</td>
    <td>{{ $prof->adresse }}</td>
    <td>{{ $prof->sexe }}</td>
    <td>{{ $prof->telephone }}</td>
<td><a href="{{ route('professeur.show',['professeur'=>$prof]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a></td>
<td><a href="{{ route('professeur.edit',['professeur'=>$prof]) }}" class="btn btn-success">Modifier</a></td>
<td><form action="{{ route('professeur.destroy',['professeur'=>$prof]) }}" method="POST" onSubmit="return confirm('etes-vous de vouloire delete cet eleve');">
    @csrf
    {{ method_field('DELETE') }}
    <input type="submit" class="btn btn-danger" value="Supprimer">
    </form>
</td>
</tr>
@endforeach
    </tbody>
</table>
@else
<div class="col-lg-12 mt-2">
<h4>{{ __('Cette ecole ne contient pas de professeur ') }}</h4>
</div>
@endif
</div>
@endsection
