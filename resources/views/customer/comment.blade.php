@extends('layouts.customer.master')
@section('title')
<title>Crafttary | Comments</title>

@endsection

  @section('content')
        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                    @if (Session::has('status'))
           <div class="alert alert-success">
           {{Session::get('status')}}
          </div>
           @endif
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Item</a></li>
                                
                            </ol>
                        </nav>
                    </div>
                </div>
                @foreach($items as $item)
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="/storage/product_images/{{$item->item_image}}">
                                            <img class="d-block w-100" src="/storage/product_images/{{$item->item_image}}" alt="First slide">
                                        </a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="item-price">${{$item->item_price}}</p>
                                <a href="product-details">
                                    <h6>{{$item->item_name}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                   
                                    <div class="review">
                                       <!-- <a href="#">Write A Review</a>-->
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                
                            </div>

                            
                        

                            <!-- Add to Cart Form -->
                            <form action="/create_comment" method="POST">
                            @csrf
                                <div class="cart-btn d-flex mb-50">
                                <div class="col-md-6 mb-3">
                                <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about the item"></textarea>
                                    </div>
                                    
                                    <input type="hidden" name="item_id" value={{$item->id}}>    
                                </div>
                                <button type="submit" name="create_comment" value="5" class="btn amado-btn">Add Comments</button>
                            </form>

                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
            
        </div>
    @endsection