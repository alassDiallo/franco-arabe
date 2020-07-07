<style>
#menu{
    padding:10px;
    border-radius:10px;
    background:blue;
    height:300px;
    color:white;
    text-align:center;
}
</style>
<div class="container">
<div id="menu">
<div class="dropdown">
  <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Enregister
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <a class="dropdown-item" href="{{ route('eleve.create') }}" type="button">Ajouter un eleve</a>
    <a href="{{ route('classe.create') }}" class="dropdown-item" type="button">Ajouter une classe</a>
    <a href="{{ route('surveillant.create') }}" class="dropdown-item" type="button">Ajouter un Surveillent</a>
    <a href="{{ route('classe.create') }}" class="dropdown-item" type="button">Ajouter une Professeur</a>
    <a href="{{ route('matiere.create') }}" class="dropdown-item" type="button">Ajouter une Matiére</a>
    <a href="{{ route('classematiere.create') }}" class="dropdown-item" type="button">Ajouter une Matiére a une classe</a>
    <a href="{{ route('anneeScolaire.index') }}" class="dropdown-item" type="button">Ajouter une annee scolaire</a>
    <button class="dropdown-item" type="button">Something else here</button>
  </div>
</div>
<a class="" href="{{ route('inscription.create') }}">Reinsciptio</a>
<div class="dropdown">
  <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Lister
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <a class="dropdown-item" href="{{ route('eleve.index') }}" type="button">Lister nos Eleves</a>
    <a href="{{ route('classe.index') }}" class="dropdown-item" type="button">Lister nos classes</a>
  <a href="{{ route('tuteur.index')}}" class="dropdown-item" type="button">Lsiter les tuteurs</a>
  <a href="{{ route('surveillant.index') }}" class="dropdown-item" type="button">Lister nos Surveillents</a>
    <a href="#" class="dropdown-item" type="button">Lsiter nos Professeurs</a>
    <a href="{{ route('matiere.index') }}" class="dropdown-item" type="button">Lsiter nos Matieres</a>
    <button class="dropdown-item" type="button">Something else here</button>
  </div>
</div>
</div>
</div>
