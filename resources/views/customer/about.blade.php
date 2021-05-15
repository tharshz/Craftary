@extends('layouts.customer.master')

@section('title')
<title>Crafttary | About</title>

@endsection

@section('content')
    
<div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Product</a></li> --}}
                                <!--<li class="breadcrumb-item"><a href="#">Coconut Shell</a></li>-->
                                <!--<li class="breadcrumb-item active" aria-current="page">white modern chair</li>-->
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <!--<ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(customer/img/product-img/pro-big-1.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(customer/img/product-img/pro-big-2.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(customer/img/product-img/pro-big-3.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(customer/img/product-img/pro-big-4.jpg);">
                                    </li>
                                </ol>-->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="customer/img/product-img/pro-big-1.jpg">
                                            <img class="d-block w-100" src="customer/img/bg-img/crafttaryshop.jpg" alt="First slide">
                                        </a>
                                        <a class="gallery_img" href="customer/img/product-img/pro-big-1.jpg">
                                            <img class="d-block w-100" src="customer/img/bg-img/1111.jpg" alt="First slide">
                                        </a>
                                    </div>
                                   <!-- <div class="carousel-item">
                                        <a class="gallery_img" href="customer/img/product-img/pro-big-2.jpg">
                                            <img class="d-block w-100" src="customer/img/bg-img/18.jpg" alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="customer/img/product-img/pro-big-3.jpg">
                                            <img class="d-block w-100" src="customer/img/bg-img/19.jpg" alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="customer/img/product-img/pro-big-4.jpg">
                                            <img class="d-block w-100" src="customer/img/bg-img/20.jpg" alt="Fourth slide">
                                        </a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price"></p>
                                <a href="product-details">
                                    <h6>Crafttary</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                   <!-- <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>-->
                                    <div class="review">
                                       <!-- <a href="#">Write A Review</a>-->
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                
                            </div>

                            <div class="short_overview my-5">
                                <p>Crafttary is a handicraft based organization dedicated to producing  quality , various kinds of handicraft production such as coconut shell, seashells, bamboo, sea food, ice-cream sticks, wood and other wastages.

                                    Founded in 2012 by a curious man, Mr. Sureshkumar in the name of SNP handicraft center who is the Master Craftsman of National Crafts Council, Srilanka; also provide training relates with coconut shell based things and also invited by many organization as a resource person for training youths. He strives to maintain market facilities and earned good names in the local and foreign markets as well.
                                    
                                    Mr.Kandiah Baskaran, chairman of IBC Tamil met him and got impressed with his works and products in 2017 at Jaffna Trade Fair. He built a factory and showroom in the vision to bring job opportunities for more people  and named as crafftry.The coconut and bamboo based products are now exported to Diaspora community and also tourists visits the crafftry showroom which is situated in Illakady, Kopay North, Jaffna, Sri Lanka to purchase things especially for having natural things in their house and giving as gifts.
                                    
                                    </p>
                            </div>

                            <!-- Add to Cart Form -->
                            {{-- <form action="/ordernow" method="POST">
                                <div class="cart-btn d-flex mb-50">
                                <div class="col-md-6 mb-3">
                                <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about the product"></textarea>
                                    </div>
                                    
                                    <!--<div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>-->
                                </div>
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                            </form> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    
@endsection