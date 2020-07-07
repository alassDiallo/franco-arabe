<div class="row">
<div class="col-md-1 img">
    <img src="/ecole/arabe.png">
</div>
<div class="text-center  col-md-8 ecole">
    <h1>Franco-Arabe El Hadj Amadou Lamine Diene</h1>
</div>
<div class="col-md-2">
    <img src="/ecole/arabe.png">
</div>
</div>
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
  <a class="navbar-brand" href="#">Franco-Arabe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">acueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">about</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="btn btn-success" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">

                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="" v-pre>
                    <span style="margin-right:10px;"><img src="/img/{{ Auth::user()->photo }}" class="mr-4" style="width:32px;height:32px;position:absolute;top:10;left:10;margin-right:100;border-radius:50%;"></span>
                    <span class="ml-4">{{ Auth::user()->fullName }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right menu  align-tr-br" id="action-menu-1-menu" data-rel="menu-content" aria-labelledby="action-menu-toggle-1" role="menu" data-align="tr-br" id="dropdown-menu-1">
                    @if(Auth::user()->profil!='directeur')
                    <a href="#" class="dropdown-item menu-action" role="menuitem" data-title="mymoodle,admin" aria-labelledby="actionmenuaction-1">
                            <i class="icon fa fa-tachometer fa-fw " aria-hidden="true"  ></i>
                        <span class="menu-action-text" id="actionmenuaction-1">
                            Tableau de bord
                        </span>
                    </a>
                    <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                    <a href="{{ Auth::user()->profil =='professeur'?route('profilProf'):'' }}" class="dropdown-item menu-action" role="menuitem" data-title="" aria-labelledby="actionmenuaction-2">
                            <i class="icon fa fa-user fa-fw " aria-hidden="true"  ></i>
                        <span class="menu-action-text" id="actionmenuaction-2">
                            Profil
                        </span>
                    </a>
                    @if(Auth::user()->profil=='eleve')
                    <a href="#" class="dropdown-item menu-action" role="menuitem" data-title="" aria-labelledby="actionmenuaction-3">
                            <i class="icon fa fa-table fa-fw " aria-hidden="true"  ></i>
                        <span class="menu-action-text" id="actionmenuaction-3">
                            Notes
                        </span>
                    </a>
                    @endif
                    <a href="#" class="dropdown-item menu-action" role="menuitem" data-title="messages,message" aria-labelledby="actionmenuaction-4">
                            <i class="icon fa fa-comment fa-fw " aria-hidden="true"  ></i>
                        <span class="menu-action-text" id="actionmenuaction-4">
                            Messages personnels
                        </span>
                    </a>
                    <a href="#" class="dropdown-item menu-action" role="menuitem" data-title="" aria-labelledby="actionmenuaction-5">
                            <i class="icon fa fa-wrench fa-fw " aria-hidden="true"  ></i>
                        <span class="menu-action-text" id="actionmenuaction-5">
                            Parametre
                        </span>
                    </a>
                    @endif
                    <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
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
        </div>
</div>
</div>
     </li>
        @endguest
    </ul>
  </div>
</div>
</nav>
