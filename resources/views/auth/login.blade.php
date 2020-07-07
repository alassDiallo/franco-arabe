@extends('layout.app')

@section('content')
<div class="row col-md-12" id="login">
<div class="col-md-3">
<img src="/ecole/icone_logo.png"/>
</div>
<div class="col-md-4" style="margin-left: 100px;">
    <div class="justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header bg-primary" style="color: white;">{{ __("S'Authentifier") }}</div>

                <div class="card-body bordered-primary">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nomUtilisateur" class="col-form-label">{{ __('Nom Utilisateur') }}</label>

                            <div class="">
                                <input id="nomUtilisateur" type="text" class="form-control @error('nomUtilisateur') is-invalid @enderror" name="nomUtilisateur" value="{{ old('nomUtilisateur') }}" required autocomplete="nomUtilisateur" autofocus>

                                @error('nomUtilisateur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-8 col-form-label">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('se connecter') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
