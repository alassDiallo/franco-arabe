@extends('directeurs.template')
@section('page')
<div class="ajout col-lg-6" style="">
<div class="card card-info">
    <div class="card-header">
        Ajouter une Classe
        </div>
    <div class="card-body">
    <form method="POST" action="{{ route('classe.store') }}" id="form"  class="">
        @csrf
        @include('utilisateur.formClasse',['bouton'=>'enregister la classe'])
    </div>
</div>
@endsection
