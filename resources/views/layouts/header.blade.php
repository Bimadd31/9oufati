<header class="d-flex flex-column">

        <!-- TOP HEADER BAR -->

        <div class="position-relative col-12 bg-green d-block" style="height: 40px;">

                <div class="lang-bar d-flex flex-row float-end p-2">

                        <div class="fr-link pe-3 ">
                        <a href="#">
                                <div class="flag fr-flag d-inline-flex  h-100 align-middle me-2"></div>
                                <span class="">Français</span>
                        </a>

                        </div>

                        <div class="vr h-50 align-self-center "></div>

                        <div class="ar-link px-3 pe-2 pe-md-5">
                        <a href="#">
                                <div class="flag ar-flag d-inline-flex h-100 align-middle me-2"></div>
                                <span>العربية</span>
                        </a>

                        </div>

                </div>
        </div>
        <!-- END -->

        <!-- MAIN NAV BAR -->
       
        <div class="position-relative  d-flex flex-wrap main-nav bg-white container-md-custom align-content-center">

                <div class="col-4 col-xxl-3">
                        <a href="{{ route('home')}}">
                                <div class="main-nav-logo d-flex align-items-center"></div>
                        </a>
                </div>

                <div class="col-4 col-xxl-6 ">
                        <div class="row my-2 my-xl-3">
                                <form class="input-group search-bar mx-auto">

                                        <input type="search" class="form-control bg-light" aria-label="Search"
                                        placeholder=" Trouve ton produit" maxlength="30"/>

                                        <button type="button" class="btn search-btn ">
                                        <i class="fas fa-search"></i>
                                        </button>
                                </form>
                        </div>
                        <div class="row my-3 my-xl-0 ">
                                <ul class="nav d-flex justify-content-center">
                                        <li><a href="{{ route('home') }}" class="nav-link 
                                                @if(url()->full() == route('home')) nav-link-active @endif">Accueil</a></li>

                                        <li><a href="{{ route('shop',['cat'=>'panier']) }}" class="nav-link
                                                @if(url()->full() == route('shop',['cat'=>'panier'])) nav-link-active @endif">Panier</a></li>

                                        <li><a href="{{ route('shop',['cat'=>'fruits']) }}" class="nav-link
                                                @if(url()->full() == route('shop',['cat'=>'fruits'])) nav-link-active @endif">Fruits</a></li>

                                        <li><a href="{{ route('shop',['cat'=>'legumes']) }}" class="nav-link 
                                                @if(url()->full() == route('shop',['cat'=>'legumes'])) nav-link-active @endif">Légumes</a></li>

                                        <li><a href="{{ route('shop',['cat'=>'herbe']) }}" class="nav-link 
                                                @if(url()->full() == route('shop',['cat'=>'herbe'])) nav-link-active @endif">Herbe</a></li>

                                        <li><a href="{{ route('shop',['cat'=>'epices']) }}" class="nav-link 
                                                @if(url()->full() == route('shop',['cat'=>'epices'])) nav-link-active @endif">Epices</a></li>
                                </ul>
                        </div>
                </div>

                <div class="col-4 col-xxl-3 d-flex flex-column">
       
                        <div class="col-10 d-inline-flex align-items-center justify-content-end">

                                {{-- <div class="d-inline-flex ">
                                        <a href="#" class="text-decoration-none">
                                                <div class="mt-1 fs-5" style="color: orange;font-weight: bold">Se connecter</div>
                                        </a>
                                </div> --}}

                                        <!-- NAVIGATION CART CONTAINER -->

                                <div id="nav-cart-btn" class="nav-cart-btn col-4 d-flex align-items-center justify-content-center btn-group">

                                        <header-cart :data="{{$incart_products}}" ></header-cart>
                                
                                </div>
                                        <!-- NAVIGATION ACCOUNT CONTAINER -->
                                <div class="col-1 nav-right-vr rounded ms-2"></div>

                                <div class="col-4 d-flex align-items-center  btn-group">

                                        
                                        
                                        <div class="d-flex align-items-center justify-content-end nav-account-container px-2"
                                                @auth
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                @endauth
                                                @guest 
                                                        data-bs-toggle="modal" data-bs-target="#loginModal"
                                                {{-- onclick="location.href ='{{ route('login') }}' --}}
                                                @endguest ">
                                                
                                                <i class="nav-account-icon align-middle me-2"></i>
                                                <span class="nav-account-text">Compte</span>

                                        </div>
                                        <!-- NAVIGATION ACCOUNT DROPDOWN -->
                                
                                        @auth     
                                                <ul class="dropdown-menu dropdown-menu-end mt-3">
                                                        <li class="nav-account-user-welcome py-2 px-3">Bienvenue, {{auth()->user()->first_name}}</li>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="">
                                                        <li class="dropdown-item">Mes commandes</li>
                                                        </a>
                                                        <a href="">
                                                        <li class="dropdown-item">Mes adresses</li>
                                                        </a>
                                                        <a href="">
                                                        <li class="dropdown-item">Paramétre</li>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">

                                                        <li class="dropdown-item">Déconnexion</li>
                                                        </a>
                                                <form id="logout-form"  method="POST" action="{{ route('logout') }}" class="d-none">
                                                        @csrf
                                                </form>
                                        @endauth

                                </div>

                        </div>

                                <div class="col-12 d-flex align-items-center justify-content-end  mt-4">
                                        <div class="me-5">
                                                <a href="#" class="text-decoration-none ">
                                                        <div class="btn-help ">Besoin d'aide ?</div>
                                                </a>
                                        </div>
                                </div>
                </div>
        </div>
       
</header>

     
  

   