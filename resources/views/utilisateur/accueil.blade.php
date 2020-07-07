@extends('directeurs.template')
@section('style')
<style>
</style>
@endsection
@section('page')
  <div class="col-md-12" id="status">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-users ml-4"></i>
              <div class="count">{{ App\Models\Eleve::all()->count() }}</div>
              <div class="title"><h4>{{ Str::plural('Eleve',App\Models\Eleve::all()->count())}}</h4>
                <div class="text-center">
              {{ App\Models\Eleve::where('sexe','garçon')->count() }} {{ Str::plural('garçon',App\Models\Eleve::where('sexe','garçon')->count())}}</div>
                </div>
              <div class="text-center">{{ App\Models\Eleve::where('sexe','fille')->count() }} {{ Str::plural('fille',App\Models\Eleve::where('sexe','fille')->count())}}</div>
            </div><!--/.info-box-->
          </div><!--/.col-->

    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box yellow-bg">
            <i class="fa fa-university ml-4"></i>
            <div class="count">{{ App\Models\Classe::all()->count() }}</div>
            <div class="title"><h4>{{ Str::plural('Classe',App\Models\Classe::all()->count())}}</h4></div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
          </div><!--/.info-box-->
        </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box greenLight-bg">
              <i class="fa fa-eye ml-4"></i>
              <div class="count">{{ App\Models\Surveillant::all()->count() }}</div>
              <div class="title"><h4>{{ Str::plural('Surveillant',App\Models\Surveillant::all()->count())}}</h4></div>
              <div class="text-right">
                {{ App\Models\Surveillant::where('sexe','homme')->count() }} {{ Str::plural('homme',App\Models\Eleve::where('sexe','homme')->count())}}</div>
                <div class="text-right">{{ App\Models\Surveillant::where('sexe','femme')->count() }} {{ Str::plural('femme',App\Models\Surveillant::where('sexe','femme')->count())}}</div>
            </div><!--/.info-box-->
          </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box twitter-bg">
            <i class="fa fa-user ml-4"></i>
            <div class="count">{{ App\Models\Professeur::all()->count() }}</div>
            <div class="title"><h4>{{ Str::plural('Professeur',App\Models\Professeur::all()->count())}}</h4></div>
            <div class="text-right">
              {{ App\Models\Professeur::where('sexe','homme')->count() }} {{ Str::plural('homme',App\Models\Professeur::where('sexe','homme')->count())}}</div>
              <div class="text-right">{{ App\Models\Professeur::where('sexe','femme')->count() }} {{ Str::plural('femme',App\Models\Professeur::where('sexe','femme')->count())}}</div>

          </div><!--/.info-box-->
        </div><!--/.col-->
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-address-book ml-4"></i>
              <div class="count">{{ App\Models\Tuteur::all()->count() }}</div>
              <div class="title"><h4>{{ Str::plural('Tuteur',App\Models\Tuteur::all()->count())}}</h4></div>
              <div>&nbsp;</div>
            <div>&nbsp;</div>
            </div><!--/.info-box-->
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box facebook-bg">
              <i class="fa fa-th-list ml-4"></i>
              <div class="count">{{ App\Models\Matiere::all()->count() }}</div>
              <div class="title"><h4>{{ Str::plural('Matiere',App\Models\Matiere::all()->count())}}</h4></div>
              <div>&nbsp;</div>
            <div>&nbsp;</div>
            </div><!--/.info-box-->
          </div>
      </div>
</div>
  @endsection
