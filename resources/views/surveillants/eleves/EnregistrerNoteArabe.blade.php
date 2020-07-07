@extends('directeurs.template')
@section('page')
<div class="ml-4 mb-4">
    @foreach(App\Models\Classe::all() as $classes)
        <a href="{{ route('evaluation.create',['classe'=>$classes->nomClasse])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
         @endforeach
</div>
<div class="ml-4">
    <div class="container text-center bg-primary" style="color:white;">
        <hr>
       <h4>Nom classe : {{ $classe->nomClasse }}  Nombre d'{{ Str::plural('eleve',$eleves->count()) }} : {{ $eleves->count() }}</h4>
   <hr>
   </div>
    <div>
    <form action="{{ route('evaluationArabe.store') }}" method="POST">
   @csrf
<div class="col-lg-12" id="note">
<div class="row">
   <div class="form-group col-lg-4">
       <label for="semestre">Semestre*</label>
       <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
       <select class="form-control @error('semes') is-invalid class="form-control" @enderror" name="semes">
           <option value="">--selectionner--</option>
           <option {{ old('semes')?"selected":""}} value="s1">Semestre 1</option>
           <option {{ old('semes')?"selected":""}} value="s2">Semestre 2</option>
       </select>
   </div>
   @error('semes')
   <span class="helper helper-danger">{{ $message }}</span>
   @enderror
   </div>

<div class="form-group col-lg-4">
       <label for="matierear">Matiere*</label>
       <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
       <select class="form-control @error('matierear') is-invalid class="form-control" @enderror" name="matierear">
           <option value="">--selectionner--</option>
       @foreach($classe->matiere_arabes as $matiere)
           <option {{ old('matierear')==$matiere->nomAr?"selected":""}} value="{{$matiere->nomAr}}">{{ $matiere->nomFr.'-'.$matiere->nomAr}}</option>
       @endforeach
       </select>
   </div>
   @error('matierear')
   <span class="helper helper-danger">{{ $message }}</span>
   @enderror
   </div>
<div class="form-group col-lg-4">
       <label for="anneeScol">Annee Scolaire*</label>
       <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
       <select class="form-control @error('anneeScol') is-invalid @enderror" name="anneeScol">
           <option value="">--selectionner--</option>
           <option {{ old('anneeScol')?"selected":""}} value="{{ $annee->anneeDebut }}-{{ $annee->anneeFin }}">{{ $annee->anneeDebut }}-{{ $annee->anneeFin }}</option>
       </select>
   </div>
   @error('anneeScol')
   <span class="helper helper-danger">{{ $message }}</span>
   @enderror
   </div>
   </div>
</div>
</div>
@if(! $eleves->isEmpty())
<table class="table table-stripped table text-center">
<thead>
    <td>N</td>
   <th>nom utilisateur</th>
   <th>Prenom</th>
   <th>Nom</th>
   <th>Date de Naissance</th>
   <th colspan="3">Entrer les notes</th>
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
<td>
<td colspan="3"><input name="compos[]" class="form-control @error('compos') is-invalid @enderror " placeholder="Entrer la note de composition" value="{{ old('compos.*') }}" required/>
<input type="hidden" name="num[]" value="{{ $eleve->nomUtilisateur }}"/>
@error('compos.*')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
</td>
</tr>
@endforeach
<tr>
<td colspan="10"><input type="submit"  class="form-control btn btn-primary" name="valider" value="Ajouter les notes arabe"/></td>
</tr>
</tbody>
</tbody>
</table>
{{ $eleves->appends(request()->input())->links() }}
@else
<div class="col-lg-12">
<h1>{{ __('Cette classe ne contient pas d\'Eleve ') }}</h1>
</div>
@endif
</div>
</div>
@endsection
