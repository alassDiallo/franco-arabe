@extends('directeurs.template')
@section('style')
<style>
</style>
@endsection
@section('page')
<div class="container text-center bg-primary mt-4" style="color:white;">
<h2>Nom Classe : <strong>{{ $classe->nomClasse }}</strong></h2>
</div>
<div>
<ul class="nav nav-pills mb-3 ml-4" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Detail classe</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Liste des Eleves</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-matiere-tab" data-toggle="pill" href="#pills-matiere" role="tab" aria-controls="pills-matiere" aria-selected="false">Liste des Matieres</a>
  </li>
</ul>
</div>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div id="detail" class="ml-4 mt-4">
      <div class="col-md-12" id="status">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="info-box green-bg">
                  <i class="fa fa-users ml-4"></i>
                  <div class="count">{{ $classe->eleves()->where('anneeScolaire',annee())->count() }}</div>
                  <div class="title"><h4>{{ Str::plural('Eleve',$classe->eleves()->where('anneeScolaire',annee())->count())}}</h4>
                    <div class="text-center">
                  {{ $classe->eleves()->where('anneeScolaire',annee())->where('sexe','garçon')->count() }} {{ Str::plural('garçon',$classe->eleves()->where('anneeScolaire',annee())->where('sexe','garçon')->count())}}</div>
                    </div>
                  <div class="text-center">{{ $classe->eleves()->where('anneeScolaire',annee())->where('sexe','fille')->count() }} {{ Str::plural('fille',$classe->eleves()->where('anneeScolaire',annee())->where(['sexe'=>'fille','anneeScolaire'=>annee()])->count())}}</div>
                </div><!--/.info-box-->
              </div><!--/.col-->

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="info-box yellow-bg">
                <i class="fa fa-university ml-4"></i>
                <div class="count">{{ $classe->matieres()->count() }}</div>
                <div class="title"><h4>{{ Str::plural('Matiere',$classe->matieres()->count())}}</h4></div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
              </div><!--/.info-box-->

  </div>
  </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class='card'>
      <div class='card-header'>
          <h4>Liste des Eleves de {{ $classe->nomClasse }}</h4>
      </div>
      <div class='card-body'>
          @if(! $classe->eleves()->where('anneeScolaire',annee())->get()->isEmpty())
          <table class='table table-stripped table text-center'>
              <thead>
                  <tr>
                      <th>N</th>
                      <th>nom utilisateur</th>
                      <th>Prenom</th>
                      <th>Nom</th>
                      <th>Date de Naissance</th>
                      <th colspan='3'>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1; ?>
                  @foreach($classe->eleves()->where('anneeScolaire',annee())->get() as $eleve)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $eleve->nomUtilisateur }}</td>
                      <td>{{ $eleve->prenom }}</td>
                      <td>{{ $eleve->nom }}</td>
                      <td>{{ $eleve->dateDeNaissance->format('d/m/Y') }}</td>
                      <td><a href='{{ route('eleve.show',['eleve'=>$eleve]) }}' class='btn btn-info btn-xs'><i class='fa fa-eye'>Voir</i></a></td>
                      <td><a href='{{ route('eleve.edit',['eleve'=>$eleve]) }}' class='btn btn-success'><i class='fa fa-edit '>Modifier</i></a></td>
                      <td>
                          <form action='{{ route('eleve.destroy',['eleve'=>$eleve]) }}' method='POST' onSubmit='return confirm(\"etes-vous de vouloire delete cet eleve\");'>
                              @csrf{{ method_field('DELETE') }}
                              <button type='submit' class='btn btn-danger' value='Supprimer'>
                                  <i class='fa fa-trash'></i>
                              </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          @else
          <div class='col-lg-12 alert'>
              <h1>{{ __('Cette classe ne contient pas  ') }}</h1>
          </div>@endif</div>
      </div>
  </div>

  <div class="tab-pane fade" id="pills-matiere" role="tabpanel" aria-labelledby="pills-matiere-tab">
    <div class='card'>
      <div class='card-header'>
          <h4>Liste des Matieres de {{ $classe->nomClasse }}</h4>
      </div>
      <div class='card-body'>
    @if(! ($classe->matieres)->isEmpty())
    <table class='table table-striped table-bordered text-center'>
        <thead>
            <tr>
                <th>N</th>
                <th>Nom Matieres</th>
                <th>Coefficient</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $n=1; ?>
        @foreach ($classe->matieres as $matieres)
        <tr>
            <td>{{ $n++ }}</td>
            <td>{{ $matieres->nomMatiere }}{{ $matieres->whereNotNull('nomArabe')? '-'.$matieres->nomArabe:'' }}</td>
            <td>{{ $matieres->pivot->coefficient }}</td>
            <td><form action="{{ route('classematiere.destroy',['classematiere'=>$matieres->id]) }}" method="POST">
            @csrf
            @method('delete')
            <input type="hidden" name="classe" value="{{ $classe->id }}">
            <button class="btn btn-danger">Supprimer</button>
            </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2">Totale Coefficient</td>
            <td>{{ $classe->matieres()->where('classe_id',$classe->id)->sum('coefficient') }}</td>
        </tr>
    </table>
    @else
    <h6>Aucune matiere pour cette classe</h6>
    @endif
    </div>
  </div>
</div>
<div class="ml-4 mt-4">
@if($classe->surveillants()->where('anneeScolaire',annee())->first())
<h6>Surveillant : <strong>{{ $classe->surveillants()->where('anneeScolaire',annee())->first()->prenom.' '.$classe->surveillants()->where('anneeScolaire',annee())->first()->nom }}</strong></h6>
@else
<h6>Il n'y a pas de surveillant pour cette classe</h6>
</div>
@endif
@endsection
<!--@section('classe')
<script>
function matiere(){
    var c = document.getElementById("detail");
    var m = "@if(! ($classe->matieres)->isEmpty())<table class='table table-striped table-bordered'><thead><tr><th>Nom Matieres</th><th>Coefficient</th></tr></thead>@foreach ($classe->matieres as $matieres)<tr><td>{{ $matieres->nomMatiere }}</td><td>{{ $matieres->pivot->coefficient }}</td></tr>@endforeach<tr><td>Totale Coefficient</td><td>{{ $classe->matieres()->where('classe_id',$classe->id)->sum('coefficient') }}</td></tr></table>@else<h6>Aucune matiere pour cette classe</h6>@endif";
    c.innerHTML = m;
    }

function liste(){
var c = document.getElementById("detail");
var l = "<div class='card'><div class='card-header'><h4>Liste des Eleves de {{ $classe->nomClasse }}</h4></div><div class='card-body'>@if(! $classe->eleves->isEmpty())<table class='table table-stripped table text-center'><thead><tr><th>nom utilisateur</th><th>Prenom</th><th>Nom</th><th>Date de Naissance</th><th colspan='3'>Action</th></tr></thead><tbody>@foreach($classe->eleves as $eleve)<tr><td>{{ $eleve->nomUtilisateur }}</td><td>{{ $eleve->prenom }}</td><td>{{ $eleve->nom }}</td><td>{{ $eleve->dateDeNaissance->format('d/m/Y') }}</td><td><a href='{{ route('eleve.show',['eleve'=>$eleve->id]) }}' class='btn btn-info btn-xs'><i class='fa fa-eye'>Voir</i></a></td><td><a href='{{ route('eleve.edit',['eleve'=>$eleve->id]) }}' class='btn btn-success'><i class='fa fa-edit '>Modifier</i></a></td></tr>@endforeach</tbody></table>@else<div class='col-lg-12 alert'><h1>{{ __('Cette classe ne contient pas d eleve') }}</h1></div>@endif</div></div>";
c.innerHTML = l;
}
</script>
@endsection
";
-->
<!--  A implementer
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>
-->
