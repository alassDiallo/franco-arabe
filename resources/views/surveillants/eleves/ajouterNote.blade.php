@extends('directeurs.template')
@section('page')
<div class="">
         <div>
         @foreach(App\Models\Classe::all() as $classes)
        <a href="{{ route('note.create',['classe'=>$classes->nomClasse])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
         @endforeach
         </div>
         <div class="container text-center bg-primary" style="color:white;">
             <hr>
            <h4>Nom classe : {{ $classe->nomClasse }}  Nombre d'{{ Str::plural('eleve',$eleves->count()) }} : {{ $eleves->count() }}</h4>
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
            @foreach($classe->matieres as $matiere)
                <option {{ old('matiere')?"selected":""}} value="{{$matiere->id}}">{{ $matiere->nomMatiere}}</option>
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
@if(! $eleves->isEmpty())
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
@foreach($eleves as $eleve)
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
{{ $eleves->appends(request()->input())->links() }}
@else
<div class="col-lg-12">
<h1>{{ __('Cette classe ne contient pas d\'Eleve ') }}</h1>
</div>
@endif
</div>
@endsection
