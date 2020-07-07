@extends('directeurs.template')
@section('page')
<div class="">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bultins</a>
        </li>
        @if(lien()=='vrai')
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Creer Bultin</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Lister Bultins Creer</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div id="detail" class="ml-4 mt-4">
                <div class="col-md-6" id="status">
                    <div class="row">
                      <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                          <div class="info-box green-bg">
                            <i class="fa fa-table ml-4"></i>
                            <div class="count">{{ $bultin->count() }}</div>
                            <div class="title"><h4>{{ Str::plural('Bultin',$bultin->count())}}</h4></div>
                            <div>{{ $bultin->where('semestre','s1')->count() }} Semestre 1</div>
                            <div>{{ $bultin->where('semestre','s2')->count() }} Semestre 2</div>
                          </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        @if(lien()=='vrai')
        <div class="tab-pane fade ml-4 mt-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <h4>Choisissez la classe que vous voulez creer les bultins</h4>
            @foreach(App\Models\Classe::all() as $classes)
        <a href="{{ route('bultin.create',['classe'=>$classes->nomClasse,'anneeScolaire'=>annee()])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
         @endforeach
        </div>
         @endif
        <div class="tab-pane fade ml-4 mt-4" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <h4>Choisissez la classe que vous voulez lister les Bultins</h4>
            @foreach(App\Models\Classe::all() as $classes)
            <a href="{{ route('bultin.create',['class'=>$classes->nomClasse,'anneeScolaire'=>annee()])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
             @endforeach
            </div>
        </div>
      </div>


<!--
-->
</div>

@endsection


