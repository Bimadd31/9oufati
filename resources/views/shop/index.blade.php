@extends('layouts.app')
@section('content')

  
    <div id="shop-page" class="vueShared container-md-custom position-relative mt-4 bg-white">
      
        <shop-content  :categories="{{$categories}}" :products="{{$products}}" cat="{{$catProp}}" ></shop-content>
        
    </div>


@endsection