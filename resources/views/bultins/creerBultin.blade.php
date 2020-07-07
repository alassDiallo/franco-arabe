@extends('directeurs.template')
@section('page')

<div class="">
         <div>
         @foreach(App\Models\Classe::all() as $classes)
        <a href="{{ route('bultin.create',['classe'=>$classes->nomClasse,'anneeScolaire'=>annee()])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
         @endforeach
         </div>
         <div class="container text-center bg-primary" style="color:white;">
             <hr>
            <h4>Nom classe : {{ $classe->nomClasse }}  Nombre d'{{ Str::plural('eleve',$classe->eleves()->count()) }} : {{ $classe->eleves()->count() }}</h4>
        <hr>
        </div>
         <div>

    </div>
@if(! $classe->eleves()->where('anneeScolaire',$anneeScolaire)->get()->isEmpty())
<table class="table table-stripped table-bordered text-center">
    <thead>
    <tr>
        <th>nom utilisateur</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Date de Naissance</th>
        <th colspan="2">Creer Bultin</th>
    </tr>
    </thead>
    <tbody>
@foreach($classe->eleves as $eleve)
<tr>
    <td>{{ $eleve->nomUtilisateur }}</td>
    <td>{{ $eleve->prenom }}</td>
    <td>{{ $eleve->nom }}</td>
    <td>{{ $eleve->dateDeNaissance->format('d/m/Y') }}</td>
<td><a href="{{ route('bultin.show',['bultin'=>$eleve->nomUtilisateur,'semestre'=>'s1','anneeScolaire'=>$anneeScolaire,'classe'=>$classe->nomClasse]) }}" class="btn btn-info btn-xs {{ verifBultin($eleve->nomUtilisateur,$anneeScolaire,'s1')}}"><i class="fa fa-eye">Semestre1</i></a></td>
    <td><a href="{{ route('bultin.show',['bultin'=>$eleve->nomUtilisateur,'semestre'=>'s2','anneeScolaire'=>$anneeScolaire,'classe'=>$classe->nomClasse]) }}" class="btn btn-success {{ verifBultin($eleve->nomUtilisateur,$anneeScolaire,'s2')}}"><i class="fa fa-edit ">Semestre2</i></a></td>
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
