@extends('directeurs.template')
@section('page')

<div>
    <ul class="nav nav-pills mb-3 ml-4" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Information du Surveillant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Classe Surveillée(s)</a>
      </li>
    </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="row ml-4">
<table class="table col-lg-6">
    <caption>Information surveillant numero <strong>{{ $surveillant->nomUtilisateur }}</strong></caption>
    <tr>
        <td>nom d'Utilisateur : </td>
        <td>{{ $surveillant->nomUtilisateur }}</td>
            </tr>
    <tr>
<td>nom : </td>
<td>{{ $surveillant->nom }}</td>
    </tr>
    <tr>
<td>prenom : </td>
<td>{{ $surveillant->prenom }}</td>
    </tr>
    <tr>
<td>adresse : </td>
<td>{{ $surveillant->adresse }}</td>
    </tr>
    <tr>
<td>telephone : </td>
<td>{{ $surveillant->telephone }}</td>
    </tr>
</table>
    </div>
      </div>
    <div class="tab-pane fade show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <table class="table table-bordered col-lg-6 text-center">
    <caption>Classe surveillés par <strong>{{ $surveillant->prenom }} {{ $surveillant->nom }}</strong></caption>
    <thead>
        <th>Nom Classe</th>
        <th>Année Scolaire</th>
    </thead>
    <tbody>
@foreach ($surveillant->classes as $classe)
    <tr>
        <td>{{ $classe->nomClasse }}</td>
        <td>{{ $classe->pivot->anneeScolaire }}</td>
    </tr>
@endforeach
    </tbody>
    </table>
</div>
</div>
    </div>
@endsection
