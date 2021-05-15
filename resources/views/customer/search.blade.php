@extends('layouts.customer.master')
 
@section('title')
<title>Crafttary | Search</title>

@endsection
  @section('content')
        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            {{-- <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <!--//////////  view catecories  /////////-->
                @foreach ($categories as $category)
                <div class="catagories-menu">
                    <ul>
                        <li><a href="/view_by_cat/{{$category->category_name}}" class="{{(request()->is('view_by_cat/'.$category->category_name)?'active':'')}}">{{$category->category_name}}</a></li>
                        
                    </ul>
                </div>
                @endforeach

            </div> --}}
             
            
        </div>

        <div class="amado_product_area section-padding-100">
        @if (Session::has('status'))
			       <div class="alert alert-success">
				       {{Session::get('status')}}
				   </div>
		    @endif
			@if (count($errors) > 0)
			       <div class="alert alert-danger">
				        <ul>
						    @foreach ($errors->all() as $error)
							    <li>{{$error}}</li>
							@endforeach
						</ul>
				       
				   </div>
			@endif
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Showing Items</p>
                                <div class="view d-flex">
                                    
                                </div>
                            </div>
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                
                   <!--///////  view all products  ///////-->
                
                    <!-- Single Product Area -->
                    @foreach ($items as $item)
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    
                        <div class="single-product-wrapper">
                        
                            <!-- Product Image -->
                            <div class="product-img">
                            
                                <img src="/storage/product_images/{{$item->item_image}}" alt="">
                               
                                
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">${{$item->item_price}}</p>
                                    <a href="product-details">
                                        <h6>{{$item->item_name}}</h6>
                                    </a>
                                
                                </div>
                            
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    
                                    <div class="cart">
                                    <!--/////add to cart/////-->
                                    <form action="/add_to_cart" method="GET">
                                    
                                    @csrf
                                    
                                    <input type="hidden" name="item_id" value={{$item->id}}>
                                    <input type="hidden" name="item_price" value={{$item->item_price}}>
                                    <button class="btn btn-warning">Add to Cart</button>
                                    </form>
                                    <form action="/add_comment" method="GET">
                                    @csrf
                                    <div>
                                    <input type="hidden" name="item_id" value={{$item->id}}>
                                    <button class="btn">Comments</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                           
                    </div>
                    @endforeach     
                </div>
                   
                    
                  

                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                       
                        <!--<nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                <li class="page-item"><a class="page-link" href="#">04.</a></li>
                                   
                                
                            </ul>
                        </nav>-->
                    </div>
                </div>
            </div>
        </div>
     @endsection