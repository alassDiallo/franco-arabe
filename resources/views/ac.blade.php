<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/css.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('style')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <title>{{ config('app.name','Franco-Arabe')}}</title>
    @yield('formulaire')
    <style type="text/css">
#menu{
    height:100px;
    backgroud:yellow;
}
    body{
        margin-top: 60px;
    }
    invalid-feedback{
color:red;
    }

    .helper{
        color : red;
    }
    table{
        margin-right : 50px;
    }
    thead{
        background : blue;
        color : white;
        text-align: center;
    }
    #menu{
	height: 100%;
    width: 300px;
    color:white;
}
table a{
    color: white;
}
.dropdown{
    color: white;
}
#av{
    height: 60px;
}
#note{
    margin-left:0px;
}
    </style>
</head>
<body>
<div id="nav-drawer" data-region="drawer" class="d-print-none moodle-has-zindex col-lg-3" aria-hidden="false" tabindex="-1">
        <nav class="list-group">
            <a class="list-group-item list-group-item-action active" href="https://ifoad.uadb.sn/mutualisation/course/view.php?id=11" data-key="coursehome" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="60" data-nodetype="0" data-collapse="0" data-forceopen="1" data-isactive="1" data-hidden="0" data-preceedwithhr="0">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-graduation-cap fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body font-weight-bold">Anglais L3 D2A</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/user/index.php?id=11" data-key="participants" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="90" data-nodetype="1" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="11">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-users fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Participants</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/badges/view.php?type=2&amp;id=11" data-key="badgesview" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="11">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-shield fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Badges</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/admin/tool/lp/coursecompetencies.php?courseid=11" data-key="competencies" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="11">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-check-square-o fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Compétences</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/grade/report/index.php?id=11" data-key="grades" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="11">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-table fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Notes</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/course/view.php?id=11#section-0" data-key="54" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="30" data-nodetype="1" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="11">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-folder-o fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Généralités</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/course/view.php?id=11#section-1" data-key="55" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="30" data-nodetype="1" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="11">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-folder-o fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Chapter 1 : Advice and suggestions</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/course/view.php?id=11#section-2" data-key="56" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="30" data-nodetype="1" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="11">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-folder-o fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Chapter 2 : Negotiating and dealing with problems</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/course/view.php?id=11#section-3" data-key="57" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="30" data-nodetype="1" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="11">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-folder-o fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Chapter 3 : Writing a CV in English</span>
                    </div>
                </div>
            </a>
        </nav>
        <nav class="list-group m-t-1">
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/my/" data-key="myhome" data-isexpandable="0" data-indent="0" data-showdivider="1" data-type="1" data-nodetype="1" data-collapse="0" data-forceopen="1" data-isactive="0" data-hidden="0" data-preceedwithhr="0">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-tachometer fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Tableau de bord</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/?redirect=0" data-key="home" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="myhome">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-home fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Accueil du site</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/calendar/view.php?view=month&amp;course=11" data-key="calendar" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="60" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="1">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-calendar fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Calendrier</span>
                    </div>
                </div>
            </a>
            <a class="list-group-item list-group-item-action " href="https://ifoad.uadb.sn/mutualisation/user/files.php" data-key="privatefiles" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="1">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-file-o fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body ">Fichiers personnels</span>
                    </div>
                </div>
            </a>
            <div class="list-group-item" data-key="mycourses" data-isexpandable="1" data-indent="0" data-showdivider="0" data-type="0" data-nodetype="1" data-collapse="0" data-forceopen="1" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="myhome">
                <div class="m-l-0">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-graduation-cap fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body">Mes cours</span>
                    </div>
                </div>
            </div>
            <a class="list-group-item list-group-item-action active" href="https://ifoad.uadb.sn/mutualisation/course/view.php?id=11" data-key="11" data-isexpandable="1" data-indent="1" data-showdivider="0" data-type="20" data-nodetype="1" data-collapse="0" data-forceopen="1" data-isactive="1" data-hidden="0" data-preceedwithhr="0" data-parent-key="mycourses">
                <div class="m-l-1">
                    <div class="media">
                        <span class="media-left">
                            <i class="icon fa fa-graduation-cap fa-fw " aria-hidden="true"></i>
                        </span>
                        <span class="media-body font-weight-bold">Anglais L3 D2A</span>
                    </div>
                </div>
            </a>
        </nav>
    </div>
</body>
</html>
