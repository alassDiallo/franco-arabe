@extends('directeurs.template')
@section('page')
<div class="container">
<h1>Nombre de {{ Str::plural('tuteur',$tuteurs->count()) }} : {{ $tuteurs->count() }}</h1>
</div>
<div class="">
         @if(! $tuteurs->isEmpty())
<table class="table table-stripped table-bordered text-center">
    <thead>
    <tr>
        <th>Nom Utilisateur</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Telephone</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
@foreach($tuteurs as $tuteur)
<tr>
    <td>{{ $tuteur->nomUtilisateur }}</td>
    <td>{{ $tuteur->nom }}</td>
    <td>{{ $tuteur->prenom }}</td>
    <td>{{ $tuteur->telephoneTuteur }}</td>
<td><a href="{{ route('tuteur.show',['tuteur'=>$tuteur]) }}" class="btn btn-info btn-xs">voir</a></td>
<td><a href="{{ route('tuteur.edit',['tuteur'=>$tuteur]) }}" class="btn btn-success">Modifier</a></td>
<td><form action="{{ route('tuteur.destroy',['tuteur'=>$tuteur]) }}" method="POST" onSubmit="return confirm('etes-vous de vouloire delete cet eleve');">
    @csrf
    {{ method_field('DELETE') }}
    <input type="submit" class="btn btn-danger" value="Supprimer">
    </form>
</td>
</tr>
@endforeach
    </tbody>
</table>
{{ $tuteurs->appends(request()->input())->links() }}
@else
<div class="col-lg-12 alert alert-success">
<h1>{{ __('Aucun tuteur ') }}</h1>
</div>
@endif
</div>
@endsection
