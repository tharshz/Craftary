@extends('layouts.admin.master')
@section('title')
<title>Order</title>
@endsection
            @section('content')
            {{Form::hidden('', $increment=1)}}
             
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
                               
                            {{-- </form action="/order_pdf" method="post">
                            @csrf
                            <div >
                                <!-- -->
                                <div class="input-field col s10 offset-s1 m4 l4 xl3 offset-xl1">
                                    <i class="material-icons prefix">date_range</i>
                                    <input type="date" name="date_from" id="date_from" class="datepicker" value="{{old('date_from') ? : ''}}">
                                    <label for="date_from">Date From</label>
                                    <span class="{{$errors->has('date_from') ? 'helper-text red-text' : ''}}">{{$errors->has('date_from') ? $errors->first('date_from') : ''}}</span>
                                </div>
                                <div class="input-field col s10 offset-s1 m4 l4 xl3">
                                    <i class="material-icons prefix">date_range</i>
                                    <input type="date" name="date_to" id="date_to" class="datepicker" value="{{old('date_to') ? : ''}}">
                                    <label for="date_to">Date To</label>
                                    <span class="{{$errors->has('date_to') ? 'helper-text red-text' : ''}}">{{$errors->has('date_to') ? $errors->first('date_to') : ''}}</span>
                                </div>
                                <!-- -->
                                <button type="submit" class="btn btn-primary">Export date</button> --}}
                                
                                <a class="btn btn-primary" href="{{ URL::to('/orderpdf')  }}">Export to PDF</a>
                            </form>
                              
                              </div>
                        <div class="row m-t-30">
                         
                         

                            <div class="col-md-12">
                            
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>

                                                <th>NO</th>
                                                <th>Id</th>
                                                
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone No</th>
                                                <th>Email</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                
                                                <th>Status</th>
                                                
                                                <th></th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                             <td>{{($orders->currentpage()-1)*5+$increment}}</td> 
                                             
                                             <td>{{$order->id}}</td>
                                             <td>{{$order->name}}</td> 
                                             <td>{{$order->address}}</td>
                                             <td>{{$order->phone_no}}</td>
                                             <td>{{$order->email}}</td>
                                             <td>{{$order->country}}</td>
                                             <td>{{$order->city}}</td>
                                             
                                             @if ($order->order_status == 'pending')
              <td>
                <label class="badge badge-warning">Pending</label>
              </td>
                  
              @else
              <td>
                <label class="badge badge-success">Delivered</label>
              </td> 
              @endif
                                             <td> <a href="/delete_order/{{$order->id}}" class="btn btn-danger" onclick="window.location ='{{url('/delete_order/'.$order->id)}}'" id="delete">Delete</a></td>
                                             <td> 
                 @if ($order->order_status == 'pending')
                 <button class="btn btn-outline-success" onclick="window.location ='{{url('/delivered_order/'.$order->id)}}'">Delivered</button> 
                     
                 @else
                 <button class="btn btn-outline-warning" onclick="window.location ='{{url('/pending_order/'.$order->id)}}'">Pending</button>
                 @endif
                 </td>
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
            