@extends('layouts.admin.master')
@section('title')
<title>Customer</title>
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
                         
                            </div>
                            <div >
                                <a class="btn btn-primary" href="{{ URL::to('/customerpdf')  }}">Export to PDF</a>
                              
                              </div>

                        <div class="row m-t-30">
                        
                            <div class="col-md-12">
                            
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-bordered">
                                        <thead>
                                        
                                            <tr>
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                             <td>{{($customers->currentpage()-1)*5+$increment}}</td> 
                                             <td>{{$customer->firstname}}</td>
                                             <td>{{$customer->lastname}}</td> 
                                             <td>{{$customer->email}}</td> 
                                               
                                            </tr>
                                            {{Form::hidden('', $increment=$increment + 1)}}
                                         @endforeach  
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <div>
                     {{$customers->links()}}   
                </div>
                </div>
                </div>
            </div>

@endsection