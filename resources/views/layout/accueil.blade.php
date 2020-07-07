@extends('layout.app')
@section('content')
<style>
    .doublet{
        padding: 10px;
        margin-top: 50px;
        text-align: justify;
        margin-left:2px;
        margin-right: 2px;
    }
    #roleD{
        padding: 20px;
        background: orange;
        border:2px solid;
    }

    #roleE{
        background: green;
        border:2px solid;
    }

    #roleF{
        background: silver;
        border:2px solid;
    }
    </style>
<div class="">
<div id="carouselExampleIndicators" class="carousel slide col-lg-12" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/ecole/fr_ar03.JPG" class="d-block" alt="Bonjour" style="width:100%;height:400px;">
      </div>
      <div class="carousel-item">
        <img src="/ecole/fr_ar01.JPG" class="d-block" alt="Bonsoir" style="width:100%;height:400px;">
      </div>
      <div class="carousel-item">
        <img src="/ecole/acceuilParent.jpg" class="d-block w-100" alt="aller" style="width:100%;height:400px;">
      </div>

      <div class="carousel-item">
        <img src="/ecole/fr_ar04.JPG" class="d-block w-100" alt="Bonsoir" style="width:100%;height:400px;">
      </div>
      <div class="carousel-item">
        <img src="/ecole/school2.jpg" class="d-block w-100" alt="aller" style="width:100%;height:400px;">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-4 col-xs-12 doublet container" id="roleE">
            <h3>Description de L'école</h3>
            <p>
                L'école franco-arabe El Hadji Amadou Lamine Diene est située à la Geule Tapée Rue 63 x 64 Dakar

            </p>

        </div>
        <div class="col-md-4 col-xs-12 doublet container" id="roleD">
            <h3>
                Le rôle du Directeur
            </h3>
            <p>
                Veille, avec l’ensemble du personnel de l’école, à créer un milieu scolaire accueillant,
                stimulant et sécuritaire pour tous. Voit à la mise en œuvre du plan de lutte contre l'intimidation
                et la violence de l’école. Voit à l’application des règles de conduite et des mesures de sécurité de l’école, qui prévoient les comportements attendus et proscrits ainsi que les sanctions applicables selon la gravité de l’acte.
Reçoit et traite avec diligence les déclarations d’événements relatifs à la violence et à l’intimidation.
Communique promptement avec les parents des élèves directement impliqués, après avoir considéré l’intérêt de ceux-ci, pour les informer des mesures prévues dans le plan de lutte contre l'intimidation et la violence.
Prévoit des mesures de remédiation et de réinsertion lors de la suspension d’un élève.
Transmet au directeur général de la commission scolaire et à l’élève un rapport sommaire sur l’acte de violence ou d’intimidation et son suivi.
            </p>
        </div>
        <div class="col-md-4 col-xs-12 doublet" id="roleF">
            <h3>
                Importance du directeur
            </h3>
            <p>
                Un bon directeur d’école peut réduire le décrochage scolaire.

                Pour devenir directeur, il faut d’abord commencer par compléter le baccalauréat
                de quatre ans en enseignement. Il faut aussi obtenir un brevet d’enseignant et posséder
                au moins huit ans d’expérience avant de postuler. Il est ensuite possible de suivre une
                formation continue en gestion de l’éducation. L’Université de Sherbrooke offre plusieurs
                formations destinées aux nouveaux directeurs, dont un microprogramme et un diplôme de 2e
                cycle en gestion de l’éducation, de même qu’une maîtrise en gestion de l’éducation et de
                la formation.
            </p>

        </div>
    </div>
</div>
</div>
@endsection
