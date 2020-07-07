@extends('directeurs.template')
@section('page')
<div class="ml-4">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active btn btn-success" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-warning ml-2" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Curcisse Scolaire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-2 btn btn-danger" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Note</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ml-2 btn btn-info" id="pills-contact-tab" data-toggle="pill" href="#pills-mensualite" role="tab" aria-controls="pills-mensualite" aria-selected="false">Mensualite</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ml-2 btn btn-info" id="pills-noteComplet-tab" data-toggle="pill" href="#pills-noteComplet" role="tab" aria-controls="pills-noteComplet" aria-selected="false">Note Complet</a>
          </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row ml-4 mt-4 mb-4">
                <div class="col-lg-6">
                    <h4>Information Generales<hr></h4>
                    <strong>nom : </strong>{{ $eleve->nom }}<br/>
                    <strong>prenom : </strong>{{ $eleve->prenom }}<br/>
                    <strong>Date de Naissance : </strong>{{ $eleve->dateDeNaissance->format('d/m/Y') }}<br/>
                    <strong>adresse : </strong>{{ $eleve->adresse }}<br/>
                    <strong>telephone : </strong>@if($eleve->telephone ==null)
                {{ __('Neant') }}
                @else
                {{ $eleve->telephone }}
                @endif<br/>
                <strong>nom d'Utilisateur : </strong>{{ $eleve->nomUtilisateur }}<br/>
                <strong>classe : </strong>{{ $eleve->classes()->first()->nomClasse }}<br/>
                <strong>Lieu de Naissance : </strong>{{ $eleve->lieuDeNaissance }}<br/>
                <hr>
                <h4>Informations Tuteur<hr></h4>
                     <strong>Nom et Prenom tuteur : </strong>{{ $eleve->tuteur->prenom }}  {{ $eleve->tuteur->nom }}<br/>
                            <strong>Telephone Tuteur : </strong>{{  $eleve->tuteur->telephoneTuteur }}<br/>
                </div>
                <div class="col-lg-6">
                    <h4>Payement de la Scolarité</h4>

                    <strong>Date inscription : </strong>{{ $eleve->classes()->first()->pivot->created_at->format('d-m-Y')  }}<br/>
                    <strong>montant versé : </strong>{{ $eleve->classes()->first()->pivot->montant }}
                    <hr>
                    <strong>montant inscription : </strong>{{ $eleve->classes()->first()->montantInscription }}<br/>
                    <strong>reste à payer : </strong>@if($eleve->classes()->first()->pivot->reliquat==0)
                                    {{ __('En regle') }}
                                    @else
                    {{ $eleve->classes()->first()->pivot->reliquat }}
                    @endif<br/>
                    <strong>Payé à l'inscription : </strong>{{ $eleve->classes()->first()->pivot->montant }}
                    <img  src="/img/eleves/{{ $eleve->photo }}" alt="pas de photo" width="250px" height="250px"  class="img-thumbnail"/><br/>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <table class='table table-bordered text-center'>
                <caption>Curcisse Scolaire  de <strong>{{ $eleve->prenom }} {{ $eleve->nom }}</strong></caption>
                <thead>
                    <th>Classe</th>
                    <th>Année Scolaire</th>
                    <th>Date Inscription</th>
                    <th>Montant payé à l'inscription</th>
                    <th>reliquat</th>
                </thead>
                <tbody>
                    @foreach ($eleve->classes as $classes)
                    <tr>
                        <td>{{ $classes->nomClasse }}</td>
                        <td><strong>{{  $classes->pivot->anneeScolaire }}</strong></td>
                        <td>{{ $classes->pivot->created_at->format('d/m/Y H:i:s') }}</td>
                        <td><strong>{{ $classes->pivot->montant }} FrCFA</strong></td>
                        <td>
                            @if( $classes->pivot->reliquat==0){{ __('En régle') }}
                            @else
                            <strong>{{  $classes->pivot->reliquat}} FrCFA</strong>
                            @endif
                        </td>
                    </tr>@endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <table class='table table-bordered text-center'>
                <caption>Curcisse Scolaire  de <strong>{{ $eleve->prenom }} {{ $eleve->nom }}</strong></caption>
                <thead>
                    <th>Matiere</th>
                    <th>note</th>
                    <th>Moyenne semestrielle</th>
                    <th>Coefficient</th>
                    <th>Moyenne * coefficient</th>
                    <th>Appreciation</th>
                </thead>
                <tbody>
                    @foreach ($eleve->matieres()->where('semestre','s1')->with('classes')->limit(1)->get() as $note)
                    <tr>
                        <td>{{$note->nomMatiere}}</td>
                        <td>{{ $note->pivot->note?$note->pivot->note:'-' }}</td>
                        <td>{{ $note->pivot->note }}</td>
                        <td>{{ $note->classes()->where('matiere_id',$note->id)->first()->pivot->coefficient }}</td>
                        <td>{{ $note->classes()->where('matiere_id',$note->id)->first()->pivot->coefficient * $note->pivot->note}}</td>
                        <td>{{ appreciation($note->pivot->note) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan='3'>Total</td>
                        <td>
                            @foreach ($eleve->classes as $classes){{ $classes->matieres()->where('classe_id',$classes->id)->sum('coefficient') }}
                            @endforeach
                        </td>
                        <td>{{ $som??'' }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade mt-4" id="pills-mensualite" role="tabpanel" aria-labelledby="pills-mensualite-tab">
            @if($eleve->mois)
            <h4>Les Mensualité</h4>
           @foreach (App\Models\Mois::all() as $mensualite )
           <div class="custom-control custom-checkbox col-lg-4">
            <input type="checkbox" class="custom-control-input" id="{{ $mensualite->nomMois }}" name="mois" value="{{  $mensualite->nomMois }}"  {{ $eleve->mois()->where('nomMois',$mensualite->nomMois)->first()?'checked':''}}>
            <label class="custom-control-label" for="{{ $mensualite->nomMois}}">{{ $mensualite->nomMois }}</label>
            </div>
           @endforeach
           @else
            {{ __('Aucune mensualité payer') }}
            @endif
        </div>

        <!--<div class="tab-pane fade" id="pills-noteComplet" role="tabpanel" aria-labelledby="pills-noteComplet-tab">
            <table class='table table-bordered text-center'>
                <caption>Curcisse Scolaire  de <strong>{{ $eleve->prenom }} {{ $eleve->nom }}</strong></caption>
                <thead>
                    <th>Matiere</th>
                    <th>devoiir 1</th>
                    <th>devoiir 2</th>
                    <th>Moyenne devoir</th>
                    <th>compsosition</th>
                    <th>Moyenne semestrielle</th>
                    <th>Coefficient</th>
                    <th>Moyenne * coefficient</th>
                    <th>Appreciation</th>
                </thead>
                <tbody>

                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>-->

      </div>

</div>
@endsection
