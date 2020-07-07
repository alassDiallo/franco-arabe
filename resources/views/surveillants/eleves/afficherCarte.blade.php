@extends('directeurs.template')
@section('page')
    <div class="row ml-4 container  bb-info border-info ">
        <div class="col-lg-12 text-center">
    <h4>Carte d'identité Scolaire</h4>
        </div>
    <div class="col-lg-3">
            <img src="/img/eleves/{{ $eleve->photo }}"  width="250px" height="250px"  class=""/>
    </div>
    <div class="col-lg-6 container ">
       nom : {{ $eleve->nom }}
       prenom :{{ $eleve->prenom }}
            <br/>
            adresse :{{ $eleve->adresse }}
            Telephone : 
@if($eleve->telephone ==null)
    {{ __('Neant') }}
    @else
    {{ $eleve->telephone }}
    @endif
            <br/>
            nom d'Utilisateur :{{ $eleve->nomUtilisateur }}
            Date de Naissance : {{ $eleve->dateDeNaissance->format('d/m/Y') }}
            <br/>Lieu de Naissance : 
{{ $eleve->lieuDeNaissance }}
            <br/>
@foreach ($eleve->classes as $classes)
Classe {{ $classes->nomClasse }}
Année Scolaire <strong>{{  $classes->pivot->anneeScolaire}}</strong>
   @endforeach
            <br/>
Nom et Prenom tuteur <strong>{{ $eleve->tuteur->prenom }}  {{ $eleve->tuteur->nom }}</strong>
Telephone Tuteur <strong>{{  $eleve->tuteur->telephoneTuteur }}</strong>
            <br/>
    </div>
</div>
</div>
@endsection
