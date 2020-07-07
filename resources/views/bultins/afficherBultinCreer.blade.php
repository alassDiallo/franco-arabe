@extends('directeurs.template')
@section('page')
@if($eleve->bultins()->count() > 0)
<div class="ml-4">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bultin Français</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bultin Arabe</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('imprimerBultin.index',['anneeScolaire'=>request()->anneeScolaire,'eleve'=>$eleve->nomUtilisateur,'semestre'=>request()->semestre,'classe'=>$classe->nomClasse])}}" class="btn btn-success pull-right mb-4">Imprimer le Bultin</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
                <th>Moyenne semestrielle/10</th>
                <th>Coefficient</th>
                <th>Moyenne * coefficient</th>
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
            <td>{{ round($eleve->bultins()->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre])->first()->moyenne??0,2) }}/10
            </td>
        <td>{{ appreciation($eleve->bultins()->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre])->first()->moyenne??0) }}</td>
        </tr>
        <tr class="mt-2">
        <td colspan="6"></td>
        </tr>
        <tr class="">
            <td colspan="2"><small><strong>Blame</strong></small> <i class="fa fa-square-o ml-1"></i></td>
            <td><mall><strong> Avertissement </strong></small><i class="fa fa-square-o ml-1"></i></td>
            <td><small><strong> Tableau d'honneur</strong></small> <i class="fa fa-square-o ml-1"></i></td>
            <td><small><strong> Encouragement</strong> </small><i class="fa fa-square-o ml-1"></i></td>
            <td><small><strong>Felicitation </strong></small><i class="fa fa-square-o ml-1"></i></td>
            </tr>
            </tbody>
            </table>
            <div class="col-lg-6 pull-right text-right mt-4 mr-4">
                <strong>le directeur</strong>
            </div>

    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
                <th>Moyenne semestrielle/10</th>
                <th>Coefficient</th>
                <th>Moyenne * coefficient</th>
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
            {{ ($eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre,'matiere_id'=>$note->id])->first()->pivot->note??0)*$note->pivot->coefficient}}
        </td>
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
            <td>{{ round($eleve->bultins()->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre])->first()->moyenneArabe??0,2) }}/10
            </td>
        <td>{{ appreciation($eleve->bultins()->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre])->first()->moyenneArabe??0) }}</td>
        </tr><tr class="mt-2">
            <td colspan="6"></td>
            </tr>
            <tr class="">
                <td colspan="2"><small><strong>Blame</strong></small> <i class="fa fa-square-o ml-1"></i></td>
                <td colspan="2"><mall><strong> Avertissement </strong></small><i class="fa fa-square-o ml-1"></i></td>
                <td><small><strong> Tableau d'honneur</strong></small> <i class="fa fa-square-o ml-1"></i></td>
                <td><small><strong> Encouragement</strong> </small><i class="fa fa-square-o ml-1"></i></td>
                <td><small><strong>Felicitation </strong></small><i class="fa fa-square-o ml-1"></i></td>
                </tr>
                </tbody>
                </table>
                <div class="col-lg-6 pull-right text-right mt-4 mr-4">
                    <strong>le directeur</strong>
                </div>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
  </div>
  @else
  {{ __('cette eleve n\'a pas de bultin de note') }}
  @endif
@endsection
