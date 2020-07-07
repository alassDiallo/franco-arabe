@extends('directeurs.template')
@section('page')
<div class="">
    <div class="text-center mb-4">
    <h4>Choisissez la classe que vous voulez ajouter des notes</h4>
    </div>
    <div class="ml-4">
        @foreach(App\Models\Classe::all() as $classes)
        <a href="{{ route('note.create',['classe'=>$classes->nomClasse])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
         @endforeach
    </div>
</div>

<div class="">
    <div class="text-center mb-4">
    <h4>Choisissez la classe que vous voulez lister les notes</h4>
    </div>
    <div class="ml-4">
        @foreach(App\Models\Classe::all() as $classes)
        <a href="{{ route('note.show',['note'=>$classes->nomClasse])}}" class="btn btn-info"> {{ $classes->nomClasse   }}</a>
         @endforeach
    </div>
</div>

@endsection


