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
         <form action="{{ route('evaluation.store',['classe'=>$classe]) }}" method="POST">
        @csrf
    <div class="col-lg-12" id="note">
    <div class="row">
        <div class="form-group col-lg-4">
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

 <div class="form-group col-lg-4">
            <label for="matiere">Matiere*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <select class="form-control @error('matiere') is-invalid class="form-control" @enderror" name="matiere">
                <option value="">--selectionner--</option>
                @if($classe->matieres()->count() > 0)
                <optgroup label="matieres Français">
            @foreach($classe->matieres()->whereNull('nomArabe')->get() as $matiere)
                <option {{ old('matiere')==$matiere->reference?"selected":""}} value="{{$matiere->reference}}">{{ $matiere->nomMatiere}}</option>
            @endforeach
                </optgroup>
                <optgroup label="Matieres Arabes">
                    @foreach($classe->matieres()->whereNotNull('nomArabe')->get() as $matiere)

                        <option {{ old('matiere')==$matiere->reference?"selected":""}} value="{{$matiere->reference}}">{{ $matiere->nomMatiere}}-{{ $matiere->nomArabe}}</option>
                    @endforeach
                        </optgroup>
                        @else
                        {{ __('cette classe n"a pas encore de matiere') }}
                        @endif
            </select>
        </div>
        @error('matiere')
        <span class="helper helper-danger">{{ $message }}</span>
        @enderror
        </div>
     <div class="form-group col-lg-4">
            <label for="anneeScolaire">Annee Scolaire*</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <input type="text" name="anneeScolaire" class="form-control" value="{{ anneeScolaire() }}" disabled/>
        </div>

        </div>
        </div>
    </div>
    </div>
@if(! $eleves->isEmpty())
<table class="table table-stripped table text-center">
    <thead>
    <tr>
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
    <td colspan="3"><input name="composition[]" class="form-control @error('composition') is-invalid @enderror " placeholder="Entrer la note de composition" value="{{ old('composition') }}" required/>
    <input type="hidden" name="id[]" value="{{ $eleve->nomUtilisateur }}"/>
    @error('composition.*')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
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
</div>
</div>
@endsection
