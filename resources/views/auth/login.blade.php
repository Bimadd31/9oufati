@extends('layouts.app')
@extends('layouts.header')
@section('content')

 <div class="container-md-custom position-relative mt-4  login-form-container">
            
            <div class="col-12 p-5">
                
                <div class="col-12 text-center d-flex justify-content-center ">
                    <div class="col-12 col-md-8 col-xl-6 col-xxl-4 p-5 border border-2 bg-white" >
                        <h5 class="mb-4">Se connecter</h5>
                        <form method="POST" action="{{ route('login') }}" class="login-form form-control border-0 p-2 mx-auto">
                            @csrf

                            <input type="email" id="email" name="email"  class="input-group-text text-start form-control  @error('email') is-invalid @enderror" placeholder="E-mail" required autocomplete="email" autofocus>
                            <br>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            <input type="password" name="password" class="input-group-text text-start form-control @error('password') is-invalid @enderror" placeholder="Mot de passe" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            
                            <div class="text-start my-3">
                                <input type="checkbox" class="rounded" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="ms-1">Rester connecté</label>
                                
                                @if (Route::has('password.request'))
                                <a class="float-end" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                @endif
                            </div>
                            <br>    
                            <div class="login-form-btn-container">
                                <input class="btn btn-success mb-2 rounded" type="submit" value="SE CONNECTER">
                                <div class="mb-2">OU</div>        
                                <a class="" href="{{ route('register')}}">Pas de compte ? S'inscrire</a>
                                
                                <a class="btn btn-primary fb-login-btn mt-2 mb-2 rounded" href="#" >SE CONNECTER AVEC FACEBOOK</a>
                                <a class="btn btn-light gmail-login-btn  rounded btn-outline-secondary" href="#">SE CONNECTER AVEC GOOGLE</a>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
 </div>
@endsection
