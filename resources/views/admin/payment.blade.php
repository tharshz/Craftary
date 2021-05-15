@extends('layouts.admin.master')
@section('title')<title>Payments</title>
@endsection

@section('content')
{{Form::hidden('', $increment=1)}}
<div class="container">
<div>
        {{-- <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form> --}}
                            {{-- <form class="form-header" action="/paymentpdf" method="post">
                              @csrf
                              <div class="form-group-lg">
                                  
                                  <label for="search">Search Payments</label>
                                  <input id="search" type="text" name="search" >
                                  <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
                              </div>
                              <div class="form-group">
                                  <label for="options">Search by:</label>
                                  <select class="form-control form-control-sm" name="options" id="options">
                                      <option value="order_id">Order</option>
                                      <option value="amount">Amount</option>
                                      
                              
                                       </select>
                                  
                              </div>
                              
                              <div class="col l2">
                                  <button type="submit" class="btn btn-primary">Export to PDF</button>
                              </div>
                                              </form> --}}
                                              <div >
                                                <a class="btn btn-primary" href="{{ URL::to('/paymentpdf')  }}">Export to PDF</a>
                                              
                                              </div>
                            </div>
                            {{-- <div >
                              <a class="btn btn-primary" href="{{ URL::to('/commentpdf')  }}">Export to PDF</a>
                            
                            </div> --}}

                        <div class="row m-t-30">
                        
                            <div class="col-md-12">
                            
                                <!-- DATA TABLE-->
                                <div>
                 <table class="table table-bordered">
                    <thead>
                     <tr>
                       <th scope="col">ID</th>
                       <th scope="col">Order Id</th>
                      <th scope="col">Amount</th>
                       
                       
                       
              
              
                      </tr>
                    </thead>
                        <tbody>
                          @foreach ($payments as $payment)

                            <tr>
                            <td>{{($payments->currentpage()-1)*5+$increment}}</td>
                            
                            <td>{{$payment->order_id}}</td>
                            <td>${{$payment->amount}}.00</td>
                            
                            

                            
             
                            

                            
              
                            </tr>
                             {{Form::hidden('', $increment=$increment + 1)}}
                          @endforeach
             
                        </tbody>
                    </table>

                </div>
                <div>
              {{$payments->links()}}
</div>
@endsection