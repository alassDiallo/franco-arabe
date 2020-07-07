@extends('directeurs.template')
@section('page')
<div class="container">
<h1>Nombre de {{ Str::plural('surveillant',$surveillant->count()) }} : {{ $surveillant->count() }}</h1>
</div>
@if(! $surveillant->isEmpty())
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
@foreach($surveillant as $surveillant)
<tr>
    <td>{{ $surveillant->nomUtilisateur }}</td>
    <td>{{ $surveillant->prenom }}</td>
    <td>{{ $surveillant->nom }}</td>
    <td>{{ $surveillant->adresse }}</td>
    <td>{{ $surveillant->sexe }}</td>
    <td>{{ $surveillant->telephone }}</td>
<td><a href="{{ route('surveillant.show',['surveillant'=>$surveillant]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a></td>
<td><a href="{{ route('surveillant.edit',['surveillant'=>$surveillant]) }}" class="btn btn-success">Modifier</a></td>
<td><form action="{{ route('surveillant.destroy',['surveillant'=>$surveillant]) }}" method="POST" onSubmit="return confirm('etes-vous de vouloire delete cet eleve');">
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
<h4>{{ __('Cette ecole ne contient pas de surveillantesseur ') }}</h4>
</div>
@endif
</div>
@endsection
