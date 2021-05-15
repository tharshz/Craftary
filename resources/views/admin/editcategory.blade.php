@extends('layouts.admin.master')
@section('title')
<title>Editcategory</title>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <i class="fas fa-align-justify"></i>Update a Category
        <hr>
            {!!Form::open(['action' =>'CategoryController@updatecategory', 'class' =>'inoform', 'method' =>'POST', 'id'=> 'commentform'])!!}
          @csrf
          <div class="form-group">
              {{Form::hidden('id', $category->id)}}
            {{Form::label('','item category',['for' => 'categoryName'])}}
            {{Form::text('category_name',$category->category_name , ['class' => 'form-control', ''])}}
          </div>
          {{Form::submit('Update', ['class' =>'btn btn-primary'])}}
        {!!Form::close()!!}
      </div>
    </div>
  </div>
@endsection