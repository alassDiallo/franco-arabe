@extends('layout.app')
@section('content')
<div class="row col-lg-12">
    <div class="col-lg-3 col-md-12 col-xs-12" id="">
        @include('layout.men')
    </div>
    <div class="col-lg-9 mt-1">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-primary">
              <li class="breadcrumb-item"><a href="#"><a href="{{ url()->current() }}" style="color:white;" class="ml-2">{!! request()->path()=='ac'?'<i class="fa fa-home mr-2 align-right" ></i>Accueil':str_replace('/',' / ',request()->path()) !!}</a><a href="" style="color:white;" class="mr-4 pull-right"></a></li>
            </ol>
          </nav>
        <!--<div class="breadcrum bg-primary mb-4"><a href="{{ url()->current() }}" style="color:white;" class="ml-2">{!! request()->path()=='ac'?'<i class="fa fa-home mr-2 align-right" ></i>Accueil':str_replace('/',' / ',request()->path()) !!}</a><a href="" style="color:white;" class="mr-4 pull-right"><span  class="fa fa-sign-out mr-2 pull-4"></span>Deconexion</span></a></div>-->
        <div class="dropdown col-md-2 pull-right dropdown-primary" style="background: black">
            <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             {{ annee()}}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                @foreach(App\Models\anneeScolaire::all() as $a)
<a class="dropdown-item" href="{{ route('accueil',['anneeScolaire'=>$a->anneeDebut.'-'.$a->anneeFin]) }}" type="button">{{ $a->anneeDebut}}-{{ $a->anneeFin}}</a>
                @endforeach
            </div>
          </div>
        @if(session()->has('notification.message'))
        <div class="alert alert-{{ session('notification.type') }} col-lg-12 text-center">
                {!! session()->get('notification.message') !!}
             </div>
             @endif
             @if(session()->has('message'))
            <div class="alert alert-danger ml-4 mb-4">{{ session()->get('message') }}</div>
            @endif
             <div class="mt-4">
        @yield('page')
     </div>
     </div>
     </div>
@endsection
