<?php
use Illuminate\Support\Facades\DB;

?>
@extends('layouts.customer.master')

@section('title')
<title>Crafttary | Cart</title>

@endsection

 @section('content')
 
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="table-responsive m-b-40">
                            @if (Session::has('status'))
			       <div class="alert alert-success">
				       {{Session::get('status')}}
				   </div>
		    @endif
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>name</th>
                                        <th>price</th>
                                        <th>quantity</th>
                                        <th>total price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!--///////////view cart item///////////-->
                                @foreach($items as $item)
                            
                                <tr>
                                    
                                        <td class="cart_product_img">
                                        <a href="#"><img src="/storage/product_images/{{$item->item_image}}" alt="item"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$item->item_name}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>${{$item->item_price}}</span>
                                        </td>
                                        {!!Form::open(['action' =>'ItemController@updateqty', 'class' =>'inoform', 'method' =>'POST', 'id'=> 'commentform'])!!}
                                        {{csrf_field()}}
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <ul>
                                                <li>
                                                <div class="form-group">
                                               
                                                <input type="number" class="form-control" name="quantity" value={{$item->quantity}}>
                                                <input type="hidden" class="form-control" name="item_price" value={{$item->item_price}}>
                                                <input type="hidden" class="form-control" name="total_price" value={{$item->total_price}}>
                                                
                                                <input type="hidden" class="form-control" name="id" value={{$item->id}}>
                                                
                                            </div>
                                            </li>
                                            <li>
                                            {{Form::submit('update', ['class' =>'btn btn-primary'])}}
                                            </li>
                                            </ul>
                                            </div>
                                        </td>
                                        {!!Form::close()!!}
                                        <td class="price">${{$item->total_price}}.00</td>
                                        <td>
                                        <a href="/removecart/{{$item->id}}" class="btn btn-warning">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    
                                         
                                </tbody>
                            </table>
                        </div>
                        {{$items->links()}}
                    </div>
                       <div class="col-12 col-lg-4">
                           <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>${{$total}}.00</span></li>
                                {{-- <li><span>delivery:</span> <span>${{$delivery}}.00</span></li>
                                <li><span>total:</span> <span>${{$total+$delivery}}.00</span></li> --}}
                            </ul>
                            
                               <div class="cart-btn mt-100">
                               
                                <a href="checkout" class="btn amado-btn w-100">Checkout</a>
                               </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    
    
    @endsection

    