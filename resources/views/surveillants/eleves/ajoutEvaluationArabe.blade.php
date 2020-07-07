@extends('directeurs.template')
@section('page')
<div class="">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Evalations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ajouter une evaluation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Lister les notes d'evaluation</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div id="detail" class="ml-4 mt-4">
                <div class="col-md-6" id="status">
                    <div class="row">
                      <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                          <div class="info-box green-bg">
                            <i class="fa fa-book ml-4"></i>
                            <div class="count">{{ $evaluation->count() }}</div>
                            <div class="title"><h4>{{ Str::plural('Evaluation',$evaluation->count())}}</h4></div><!--/.info-box-->
                          </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade ml-4 mt-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <h4>Choisissez la classe que vous voulez ajouter des notes</h4>
            @foreach(App\Models\Classe::all() as $classes)
            <a href="{{ route('evaluationArabe.create',['classe'=>$classes->nomClasse])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
             @endforeach
        </div>
        <div class="tab-pane fade ml-4 mt-4" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <h4>Choisissez la classe que vous voulez lister les notes</h4>
                    @foreach(App\Models\Classe::all() as $classes)
                    <a href="{{ route('evaluationArabe.show',['evaluationArabe'=>$classes->nomClasse])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
                     @endforeach
            </div>
        </div>
      </div>


<!--
-->
</div>

@endsection


