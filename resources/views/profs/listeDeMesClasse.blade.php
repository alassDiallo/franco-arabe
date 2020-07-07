@extends('profs.accueil')
@section('contenue')
@endsection
@section('contenu')
<div class="col-lg-12 mt-4 ml-4">
@if($user->classes()->count() > 0)
@foreach($user->classes as $classe)
        <a class="btn btn-primary btn-lg" style='color:white;' href="{{ route('classe',['classe'=>$classe->nomClasse]) }}">{{ $classe->nomClasse }}</a>
@endforeach
@else
<div class="">
{{ __('Vous n etes pas affecté à une classe') }}
</div>
</div>
@endif
<h4>{{ $user->classes()->count() }}  {{ Str::plural('classe',$user->classes()->count()) }}</h4>
@endsection
