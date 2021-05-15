 <?php
 use App\Http\Controllers\ItemController;
 $total=0;
 if(Session::has('customer')){
 $total= ItemController::cartItem();
 }
 ?>       

        
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo my_logo">
                <a href="/"><img src="{{asset('customer/img/bg-img/16.png')}}" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="{{URL::to('shop')}}" class="{{(request()->is('shop')?'active':'')}}">Shop</a></li>
                    {{-- <li><a href="product_details">Product</a></li> --}}
                    {{-- <li><a href="cart">Cart</a></li> --}}
                    <li><a href="/about">About</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                
                <a href="/signup" class="btn amado-btn mb-15">Signup</a>
                @if (Session::has('customer'))
                <li class="dropdown">
                <h2 class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('customer')['firstname']}}
                <span class="caret"></span></h2>
                <ul class="dropdown-menu">
                <li><a href="/logout" class="btn amado-btn active">Logout</a></li>
                </ul>
                </li>
                @else
                <li><a href="/logincustomer" class="btn amado-btn active">Login</a></li>
                @endif
            </div>
            
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
               <!--///////session has get total quantity//////-->
                <a href="cart" class="cart-nav"><img src="customer/img/core-img/cart.png" alt=""> Cart <span>[{{$total}}]</span></a>
                {{-- <a href="#" class="fav-nav"><img src="customer/img/core-img/favorites.png" alt=""> Favourite</a> --}}
                <a href="#" class="search-nav"><img src="customer/img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                {{-- <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a> --}}
                <a href="https://www.facebook.com/crafttary/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                {{-- <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> --}}
            </div>
        </header>