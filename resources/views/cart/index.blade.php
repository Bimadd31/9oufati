@extends('layouts.app')
@section('content')

        <div class="container-md-custom bg-white position-relative mt-5 cart-container">
         
                <div class="row ">
                    <div class="col-5 col-xxl-4  d-flex justify-content-start align-items-center ">
                        <img src="/img/cart-vector.png" alt="" >
                    </div>
                    <div class="col-6 col-xxl-4 d-flex flex-column justify-content-center align-items-center text-center pt-5 pe-xxl-3 " style="gap: 4rem;">
                        <div class="cart-empty-msg">Votre panier est actuellement vide.</div>
                        <a href="{{ route('home') }}">
                        <input class="cart-empty-return-btn" type="button" value="RETOUR A LA BOUTIQUE">
                    </a>
                    </div>
                </div>
          

        </div> 

@endsection