@extends('directeurs.template')
@section('page')

<div class="">
         <div>
         @foreach(App\Models\Classe::all() as $classes)
        <a href="{{ route('note.show',['note'=>$classes->nomClasse])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
         @endforeach
         </div>
         <div class="container text-center bg-primary w-100" style="color:white;">
             <hr>
            <h4>Nom classe : {{ $classe->nomClasse }}  Nombre d'{{ Str::plural('eleve',$classe->eleves->count()) }} : {{ $classe->eleves->count() }}</h4>
        <hr>
        </div>
         <div>
         <form action="{{ route('note.store') }}" method="POST">
        @csrf
    <div class="col-lg-12" id="note">
    <div class="row">
     <div class="form-group col-lg-3">
            <label for="evaluation">Type d'Evaluation*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <select class="form-control @error('evaluation') is-invalid class="form-control" @enderror" name="evaluation">
                <option value="">--selectionner--</option>
                <option {{ old('evaluation')?"selected":""}} value="devoir1">Devoir 1</option>
                <option {{ old('evaluation')?"selected":""}} value="devoir2">Devoir 2</option>
                <option {{ old('evaluation')?"selected":""}} value="composition">Composition</option>
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
                <option {{ old('semestre')?"selected":""}} value="s1">Semestre 1</option>
                <option {{ old('semestre')?"selected":""}} value="s2">Semestre 2</option>
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
            @foreach($classe->matiere_arabes as $matiere)
                <option {{ old('matiere')?"selected":""}} value="{{$matiere->id}}">{{ $matiere->nomFr.'-'.$matiere->nomAr}}</option>
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
    </form>
    </div>
@if(! $classe->eleves->isEmpty())
<table class="table table-stripped table-hover table-bordered text-center">
    <thead>
    <tr>
        <th rowspan="2">nom utilisateur</th>
        <th rowspan="2">Prenom</th>
        <th rowspan="2">Nom</th>
        <th rowspan="2">Date de Naissance</th>
        @foreach ($classe->matiere_arabes()->orderBy('nomFr')->get() as $matiere )
     <th colspan="">{{ $matiere->nomFr.'-'.$matiere->nomAr }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
@foreach($classe->eleves as $eleve)
<tr>
    <td>{{ $eleve->nomUtilisateur }}</td>
    <td>{{ $eleve->prenom }}</td>
    <td>{{ $eleve->nom }}</td>
    <td>{{ $eleve->dateDeNaissance->format('d/m/Y') }}</td>
    @foreach ($classe->matiere_arabes()->orderBy('nomFr')->get() as $matiere )
        <td>{{ $eleve->matiere_arabes()->where('matiere_arabe_id',$matiere->id)->first() ? $eleve->matiere_arabes()->where('matiere_arabe_id',$matiere->id)->first()->pivot->note:0}}</td>
    @endforeach
</tr>
@endforeach
<tr>
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
@endsection
