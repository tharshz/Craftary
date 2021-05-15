@extends('layouts.admin.master')
@section('title')
<title>Search</title>
@endsection
            @section('content')
             
            <div class="container">
            @if (Session::has('status'))
        <div class="alert alert-success">
          {{Session::get('status')}}
        </div>
        @endif
        <form class="form-header" action="/search_order" method="post">
            @csrf
            <div class="form-group-lg">
                
                <label for="search">Search Orders</label>
                <input id="search" type="text" name="search" >
                <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
            </div>
            <div class="form-group">
                <label for="options">Search by:</label>
                <select class="form-control form-control-sm" name="options" id="options">
                    <option value="name">Name</option>
                    <option value="country">Country</option>
                    <option value="email">Email</option>
                    
                     </select>
                
            </div>
            
            <div class="col l2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
                            </form>
                        <div class="row m-t-30">
                         
                         

                            <div class="col-md-12">
                            
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                
                                                
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone No</th>
                                                <th>Email</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                
                                                <th>Status</th>
                                                
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td> 
                                             
                                             
                                                <td>{{$order->name}}</td> 
                                                <td>{{$order->address}}</td>
                                                <td>{{$order->phone_no}}</td>
                                                <td>{{$order->email}}</td>
                                                <td>{{$order->country}}</td>
                                                <td>{{$order->city}}</td>
                                             <td>{{$order->order_status}}</td>
                                             
                                            
                                                                                         </tr>
                                         @endforeach   
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        {{$orders->links()}}    
                </div>
                </div>
            </div>
            @endsection
            