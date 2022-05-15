@extends('layouts.app')
@section('content')

        <div class="checkout-container container-md-custom position-relative mt-4 ">
                <checkout-content :user="{{ auth()->user() }}"></checkout-content>
        </div>
@endsection