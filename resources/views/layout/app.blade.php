<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}">
    <link rel="stylesheet" href="{{ asset('/bootstrap/js/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ asset('/css/monstyle.css') }}">

    @yield('style')
    @yield('formulaire')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <title>{{ config('app.name','Franco-Arabe')}}</title>
    <style type="text/css">
    </style>
</head>
<body>
@include('layout._nav')
<div>
    @yield('content')
</div>
@guest
@include('layout.footer')
@endguest

<script src="{{ asset('/bootstrap/js/jquery.js') }}" defer></script>
<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" defer></script>
 <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
 @include('flashy::message')
 <script>
     $(document).ready(function(){
        $('#roleD').hide();
        });
     });
    </script>
</body>
</html>
