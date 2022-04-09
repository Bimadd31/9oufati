@extends('layouts.app')
@section('content')

  
    <div id="shop-page"  class="container-md-custom position-relative mt-4 bg-white">
            <shop-content :products="{{$products}}" ></shop-content>
    </div>


@endsection