@extends('layouts.admin.master')
@section('title')
<title>OrderItem</title>
@endsection
            @section('content')
            {{Form::hidden('', $increment=1)}}
             
            <div class="container">
            @if (Session::has('status'))
        <div class="alert alert-success">
          {{Session::get('status')}}
        </div>
        @endif
        
                               
                   
                        <div class="row m-t-30">
                         
                         

                            <div class="col-md-12">
                            
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                
                                                
                                                <th>Order_id</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Total price</th>
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                             <td>{{($orders->currentpage()-1)*5+$increment}}</td> 
                                             <td>{{$order->order_id}}</td>
                                             
                                             <td><img src="/storage/product_images/{{$order->item_image}}" alt="" width="120px" height="120px" class="img-thumbnail" ></td> 
                                             
                                             <td>{{$order->quantity}}</td>
                                             <td>${{$order->total_price}}.00</td>
                                             
                                             
                                             
                 
                                            </tr>
                                            {{Form::hidden('', $increment=$increment + 1)}}
                                         @endforeach   
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        
                </div>
                <div>
                {{$orders->links()}}
                </div>
                </div>
            </div>
            @endsection