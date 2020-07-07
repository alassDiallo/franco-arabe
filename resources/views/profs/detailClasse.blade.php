@extends('profs.accueil')
@section('contenu')
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
    <a class="nav-link" id="pills-note-tab" data-toggle="pill" href="#pills-note" role="tab" aria-controls="pills-note" aria-selected="false">Ajouter note</a>
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
                  <div class="count">{{ $classe->eleves()->count() }}</div>
                  <div class="title"><h4>{{ Str::plural('Eleve',App\Models\Eleve::all()->count())}}</h4>
                    <div class="text-center">
                  {{ $classe->eleves()->where('sexe','garçon')->count() }} {{ Str::plural('garçon',$classe->eleves()->where('sexe','garçon')->count())}}</div>
                    </div>
                  <div class="text-center">{{ $classe->eleves()->where('sexe','fille')->count() }} {{ Str::plural('fille',$classe->eleves()->where('sexe','fille')->count())}}</div>
                </div><!--/.info-box-->
              </div><!--/.col-->

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="info-box yellow-bg">
                <i class="fa fa-university ml-4"></i>
                <div class="count">{{ $user->classes()->where('nomClasse',request()->classe)->count() }}</div>
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
          @if(! $classe->eleves->isEmpty())
          <table class='table table-stripped table text-center'>
              <thead>
                  <tr>
                      <th>nom utilisateur</th>
                      <th>Prenom</th>
                      <th>Nom</th>
                      <th>Date de Naissance</th>
                      <th colspan='3'>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($classe->eleves as $eleve)
                  <tr>
                      <td>{{ $eleve->nomUtilisateur }}</td>
                      <td>{{ $eleve->prenom }}</td>
                      <td>{{ $eleve->nom }}</td>
                      <td>{{ $eleve->dateDeNaissance->format('d/m/Y') }}</td>
                      <td><a href='{{ route('eleve.show',['eleve'=>$eleve->id]) }}' class='btn btn-info btn-xs'><i class='fa fa-eye'>Voir</i></a></td>
                      <td><a href='{{ route('eleve.edit',['eleve'=>$eleve->id]) }}' class='btn btn-success'><i class='fa fa-edit '>Modifier</i></a></td>
                      <td>
                          <form action='{{ route('eleve.destroy',['eleve'=>$eleve->id]) }}' method='POST' onSubmit='return confirm(\"etes-vous de vouloire delete cet eleve\");'>
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
      <div class="tab-pane fade" id="pills-note" role="tabpanel" aria-labelledby="pills-note-tab">
        <div class="container text-center bg-primary" style="color:white;">
            <hr>
           <h4>Nom classe : {{ $classe->nomClasse }}  Nombre d'{{ Str::plural('eleve',$classe->eleves->count()) }} : {{ $classe->eleves->count() }}</h4>
       <hr>
       </div>
        <div>
        <form action="{{ route('note.store',['classe'=>$classe]) }}" method="POST">
       @csrf
   <div class="col-lg-12" id="note">
   <div class="row">
    <div class="form-group col-lg-3">
           <label for="evaluation">Type d'Evaluation*</label>
           <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
           <select class="form-control @error('evaluation') is-invalid class="form-control" @enderror" name="evaluation">
               <option value="">--selectionner--</option>
               <option {{ old('evaluation')=='devvoir1'?'selected':''}} value="devoir1">Devoir 1</option>
               <option {{ old('evaluation')=='devvoir2'?'selected':''}} value="devoir2">Devoir 2</option>
               <option {{ old('evaluation')=='composition'?'selected':''}} value="composition">Composition</option>
           </select>
       </div>
       @error('evaluation')
       <span class="helper helper-danger">{{ $message }}</span>
       @enderror
       </div>
       <div class="form-group col-lg-3">
           <label for="semestre">Semestre*</label>
           <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
           <select class="form-control @error('semestre') is-invalid class="form-control" @enderror" name="semestre">
               <option value="">--selectionner--</option>
               <option {{ old('semestre')=='s1'?"selected":""}} value="s1">Semestre 1</option>
               <option {{ old('semestre')=='s2'?"selected":""}} value="s2">Semestre 2</option>
           </select>
       </div>
       @error('semestre')
       <span class="helper helper-danger">{{ $message }}</span>
       @enderror
       </div>

<div class="form-group col-lg-3">
           <label for="matiere">Matiere*</label>
           <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
           <select class="form-control @error('matiere') is-invalid class="form-control" @enderror" name="matiere">
               <option value="">--selectionner--</option>
           @foreach($user->classes()->where('nomClasse',request()->classe)->get() as $matiere)
               <option {{ old('matiere')?"selected":""}} value="{{$matiere->pivot->matiere}}">{{ $matiere->pivot->matiere}}</option>
           @endforeach
           </select>
       </div>
       @error('matiere')
       <span class="helper helper-danger">{{ $message }}</span>
       @enderror
       </div>
    <div class="form-group col-lg-3">
           <label for="anneeScolaire">Annee Scolaire*</label>
           <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
           <select class="form-control @error('anneeScolaire') is-invalid class="form-control" @enderror" name="anneeScolaire">
               <option value="">--selectionner--</option>
           @foreach(App\Models\anneeScolaire::all() as $anneeScolaire)
               <option {{ old('anneeScolaire')?"selected":""}}>{{ $anneeScolaire->anneeDebut }}-{{ $anneeScolaire->anneeFin }}</option>
           @endforeach
           </select>
       </div>
       @error('anneeScolaire')
       <span class="helper helper-danger">{{ $message }}</span>
       @enderror
       </div>
       </div>
   </div>

   </div>
@if(! $classe->eleves->isEmpty())
<table class="table table-stripped table-bordered text-center">
   <thead>
   <tr>
       <th>nom utilisateur</th>
       <th>Prenom</th>
       <th>Nom</th>
       <th>Date de Naissance</th>
       <th colspan="3">Ajoueter Note</th>
   </tr>
   </thead>
   <tbody>
@foreach($classe->eleves as $eleve)
<tr>
   <td>{{ $eleve->nomUtilisateur }}</td>
   <td>{{ $eleve->prenom }}</td>
   <td>{{ $eleve->nom }}</td>
   <td>{{ $eleve->dateDeNaissance->format('d/m/Y') }}</td>
<td>
   <input name="note[]" class="form-control" placeholder="Entrer la note du 1ere devoir" /></td>
   <!--<td><input name="devoir2[]" class="form-control" placeholder="Entrer la note du deuxieme devoir" /></td>
   <td><input name="composition[]" class="form-control" placeholder="Entrer la note de composition" />-->
   <input type="hidden" name="id[]" value="{{ $eleve->id }}"/>
   </td>
</tr>
@endforeach
<tr>
   <td colspan="10"><input type="submit"  class="form-control btn btn-primary" name="valider" value="Ajouter les notes"/></td>
</tr>
   </tbody>
   </tbody>
</table>
@else
<div class="col-lg-12">
<h1>{{ __('Cette classe ne contient pas d\'Eleve ') }}</h1>
</div>
@endif
</div>
      </div>
  </div>
</div>


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
