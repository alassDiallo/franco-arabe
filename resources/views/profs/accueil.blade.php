@extends('layout.app')
@section('content')
<div class="row" style="margin-top:20px;">
        <div class="col-lg-3 ml-4">
        <nav class="list-group m-t-1">
            <a class="list-group-item list-group-item-action active" href="#" data-key="myhome" data-isexpandable="0" data-indent="0" data-showdivider="1" data-type="1" data-nodetype="1" data-collapse="0" data-forceopen="1" data-isactive="0" data-hidden="0" data-preceedwithhr="0">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-tachometer fa-fw mr-2" aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Tableau de bord</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="#" data-key="home" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="myhome">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-home fa-fw mr-2" aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Accueil du site</span>
                    </div>
                </div>
            </a>

            <a class="list-group-item list-group-item-action " href="{{ route('mesClasses',['prof'=>Auth::user()->nomUtilisateur]) }}" data-key="home" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="myhome">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-table fa-fw mr-2" aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Lister mes classes</span>
                    </div>
                </div>
            </a>

            <a class="list-group-item list-group-item-action " href="#" data-key="calendar" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="60" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="1">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-calendar fa-fw mr-2" aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Calendrier</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="#" data-key="privatefiles" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="1">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-file-o fa-fw mr-2" aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Fichiers personnels</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="#" data-key="privatefiles" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="1">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-table fa-fw mr-2" aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Ajouter des notes</span>
                    </div>
                </div>
            </a>
        </nav>
    </div>
    <div class="col-lg-8">
    @yield('contenu')
    </div>
        </div>
@endsection
