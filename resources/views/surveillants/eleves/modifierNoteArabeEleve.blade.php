@extends('directeurs.template')
@section('page')
<div class="ajout col-lg-6">
    <div class="card card-info">
        <div class="card-header">
            Modifier Note eleve
        </div>
        <div class="card-body">
    <form action="{{ route('evaluationArabe.update',['evaluationArabe'=>$eleve,'semestre'=>request()->semestre]) }}" method="POST">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="nomUtilisateur">Identifiant Eleve</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <input type="text" class="form-control @error('nomUtilisateur') is-invalid @enderror" name="nomUtilisateur" placeholder="entrer le nom de la matiére en français" value="{{ $eleve->nomUtilisateur ?? old('nomUtilisateur') }}"/>
            </div>
            @if(session()->has('message'))
            <span class="helper helper-danger">{{ session()->get('message') }}</span>
            @endif
            @error('nomUtilisateur')
        <span class="helper helper-danger">{{ $message }}</span>
        @enderror
            </div>
            <div class="form-group">
                <label for="matiere">Nom matiere</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <input type="text" class="form-control @error('matiere') is-invalid @enderror" name="matiere" placeholder="entrer le nom de la matiére en Arabe" value="{{ request()->matiere ?? request()->matiereAr ?? old('matiere') }}"/>
            </div>
            @if(session()->has('message'))
            <span class="helper helper-danger">{{ session()->get('message') }}</span>
            @endif
            @error('matiere')
        <span class="helper helper-danger">{{ $message }}</span>
        @enderror
            </div>
            <div class="form-group">
                <label for="note">Note</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" placeholder="entrer la note de l'eleve" value="{{ request()->note ?? old('note') }}"/>
            </div>
            @if(session()->has('message'))
            <span class="helper helper-danger">{{ session()->get('message') }}</span>
            @endif
            @error('note')
        <span class="helper helper-danger">{{ $message }}</span>
        @enderror
            </div>
        <input type="submit"  name="valider" value="modifier la note" role="button" class="btn btn-primary form-control"/>
    </form>
    </div>
    </div>
@endsection
