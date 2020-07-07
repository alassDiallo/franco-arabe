@extends('directeurs.template')
@section('page')
<div><a href="{{ route('imprimerBultin.index',['anneeScolaire'=>request()->anneeScolaire,'eleve'=>$eleve->nomUtilisateur,'semestre'=>request()->semestre,'classe'=>$classe->nomClasse])}}" class="btn btn-lg btn-primary pull-right mb-4">Imprimer le Bultin</a></div>
<div class="ml-4">
<div>
    annee Scolaire : {{ request()->anneeScolaire  }}</br>
    SEMESTRE : {{ request()->semestre }}
</div>
<div class="text-center">
    <hr>
    <h3>BULLETIN DE NOTE</h3>
    <hr>
    </div>
<div class="row ml-4">
    <span class="pull-left col-lg-4">Prenom  :  {{ $eleve->prenom }}</span>
    <span class="pull-center col-lg-4">Nom  :  {{ $eleve->nom }}</span>
    <span class="pull-right col-lg-4">IDENTIFIANT :  {{ $eleve->nomUtilisateur }}</span>
</div>
    <div class="row ml-4 mb-4">
    <span class="pull-left col-lg-4">né(e) le   :  {{ $eleve->dateDeNaissance->format('d/m/Y') }} à {{ $eleve->lieuDeNaissance}}</span>
        <span class="pull-center col-lg-4">Classe  :  {{ $classe->nomClasse }}</span>
        <span class="pull-right col-lg-4">Nombre d'eleve  :  {{ $classe->eleves()->where('anneeScolaire',request()->anneeScolaire)->count() }}</span>
    </div>
     <table class="table table-bordered text-center">
    <thead>
        <th>Matiere</th>
        <th>note</th>
        <th>Moy/10</th>
        <th>Coefficient</th>
        <th>Moy*coef</th>
        <th>Appreciation</th>
    </thead>
    <tbody>
        @foreach ($classe->matieres()->whereNull('nomArabe')->get() as $matiere)
        <tr>
       <td>{{$matiere->nomMatiere}}</td>
        <td>
            {{ $eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre,'matiere_id'=>$matiere->id])->first()->pivot->note??0}}
    </td>
    <td>
        {{ $eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre,'matiere_id'=>$matiere->id])->first()->pivot->note??0}}
</td>
<td>
    {{ $matiere->pivot->coefficient}}
</td>
<td>
    {{ ($eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre,'matiere_id'=>$matiere->id])->first()->pivot->note??0)*$matiere->pivot->coefficient}}
</td>
<td>
    {{ appreciation($eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre,'matiere_id'=>$matiere->id])->first()->pivot->note??0)}}
</td>
</tr>
@endforeach
<tr>
    <td colspan="3">TOTAL</td>
    <td>
{{ $classe->matieres()->whereNull('nomArabe')->where('classe_id',$classe->id)->sum('coefficient') }}
    </td>
    <td colspan="">
       {{ $som ??'' }}/{{ $m??'' }}
            </td>
        <td>Appreciation général</td>
</tr>
<tr>
    <td colspan="4">Moyenne de l'éléve</td>
    <td>{{ round($eleve->bultins()->where('anneeScolaire',request()->anneeScolaire)->first()->moyenne,2) }}/10
    </td>
<td>{{ appreciation($eleve->bultins()->where('anneeScolaire',request()->anneeScolaire)->first()->moyenne) }}</td>
</tr>
    </tbody>
    </table>
</div>

<div class="ml-4">
    <div>
        annee Scolaire : {{ request()->anneeScolaire  }}</br>
        SEMESTRE : {{ request()->semestre }}
    </div>
    <div class="text-center">
        <hr>
        <h3>BULLETIN DE NOTE</h3>
        <hr>
        </div>
    <div class="row ml-4">
        <span class="pull-left col-lg-4">Prenom  :  {{ $eleve->prenom }}</span>
        <span class="pull-center col-lg-4">Nom  :  {{ $eleve->nom }}</span>
        <span class="pull-right col-lg-4">IDENTIFIANT :  {{ $eleve->nomUtilisateur }}</span>
    </div>
        <div class="row ml-4 mb-4">
        <span class="pull-left col-lg-4">né(e) le   :  {{ $eleve->dateDeNaissance->format('d/m/Y') }} à {{ $eleve->lieuDeNaissance}}</span>
            <span class="pull-center col-lg-4">Classe  :  {{ $classe->nomClasse }}</span>
            <span class="pull-right col-lg-4">Nombre d'eleve  :  {{ $classe->eleves()->count() }}</span>
        </div>
         <table class="table table-bordered text-center">
        <thead>
            <th>matiere</th>
            <th>ىخفث</th>
            <th>كضفهثقث</th>
            <th>Moyenne/10</th>
            <th>Coefficient</th>
            <th>Moy*coef</th>
            <th>Appreciation</th>
        </thead>
        <tbody>
            @foreach ($classe->matieres()->whereNotNull('nomArabe')->get() as $note)
            <tr>
           <td>{{$note->nomMatiere}}</td>
            <td>
                {{ $eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre,'matiere_id'=>$note->id])->first()->pivot->note??0 }}
        </td>
        <td>
            {{ $note->nomArabe }}
        </td>
    <td>
        {{ $eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre,'matiere_id'=>$note->id])->first()->pivot->note??0 }}
    </td>
    <td>

        {{ $note->pivot->coefficient }}
    </td>
    <td>
        {{ ($eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre,'matiere_id'=>$note->id])->first()->pivot->note??0)*$matiere->pivot->coefficient}}</td>
    <td>
        {{ appreciation($eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre,'matiere_id'=>$note->id])->first()->pivot->note??0) }}
      </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="4">TOTAL</td>
        <td>
        {{ $classe->matieres()->whereNotNull('nomArabe')->sum('coefficient') }}
        </td>
        <td colspan="">
           {{ $soma??'' }}/{{ $ma??'' }}
                </td>
            <td>Appreciation général</td>
    </tr>
    <tr>
        <td colspan="5">Moyenne de l'éléve</td>
        <td>{{ round($eleve->bultins()->where('anneeScolaire',request()->anneeScolaire)->first()->moyenneArabe,2) }}/10
        </td>
    <td>{{ appreciation($eleve->bultins()->where('anneeScolaire',request()->anneeScolaire)->first()->moyenneArabe) }}</td>
    </tr>
        </tbody>
        </table>
</div>
@endsection
