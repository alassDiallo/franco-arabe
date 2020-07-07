@extends('directeurs.template')
@section('page')

<div class="">
         <div>
         @foreach(App\Models\Classe::all() as $classes)
        <a href="{{ route('bultin.create',['class'=>$classes->nomClasse,'anneeScolaire'=>annee()])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
         @endforeach
         </div>
         <div class="container text-center bg-primary" style="color:white;">
             <hr>
            <h4>Nom classe : {{ $classe->nomClasse }}  Nombre d'{{ Str::plural('eleve',$classe->eleves()->where('anneeScolaire',annee())->count()) }} : {{ $classe->eleves()->where('anneeScolaire',annee())->count() }}</h4>
        <hr>
        </div>
         <div>

    </div>
@if(! $classe->eleves()->where('anneeScolaire',annee())->get()->isEmpty())
<table class="table table-stripped table-bordered text-center">
    <thead>
    <tr>
        <th>nom utilisateur</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Date de Naissance</th>
        <th colspan="2">Afficher Bultin Eleve</th>
    </tr>
    </thead>
    <tbody>
    @foreach($classe->eleves as $eleve)
    <tr>
    <td>{{ $eleve->nomUtilisateur }}</td>
    <td>{{ $eleve->prenom }}</td>
    <td>{{ $eleve->nom }}</td>
    <td>{{ $eleve->dateDeNaissance->format('d/m/Y') }}</td>
    <td><a href="{{ route('bultin.afficher',['bultin'=>$eleve->nomUtilisateur,'semestre'=>'s1','anneeScolaire'=>annee(),'classe'=>$classe->nomClasse]) }}" class="btn btn-info btn-xs" {{ verifBultinE($eleve->nomUtilisateur,annee(),'s1')}}><i class="fa fa-eye">Semestre1</i></a></td>
    <td><a href="{{ route('bultin.afficher',['bultin'=>$eleve->nomUtilisateur,'semestre'=>'s2','anneeScolaire'=>annee(),'classe'=>$classe->nomClasse]) }}" class="btn btn-success" {{ verifBultinE($eleve->nomUtilisateur,annee(),'s2')}}><i class="fa fa-eye ">Semestre2</i></a></td>
    </tr>
@endforeach
</tbody>
</tbody>
</table>
@else
<div class="col-lg-12">
<h1>{{ __('Cette classe ne contient pas d\'Eleve ') }}</h1>
</div>
@endif
</div>
@endsection
