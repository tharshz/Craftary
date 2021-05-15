@extends('layouts.admin.master')
@section('title')
<title>Additem</title>
@endsection
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <i class="fas fa-align-justify"></i>Create a Item
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
            {!!Form::open(['action' =>'ItemController@saveitem', 'class' =>'inoform', 'method' =>'POST', 'id'=> 'commentform','enctype' => 'multipart/form-data'])!!}
          @csrf
          <div class="form-group">
            {{Form::label('','item Name',['for' => 'categoryName'])}}
            {{Form::text('item_name', '', ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','item Price',['for' => 'categoryName'])}}
            {{Form::number('item_price', '', ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','item category')}}
            {{Form::select('item_category', $categories, null,
            ['placeholder' => 'select category', 'class' => 'form-control' ]
            )}}
          </div>
          <div class="form-group">
            {{Form::label('','item Image',['for' => 'categoryName'])}}
            {{Form::file('item_image', ['class' => 'form-control'])}}
          </div>
          <div class="form-group">
            {{Form::label('','item color')}}
            <select class="form-control"name="item_color" >
              <option value="green">green</option>
              <option value="red">red</option>
              <option value="yellow">yellow</option>
              <option value="black">black</option>
              <option value="white">white</option>
            </select>
            {{-- {{Form::select('item_color','red','green','yellow','black','white'
            ['placeholder' => 'select color', 'class' => 'form-control' ]
            )}} --}}
            <div class="form-group">
              {{Form::label('','item material',['for' => 'categoryName'])}}
              {{Form::text('item_material', '', ['class' => 'form-control', ''])}}
            </div>
          <div class="form-group">
            {{Form::label('','item description',['for' => 'categoryName'])}}
            {{Form::textarea('item_description', '', ['class' => 'form-control', ''])}}
          </div>
          
          <div class="form-group">
          {{Form::submit('Save', ['class' =>'btn btn-primary'])}}
          </div>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
@endsection