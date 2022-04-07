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
        <div class="col-12">
        <div class="position-relative  d-flex flex-wrap main-nav bg-white container-md-custom align-content-center">

                <div class="col-4">
                <a href="{{ route('home')}}">
                        <div class="main-nav-logo d-flex align-items-center"></div>
                </a>
                </div>

                <div class="col-4 d-flex flex-column align-content-center justify-content-end">
                        <form class="input-group search-bar mx-auto my-2 my-xl-3">

                                <input type="search" class="form-control bg-light" aria-label="Search"
                                placeholder=" Trouve ton produit" maxlength="30"/>

                                <button type="button" class="btn search-btn ">
                                <i class="fas fa-search"></i>
                                </button>
                        </form>

                        <ul class="nav mx-auto my-3 my-xl-0">
                                <li><a href="#" class="nav-link nav-link-active">Accueil</a></li>
                                <li><a href="#" class="nav-link ">Panier</a></li>
                                <li><a href="#" class="nav-link ">Fruits</a></li>
                                <li><a href="#" class="nav-link ">Légumes</a></li>
                                <li><a href="#" class="nav-link ">Herbe</a></li>
                                <li><a href="#" class="nav-link ">Epices</a></li>
                        </ul>
                </div>

        <div class="col-4 d-flex flex-column">

                                

                <div class="col-12 d-inline-flex align-items-center justify-content-center   justify-content-xxl-end">

                        {{-- <div class="d-inline-flex ">
                                <a href="#" class="text-decoration-none">
                                        <div class="mt-1 fs-5" style="color: orange;font-weight: bold">Se connecter</div>
                                </a>
                        </div> --}}

                                <!-- NAVIGATION CART CONTAINER -->

                        <div class="nav-cart-btn col-4 col-xxl-3 d-flex align-items-center justify-content-center btn-group">
                                
                        

                        <a href="#" class="text-decoration-none d-flex align-items-center justify-content-end"
                                data-bs-toggle="dropdown">

                                <i class="nav-cart-icon position-relative align-middle me-2">
                                <span id="nav-account-count-container"
                                        class="position-absolute nav-account-count-container rounded-circle start-50 text-center">
                                        <span id="nav-cart-count" class="nav-cart-count">@auth {{$basket_products->count()}}@endauth</span>
                                </span>
                                </i>
                                <span class="nav-cart-text ">Panier</span>

                        </a>

                        <!-- CART WIDGET DROPDOWN -->
                        
                        <div class="position-absolute nav-cart-widget-container col-12 pb-3  mt-3 dropdown-menu dropdown-menu-end " 
                                style="width: 320px;max-height: 600px;" >
                                <div class="d-flex col-12 justify-content-start align-items-center">
                                <div class="ms-4 px-2 py-3 cart-widget-subtotal-text">Sous-total : <span
                                        class="cart-widget-subtotal ms-2"></span></div>

                                </div>
                                <div class="col-12 mx-auto mb-3"
                                style="height: 0.5px; width: 60%;background-color: #D0CDCD;opacity: 0.5;"></div>

                                <div class="col-12 d-flex flex-column align-items-center justify-content-center">

                                      @auth
                                                @foreach ($basket_products as $product)
                                                
                                                <div class="card nav-cart-item mb-1 d-flex justify-content-center"
                                                        style="width: 300px;height: 80px;">
                                                        <div class="row g-0">
                                                        <div class="col-4 d-flex justify-content-center align-items-center">
                                                                <img src="..{{ $product->image }}" class="nav-cart-item-img">
                                                        </div>

                                                        <div class="col-8">
                                                                <form id="header-product-form" method="POST" novalidate >
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        
                                                                <input id="product_id" name="product_id" type="hidden" value="{{ $product->product_id }}">
                                                                <div class="card-body">

                                                                <input type="submit" id="submit" class="rounded-circle nav-cart-item-del-btn position-absolute d-block"
                                                                        style="width: 18px;height: 18px;" value="">
                                                                <p class="card-title">{{ $product->name }}</p>
                                                                <p class="card-text text-end">
                                                                        <span class="nav-cart-item-quantity pe-1">
                                                                                {{$product->quantity}} 
                                                                                {{$product->mesure_unit }}
                                                                        </span>x<span
                                                                        class="nav-cart-item-price ps-1">{{ number_format($product->sell_price,2)}} DH</span>
                                                                </p>
                                                                </div>
                                                                </form>
                                                        </div>
                                                        </div>
                                                </div>
                                                @endforeach
                                        @endauth
                                </div>

                                

                                <div class="col-12 mx-auto my-3 nav-cart-widget-btn-container"></div>

                                <div class="col-12 d-flex ">
                                <div class="col-4 pt-2 nav-cart-widget-btn ms-3"
                                        onclick="window.location.href='{{ route('cart') }}'" style="background-color: #5c824a;">
                                        <span>Allez au panier</span>
                                </div>
                                <div class="col-4 pt-2 nav-cart-widget-btn ms-2" onclick="window.location.href='#'"
                                        style="background-color: #cd4848;">
                                        <span>Commander</span>
                                </div>
                                </div>
                        </div>

                        </div>
                                <!-- NAVIGATION ACCOUNT CONTAINER -->
                        <div class="col-1 nav-right-vr rounded me-1"></div>

                        <div class="col-4 d-flex align-items-center justify-content-md-start btn-group">

                                
                                
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

                        <br>
                                <div class="d-flex flex-row col-12 align-content-center justify-content-end">
                                        <a href="#" class="text-decoration-none">
                                        <div class="btn-help mt-1">Besoin d'aide ?</div>
                                        </a>
                                </div>
                </div>
        </div>
        
</header>

     
  

   