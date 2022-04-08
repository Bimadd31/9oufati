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

                <div id="shop-products-container" class="row bg-light mt-3 p-4 w-100 row-cols-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5" >

                    @foreach ($products as $product)
                        
                    <add-product 
                        image="{{ $product->image }}" 
                        name="{{ $product->name }}"
                        id="{{ $product->id }}"
                        price="{{ $product->sell_price }}"
                        category="{{ $product->category_name }}"></add-product>
                    @endforeach
                   
                    
                    
                </div>
                    
                    
                        
                

                
            </div>
        </div>
    </div>


@endsection