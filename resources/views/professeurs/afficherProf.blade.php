@extends('directeurs.template')
@section('page')

<div>
    <ul class="nav nav-pills mb-3 ml-4" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Information Professeur</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Matiere enseignée(s)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-matiere-tab" data-toggle="pill" href="#pills-matiere" role="tab" aria-controls="pills-matiere" aria-selected="false">Classes professeur</a>
      </li>
    </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="row ml-4">
<table class="table col-lg-4">
    <caption>Information Professeur</caption>
    </tr>
    <tr>
<td>nom : </td>
<td>{{ $professeur->nom }}</td>
    </tr>
    <tr>
<td>prenom : </td>
<td>{{ $professeur->prenom }}</td>
    </tr>
    <tr>
<td>adresse : </td>
<td>{{ $professeur->adresse }}</td>
    </tr>
    <tr>
<td>telephone : </td>
<td>{{ $professeur->telephone }}</td>
    </tr>
    <tr>
<td>nom d'Utilisateur : </td>
<td>{{ $professeur->nomUtilisateur }}</td>
    </tr>
</table>
    </div>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <table class="table table-bordered col-lg-6 text-center">
    <caption>Matiere enseigné par  {{ nomination($professeur->sexe) }} <strong>{{ $professeur->prenom }} {{ $professeur->nom }}</strong></caption>
    <thead>
        <th>Nom Matiere</th>
    </thead>
    <tbody>
        @foreach ($professeur->matieres as $prof)
    <tr>
        <td>{{ $prof->nomMatiere }}-{{ $prof->nomArabe }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
      </div>
      <div class="tab-pane fade" id="pills-matiere" role="tabpanel" aria-labelledby="pills-matiere-tab">
        <table class="table table-bordered col-lg-6 text-center">
            <caption>Classe enseigné par  {{ nomination($professeur->sexe) }} <strong>{{ $professeur->prenom }} {{ $professeur->nom }}</strong></caption>
            <thead>
                <th>Classe</th>
                <th>Matiere enseigner</th>
                <th>Année Scolaire</th>
            </thead>
            <tbody>
                @foreach ($professeur->classes as $prof)
            <tr>
                <td>{{ $prof->nomClasse }}</td>
                <td>{{ App\Models\Matiere::where('reference',$prof->pivot->matiere)->first()->nomMatiere.' '.App\Models\Matiere::where('reference',$prof->pivot->matiere)->first()->nomArabe }}</td>
                <td>{{ $prof->pivot->anneeScolaire }}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
      </div>
</div>
</div>
@endsection
