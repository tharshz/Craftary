@extends('layouts.admin.master')
@section('title')
<title>Delivery</title>
@endsection
            @section('content')
            {{Form::hidden('', $increment=1)}}
             
            <div class="container">
            @if (Session::has('status'))
        <div class="alert alert-success">
          {{Session::get('status')}}
        </div>
        @endif
        
                              <div>
                                <a href="add_delivery" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Create Delivery Charge</a>
                                <hr></div>
                        <div class="row m-t-30">
                         
                         

                            <div class="col-md-12">
                            
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">1-5</th>
                                                <th scope="col">5-10</th>
                                                <th scope="col">10-20</th>
                                                <th scope="col">20-50</th>
                                                <th scope="col">50-100</th>
                                                <th scope="col">above 100</th>
                                                <th scope="col">Action</th>
                                                
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($deliveries as $delivery)
                                              <tr>
                                                
                                                <td>{{$increment}}</td>
                                                <td>{{$delivery->country_code}}</td>
                                                <td>${{$delivery->one_to_five}}.00</td>
                                                <td>${{$delivery->five_to_ten}}.00</td>
                                                <td>${{$delivery->ten_to_twenty}}.00</td>
                                                <td>${{$delivery->twenty_to_fifty}}.00</td>
                                                <td>${{$delivery->fifty_to_hundred}}.00</td>
                                                <td>${{$delivery->above_hundred}}.00</td>
                                                <td>
                                                  <a href="#" class="btn btn-outline-primary" onclick="window.location ='{{url('/edit_delivery/'.$delivery->id)}}'">Edit</a>
                                                
                                                  <a href="/delete_delivery/{{$delivery->id}}" class="btn btn-outline-danger" onclick="window.location ='{{url('/delete_delivery/'.$delivery->id)}}'" id="delete">Delete</a>
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
                {{$deliveries->links()}}
                </div>
                </div>
            </div>
            @endsection
