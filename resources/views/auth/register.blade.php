@extends('layouts.app')
@section('content')

<div class="container-md-custom position-relative mt-4 bg-white login-form-container p-4">
            
                <div class="col-12 d-flex justify-content-center align-items-center register-form-container">

                    <div class="col-md-12 col-xxl-9 p-5 d-flex justify-content-center align-items-center ">
                    <form  method="POST" action="{{ route('register') }}" class="row g-1 ">
                        @csrf
                        <div class="row mb-5 ">
                            <div class="col-md-4 ">
                            <h5 class="fs-5 text-black-50">Créer un compte</h5>
                            </div>
                            <div class="col-md-4"></div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="first-name" class="form-label">Prénom</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" required>
                                 @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="last-name" class="form-label">Nom</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"  required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" pattern="[0-9]*" maxlength="10" required>
                                  @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control @error('phone') is-invalid @enderror" id="email" name="email" required>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-4">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" required>
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="password" class="form-label">Confirmation du mot de passe</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-6 mb-4">
                                <input class="me-1" type="checkbox" id="term" required>
                                <label  for="term">J'ai lu et j'accepte les <a href="#"> Conditions générales de vente </a></label>

                            </div>
                        <div class="col-md-4"></div>
                        </div>
                        <div class="row mt-4 text-center">
                            <div class="col-md-4 register-form-btn-container">
                                <button type="submit" class="btn btn-success w-100 p-2">Créer votre compte</button>
                                <div class="my-2">OU</div> 
                                  <a class="btn btn-primary fb-login-btn mb-2 rounded" href="#" >SE CONNECTER AVEC FACEBOOK</a>
                                <a class="btn btn-light gmail-login-btn  rounded btn-outline-secondary" href="#">SE CONNECTER AVEC GOOGLE</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>

        </div> 
@endsection
