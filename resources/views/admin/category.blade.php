@extends('layouts.admin.master')
@section('title')
<title>Category</title>
@endsection
@section('content')
{{Form::hidden('', $increment=1)}}
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <i class="fas fa-align-justify"></i>Category
        @if (Session::has('status'))
        <div class="alert alert-success">
          {{Session::get('status')}}
        </div>
        @endif
        <div>
        {{-- <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form> --}}
                            
                            </div>
                            <div >
                              <a class="btn btn-primary" href="{{ URL::to('/categorypdf')  }}">Export to PDF</a>
                            
                            </div>
                            <div>
        <a href="addcategory" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Create Category</a>
        <hr></div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              
              <td>{{$increment}}</td>
              <td>{{$category->category_name}}</td>
              <td>
                <a href="#" class="btn btn-outline-primary" onclick="window.location ='{{url('/edit_category/'.$category->id)}}'">Edit</a>
              
                <a href="/delete/{{$category->id}}" class="btn btn-outline-danger" onclick="window.location ='{{url('/delete/'.$category->id)}}'" id="delete">Delete</a>
              </td>
            </tr>
            {{Form::hidden('', $increment=$increment + 1)}}
            @endforeach
              
          </tbody>
        </table>
       
      </div>
      <div>
      {{$categories->links()}}
    </div>
    </div>
  </div>
@endsection