@extends('directeurs.template')
@section('page')
<div class="container">
    <h1 class="text-center">Nombre d'{{ Str::plural('eleve',$eleves->count()) }} : {{ $eleves->count() }}</h1>
    <div class="">
        <div class="mt-4">
        @foreach(App\Models\Classe::all() as $classes)
       <a href="{{ route('eleve.index',['classe'=>$classes->nomClasse,'anneeScolaire'=>request()->anneeScolaire])}}" class="btn btn-lg btn-info mt-4 mb-4"> {{ $classes->nomClasse   }}</a>
        @endforeach
        </div>
<a  href="{{ route('eleve.create') }}"class="btn btn-success mb-4"><i class="fa fa-plus"></i>Ajouter eleve</a>

</div>
<div class="card">
    <div class="card-header">
        <h4>Liste des Eleves de {{ request()->classe ?? " l' ecole" }}</h4>
    </div>
    <div class="card-body">
@if(! $eleves->isEmpty())
<table class="table table-stripped table text-center">
    <thead>
    <tr>
        <td>N</td>
        <th>nom utilisateur</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Date de Naissance</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
@foreach($eleves as $eleve)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $eleve->nomUtilisateur }}</td>
    <td>{{ $eleve->prenom }}</td>
    <td>{{ $eleve->nom }}</td>
    <td>{{ $eleve->dateDeNaissance->format('d/m/Y') }}</td>
<td><a href="{{ route('eleve.show',['eleve'=>$eleve]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye">Voir</i></a></td>
<td><a href="{{ route('eleve.edit',['eleve'=>$eleve]) }}" class="btn btn-success"><i class="fa fa-edit ">Modifier</i></a></td>
<td><form action="{{ route('eleve.destroy',['eleve'=>$eleve]) }}" method="POST" onSubmit="return confirm('etes-vous de vouloire delete cet eleve');">
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger" value="Supprimer"><i class="fa fa-trash"></i></button>
    </form>
</td>
</tr>
@endforeach
    </tbody>
</table>
{{ $eleves->appends(request()->input())->links() }}
@else
<div class="col-lg-12 alert">
<h1>{{ __('Cette classe ne contient pas d\'Eleve ') }}</h1>
</div>
@endif
</div>
</div>
</div>
@endsection
