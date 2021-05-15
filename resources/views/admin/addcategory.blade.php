@extends('layouts.admin.master')
@section('title')
<title>Addcategory</title>
@endsection
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <i class="fas fa-align-justify"></i>Create a Category
        <hr>
        @if (Session::has('status'))
        <div class="alert alert-success">
          {{Session::get('status')}}
        </div>
        @endif


        @if (Session::has('status1'))
        <div class="alert alert-danger">
          {{Session::get('status1')}}
        </div>
        @endif

            {!!Form::open(['action' =>'CategoryController@savecategory', 'class' =>'inoform', 'method' =>'POST', 'id'=> 'commentform'])!!}
          @csrf
          <div class="form-group">
            {{Form::label('','item category',['for' => 'categoryName'])}}
            {{Form::text('category_name', '', ['class' => 'form-control', ''])}}
          </div>
          {{Form::submit('Save', ['class' =>'btn btn-primary'])}}
        {!!Form::close()!!}
      </div>
    </div>
  </div>
@endsection