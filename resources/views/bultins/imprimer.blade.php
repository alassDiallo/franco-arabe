<!DOCTYPE html>
<html lang="an">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/imprime.css">
    <title>Bultin</title>
</head>
<body>
    <div class="ecole">
        <img src="ecole/arabe.png" class="img"/><br/>
            Adress : dakar<br/>
            Telephone : 774298343
    </div>
    <div class="annee">
        annee Scolaire : {{ annee()  }}<br/>
        SEMESTRE : {{ request()->semestre }}
    </div>
    <div class="text-center">
        <hr>
        <h4>BULLETIN DE NOTE</h4>
        <hr>
    </div>
    <table class="table table-bordered" border="" style="">
        <tr>
        <td class="d">Prenom  :  {{ $eleve->prenom }}</td>
        <td class="g">Nom  :  {{ $eleve->nom }}</td>
        <td class="g">IDENTIFIANT :  {{ $eleve->nomUtilisateur }}</td>
        </tr>
        <tr>
            <td  class="d">né(e) le   :  {{ $eleve->dateDeNaissance->format('d/m/Y') }} à {{ $eleve->lieuDeNaissance}}</td>
            <td  class="g">Classe  :  {{ $classe->nomClasse }}</td>
            <td  class="g">Nombre d'eleve  :  {{ $classe->eleves()->where('anneeScolaire',annee())->count() }}</td>
        </tr>
    </table>
         <table class="table table-bordered text-center" border="1" id="table">
        <thead>
            <tr>
            <th>Matiere</th>
            <th>note</th>
            <th>Moyenne/10</th>
            <th>Coefficient</th>
            <th>Moy*coef</th>
            <th>Appreciation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classe->matieres()->whereNull('nomArabe')->get() as $matiere)
                <tr>
               <td>{{$matiere->nomMatiere}}</td>
                <td>
                    {{ $eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre,'matiere_id'=>$matiere->id])->first()->pivot->note??0}}
            </td>
            <td>
                {{ $eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre,'matiere_id'=>$matiere->id])->first()->pivot->note??0}}
        </td>
        <td>
            {{ $matiere->pivot->coefficient}}
        </td>
        <td>
            {{ ($eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre,'matiere_id'=>$matiere->id])->first()->pivot->note??0)*$matiere->pivot->coefficient}}
        </td>
        <td>
            {{ appreciation($eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre,'matiere_id'=>$matiere->id])->first()->pivot->note??0)}}
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
            <td>{{ $moy }}/10
            </td>
        <td>{{ appreciation($moy)}}</td>
        </tr>
        <tr class="mt-2">
        <td colspan="6"></td>
        </tr>
        @if(request()->semestre=='s2')
        <tr>
            <td colspan="3">Moyenne semestre 1 : {{ round(($eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>'s1'])->first()->moyenne??0),2) }}/10</td>
            <td colspan="3">Moyenne general : {{ round((($eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>'s2'])->first()->moyenne??0 + $eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>'s1'])->first()->moyenne??0)/2),2) }}
        </tr>
        @endif
    <tr class="app">
        <td ><input type="checkbox" {{ $moy<4?'checked':'' }}><small><strong>Blame</strong></small> <i class="fa fa-square-o ml-1"></i></td>
        <td><input type="checkbox" {{$moy<5?'checked':'' }}><small><strong> Avertissement </strong></small><i class="fa fa-square-o ml-1"></i></td>
        <td colspan="2"><input type="checkbox" {{ $moy>=8?'checked':'' }}><small><strong> Tableau d'honneur</strong></small> <i class="fa fa-square-o ml-1"></i></td>
        <td><input type="checkbox" {{ $moy>5?'checked':'' }}><small><strong> Encouragement</strong> </small><i class="fa fa-square-o ml-1"></i></td>
        <td><input type="checkbox" {{ $moy>7 }}><small><strong>Felicitation </strong></small><i class="fa fa-square-o ml-1"></i></td>
        </tr>
        </tbody>
        </table>
        <div class="directeur col-lg-6 pull-right text-right mt-4 mr-4" >
            @if(request()->semestre=='s2')
            <h6>{{ round((($eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->first()->moyenne??0 + $eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>'s1'])->first()->moyenne??0)/2),2)<5?'':'Passe en classe superieur' }}</h6>
            @endif
            <strong>le directeur</strong>
        </div>
        <div class="page-break"></div>
        <div class="ecole">
            <img src="ecole/arabe.png" class="img"/><br/>
                Adress : dakar<br/>
                Telephone : 774298343
        </div>
        <div class="annee">
            annee Scolaire : {{ annee()  }}<br/>
            SEMESTRE : {{ request()->semestre }}
        </div>
        <div class="text-center">
            <hr>
            <h4>BULLETIN DE NOTE</h4>
            <hr>
        </div>
        <table class="table">
            <tr>
            <td>Prenom  :  {{ $eleve->prenom }}</td>
            <td>Nom  :  {{ $eleve->nom }}</td>
            <td>IDENTIFIANT :  {{ $eleve->nomUtilisateur }}</td>
            </tr>
            <tr>
                <td>né(e) le   :  {{ $eleve->dateDeNaissance->format('d/m/Y') }} à {{ $eleve->lieuDeNaissance}}</td>
                <td>Classe  :  {{ $classe->nomClasse }}</td>
                <td>Nombre d'eleve  :  {{ $classe->eleves()->where('anneeScolaire',annee())->count() }}</td>
            </tr>
        </table>
        <table class="table table-bordered text-center"  border="1" id="table">
            <thead>
                <tr>
                <th>matiere</th>
                <th>ىخفث</th>
                <th>كضفهثقث</th>
                <th>Moyenne/10</th>
                <th>Coef</th>
                <th>Moy*coef</th>
                <th>Appreciation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classe->matieres()->whereNotNull('nomArabe')->get() as $note)
                <tr>
               <td>{{$note->nomMatiere}}</td>
                <td>
                    {{ $eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre,'matiere_id'=>$note->id])->first()->pivot->note??0 }}
            </td>
            <td>
                {{ $note->nomArabe }}
            </td>
        <td>
            {{ $eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre,'matiere_id'=>$note->id])->first()->pivot->note??0 }}
        </td>
        <td>

            {{ $note->pivot->coefficient }}
        </td>
        <td>
            {{ ($eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre,'matiere_id'=>$note->id])->first()->pivot->note??0)*$note->pivot->coefficient}}
        </td>
        <td>
            {{ appreciation($eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre,'matiere_id'=>$note->id])->first()->pivot->note??0) }}
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
            <td>{{ $moyA }}/10
            </td>
        <td>{{ appreciation($moyA) }}</td>
        </tr>
        @if(request()->semestre=='s2')
        <tr>
            <td colspan="4">Moyenne semestre 1 : {{ round(($eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>'s1'])->first()->moyenneArabe??0),2) }}/10</td>
            <td colspan="3">Moyenne general : {{ round((($eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->first()->moyenneArabe??0 + $eleve->bultins()->where(['anneeScolaire'=>annee(),'semestre'=>'s1'])->first()->moyenneArabe??0)/2),2) }}
        </tr>
        @endif
    <tr class="mt-2">
        <td colspan="6"></td>
        </tr>
        <tr class="app">
            <td colspan="2"><input type="checkbox" {{ $moyA<4?'checked':'' }}><small><strong>Blame</strong></small> <i class="fa fa-square-o ml-1"></i></td>
            <td><input type="checkbox" {{ $moyA<5?'checked':'' }}><small><strong> Avertissement </strong></small><i class="fa fa-square-o ml-1"></i></td>
            <td colspan="2"><input type="checkbox" {{ $moyA>=8?'checked':'' }}><small><strong> Tableau d'honneur</strong></small> <i class="fa fa-square-o ml-1"></i></td>
            <td><input type="checkbox" {{ $moyA>5?'checked':'' }}><small><strong> Encouragement</strong> </small><i class="fa fa-square-o ml-1"></i></td>
            <td><input type="checkbox" {{ $moyA>7?'checked':''}}><small><strong>Felicitation </strong></small><i class="fa fa-square-o ml-1"></i></td>
            </tr>
            </tbody>
            </table>
            <div class="directeur col-lg-6 pull-right text-right mt-4 mr-4">
                <strong>le directeur</strong>
            </div>
</body>
</html>
