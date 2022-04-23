@extends('layouts.app')


@section('content')
 
    <main>
         
        <section class="position-relative mt-3">
            <div class="swiper">

                <div class="swiper-wrapper">

                    <div class="swiper-slide slide-1"></div>
                    <div class="swiper-slide slide-2"></div>
                    <div class="swiper-slide slide-3"></div>
                    ...
                </div>

                <!-- <div class="swiper-pagination"></div> -->

                <div id="swiper-button-prev" class="swiper-button-prev" style="color: white;opacity: 0.5;"></div>
                <div id="swiper-button-next" class="swiper-button-next" style="color: white;opacity: 0.5;"></div>

                <div class="swiper-scrollbar"></div>
            </div>
        </section>
        <section class="main-categories-container container-md-custom mt-2 d-flex flex-column align-items-center">
            <div class="col-11">
                <div class="row">
                    @foreach ($Category as $category)
                          
                        @if ($category->id != 5)
                            <div class="col-6 col-lg-3 d-flex justify-content-center align-items-center p-0">
                           
                                <div class="category-btn-container" onclick="window.location.href = 'shop?cat={{$category->name}}' ">
                                 
                                    <div class="category-btn-img"
                                        style="background-image: url('{{$category->image }}');"></div>
                                    <div class="position-relative">{{$category->name }}</div>

                                </div>
                        @endif
                    </div>
                    
                    @endforeach

                   
                </div>
            </div>
        </section>
    </main>


    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="/js/swiper.js"></script>

      
        

@endsection
