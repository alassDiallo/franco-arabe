<div class="col-xs-3 mr-2 bg-primary"  id="menu">
    <div class="sidebar-toggle-box text-right">
        <div class="fa fa-navicon tooltips mr-4" id="b" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
	<table  class="table table-md" id="m">
		<tr>
        <th><a href="{{ route('accueil',['anneeScolaire'=>annee()]) }}"><i class="fa fa-home mr-2 align-right" ></i>Accueil</a></th>
		</tr>
	<tr>
    <th><div class="dropdown dropright">
        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-users mr-2"></i>Eleves <i class="fa fa-angle-right ml-4"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a class="dropdown-item" href="{{ route('eleve.create',['anneeScolaire'=>annee()]) }}" type="button">Ajouter un eleve</a>
          <a href="{{ route('inscription.create',['anneeScolaire'=>annee()]) }}" class="dropdown-item" type="button">Reinscription</a>
          <a class="dropdown-item" href="{{ route('eleve.index',['anneeScolaire'=>annee()]) }}" type="button">Lister nos Eleves</a>
        </div>
      </div>
      </th>
	</tr>
	<tr>
    <th><div class="dropdown dropdown">
        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user mr-2"></i>Professeur
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a class="dropdown-item" href="{{ route('professeur.create',['anneeScolaire'=>annee()]) }}" type="button">Ajouter un proffesseur</a>
          <a class="dropdown-item" href="{{ route('classeProf.create',['anneeScolaire'=>annee()]) }}" type="button">Affecter un proffesseur a un ou plusieurs classe(s)</a>
          <a class="dropdown-item" href="{{ route('professeur.index',['anneeScolaire'=>annee()]) }}" type="button">Lister nos Professeurs</a>
        </div>
      </div></th>
    </tr>
    <tr>
		<th><div class="dropdown dropright">
            <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user mr-2"></i>Surveillants
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="{{ route('surveillant.create',['anneeScolaire'=>annee()]) }}" type="button">Ajouter un Surveillant</a>
              <a class="dropdown-item" href="{{ route('affecterSurv',['anneeScolaire'=>annee()]) }}" type="button">Affecter un Surveillant a un ou plusieurs classe(s)</a>
              <a class="dropdown-item" href="{{ route('surveillant.index',['anneeScolaire'=>annee()]) }}" type="button">Lister nos surveillants</a>
            </div></th>
	</tr>
	<tr>
		<th><div class="dropdown dropdown">
            <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user mr-2"></i>Tuteurs
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="#" type="button">Ajouter un tuteur</a>
              <a href="#" class="dropdown-item" type="button">modifier tuteur</a>
              <a class="dropdown-item" href="{{ route('tuteur.index',['anneeScolaire'=>annee()]) }}" type="button">Lister nos Tuteurs</a>
            </div></th>
    </tr>
    <tr>
   <th><div class="dropdown dropright">
      <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-university mr-2"></i>Classes
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <a class="dropdown-item" href="{{ route('classe.create',['anneeScolaire'=>annee()]) }}" type="button">Ajouter une Classe</a>
        <a class="dropdown-item" href="{{ route('classe.index',['anneeScolaire'=>annee()]) }}" type="button">Lister nos classes</a>
        <a href="#" class="dropdown-item" type="button">Ajouter Matiere a une classe</a>
      </div></th>
    </tr>
    <tr>
		<th><div class="dropdown dropright">
            <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-th-list mr-2"></i>Matieres
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="{{ route('matiere.create',['anneeScolaire'=>annee()]) }}" type="button">Ajouter une Matiere</a>
              <a class="dropdown-item" href="{{ route('matiere.index',['anneeScolaire'=>annee()]) }}" type="button">Lister nos Matieres</a>
              <a href="{{ route('classematiere.create',['anneeScolaire'=>annee()]) }}" class="dropdown-item" type="button">Ajouter Matiere a une classe</a>
            </div></th>
    </tr>
@if(lien()=='vrai')
    <tr>
		<th><div class="dropdown dropright">
            <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-table mr-2"></i>Evaluation
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="{{ route('evaluation.index','ajout',['anneeScolaire'=>annee()]) }}" type="button">Ajouter des notes d'evaluation</a>
              <a class="dropdown-item" href="#" type="button">Ajouter des notes d'evaluation en Arabe</a>
              <a class="dropdown-item" href="{{ route('evaluation.index','lister',['anneeScolaire'=>annee()]) }}" type="button">lister les notes d'evaluation</a>
              <a class="dropdown-item" href="#" type="button">Ajouter des notes</a>
              <a class="dropdown-item" href="#" type="button">Lister les notes</a>

            </div></th>
    </tr>
@endif
    <tr>
		<th><div class="dropdown dropright">
            <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-book mr-2"></i>Bultin
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              @if(lien()=='vrai')
              <a class="dropdown-item" href="{{ route('bultin.index',['anneeScolaire'=>annee()]) }}" type="button">Creer des Bultins</a>
              @endif
              <a class="dropdown-item" href="{{ route('bultin.index',['anneeScolaire'=>annee()]) }}" type="button">lister les Bultins</a>
              <a class="dropdown-item" href="#" type="button">Ajouter des notes</a>
              <a class="dropdown-item" href="#" type="button">Lister les notes</a>

            </div></th>
    </tr>

    <tr>
		<th><div class="dropdown dropright">
            <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-exchange mr-2"></i>Payement
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="{{ route('mensualite.create',['anneeScolaire'=>annee()]) }}" type="button">Effectuer un payement</a>
              <a class="dropdown-item" href="#" type="button">Lister les payements</a>
            </div></th>
    </tr>

    <tr>
		<th><div class="dropdown dropright">
            <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-calendar mr-2"></i>Année Scolaire
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="{{ route('anneeScolaire.create',['anneeScolaire'=>annee()]) }}" type="button">Ajouter une année scolaire</a>
              <a class="dropdown-item" href="{{ route('anneeScolaire.index',['anneeScolaire'=>annee()]) }}" type="button">Lister nos années scolaire</a>
            </div></th>
    </tr>
    <!--<tr>
        <th>
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Link with href
                </a>
              </p>
              <div class="collapse text-white" id="collapseExample">
                <a class="dropdown-item" href="{{ route('anneeScolaire.create') }}" type="button">Ajouter une année scolaire</a>
                <a class="dropdown-item" href="{{ route('anneeScolaire.index') }}" type="button">Lister nos années scolaire</a>
                              </div>
        </th>
    </tr>
-->
	<tr>
		<th><a href=""><i class="fa fa-lock mr-2"></i>Compte</a></th>
	</tr>
	<tr>
        <th>

            <a class="" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                           <i class="icon fa fa-sign-out fa-fw " aria-hidden="true"  ></i>
                           <span class="menu-action-text" id="actionmenuaction-6">
                             {{ __('Se deconnecter') }}
                           </span>
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
    </th>
	</tr>
</table>
</div>
b
