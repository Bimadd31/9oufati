<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
     <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />


    {{-- <script src="node_modules/@popperjs/core/dist/umd/popper.js"></script> --}}
    {{-- <script src="node_modules/jquery/dist/jquery.js"></script> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
</head>
<body>
                
                  <div class="w-100 alert-banner position-fixed " style="z-index: 50">
                        <div class='success-alert text-center alert alert-success' role='alert'></div>
                        <div class='exist-alert text-center alert alert-danger' role='alert'></div>

                  </div>
               
                        @include('layouts.header')
                        @yield('content')
               
        
      <script src="{{ mix('js/app.js') }}" ></script>

       
        
        @include('auth.login')
        @yield('scripts')
</body>
</html>
