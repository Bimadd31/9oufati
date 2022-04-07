@extends('layouts.app')
@section('content')

    
    <div class="container-md-custom position-relative mt-4 bg-white">
        <div class="row">

                                        <!-- LEFT SIDE  -->

            <div class="col-md-3 shop-filter-container mt-5">
                <div class="row text-center">
                    <h4>Filtres</h4>
                </div>
                <div class="row pt-5">
                    <div class="col-md-10 mt-2 mx-auto">
                        <label for="input-filter" class="ms-2 mb-2 ">Rechercher</label>
                        <input class="form-control bg-light" type="text" id="input-filter" placeholder="Trouve ton produit">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-10 mt-2 mx-auto">
                            <div class="mb-3">Categorie</div>
                            <div class="ms-4 d-grid gap-1">
                                <div>
                                    <input type="checkbox" name="" id="check-all">
                                    <label class="ms-2" for="check-all">Tout</label>
                                </div>

                                <div>
                                    <input type="checkbox" name="" id="check-basket">
                                    <label class="ms-2" for="check-basket">Panier</label>
                                </div>

                                <div>
                                    <input type="checkbox" name="" id="check-fruits">
                                    <label class="ms-2" for="check-fruit">Fruits</label>
                                </div>

                                <div>
                                    <input type="checkbox" name="" id="check-vegetable">
                                    <label class="ms-2" for="check-vegetable">Légumes</label>
                                </div>

                                <div>
                                    <input type="checkbox" name="" id="check-spice">
                                    <label class="ms-2" for="check-spice">Épices</label>
                                </div>

                                <div>
                                    <input type="checkbox" name="" id="check-herb">
                                    <label class="ms-2" for="check-herb">Herbes</label>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

                                        <!-- RIGHT SIDE  -->

            <div class="col-md-9 shop-product-container p-0">

                <div class="row justify-content-end mt-4">
                    <div class="col-md-3">
                        <select name="" id="sort" class="w-75  ">
                            <option value="">Tri par récent au plus ancien</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>

                <div class="row bg-light mt-3 p-4 w-100 row-cols-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5" >

                    <!-- <div class="col p-0  mx-1 shop-product-container" style="border-radius:10px; ">

                            <div class="card text-center border-2 "  style="border-radius:10px;overflow: hidden;">
                                <img src="ressources/img/Orange.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Orange - limoun</h5>
                                    <p class="card-text">6.00 DH</p>
                                </div>
                                <div class="col-6 mb-3 mx-auto d-inline-flex justify-content-center mb-2 product-qte-select">
                                    <input  type="button" value="-" id="minus" onclick="product_qte(this);">
                                    <input type="text" id="shop-product-qte-value" class="w-25 text-center" value="1" disabled>
                                    <input  type="button" value="+" id="plus" onclick="product_qte(this);">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="product_id" value="">
                                    <input type="submit" value="AJOUTER AU PANIER">
                                </div>
                            </div>
                            
                    </div> -->
                  
                    @foreach ($products as $product)
                
                    <div class="col p-0  mx-1 shop-product-container" style="border-radius:10px; ">
                    
                        <div class="card text-center border-2 " style="border-radius:10px;overflow: hidden;">

                                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ number_format($product->sell_price,2)  }} DH</p>
                                </div>

                            <form id="form-shop-add-product" method="POST" novalidate>
                                @csrf
                                <div class="col-6 mb-3 mx-auto d-inline-flex justify-content-center mb-2 product-qte-select">
                                    <input type="button" value="-" id="minus" onclick="product_qte(this);">
                                    <input type="text" name="quantity" id="shop-product-qte-value" class="w-25 text-center" value="1">
                                    <input type="button" value="+" id="plus" onclick="product_qte(this);">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <add-product></add-product>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                    @endforeach
                    
                    
                    
                </div>
                    
                    
                        
                

                <script>

                            function product_qte(e) {

                            if (e.id === "plus"){
                                let input = e.previousElementSibling;
                                let value = parseInt(input.value, 10);
                                if (value < 10){
                                    value++;
                                    input.value = value;
                                    
                                }
                            }
                            if (e.id === "minus") {
                                let input = e.nextElementSibling;
                                let value = parseInt(input.value, 10);
                                if(value > 1){
                                    value--;
                                    input.value = value;
                                }
                            }
                        };
                    
                </script>
            </div>
        </div>
    </div>


@endsection