@extends('layouts.admin.master')
@section('title')
<title>Edititem</title>
@endsection
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <i class="fas fa-align-justify"></i>Edit Item
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
            {!!Form::open(['action' =>'ItemController@updateitem', 'class' =>'inoform', 'method' =>'POST', 'id'=> 'commentform','enctype' => 'multipart/form-data'])!!}
          @csrf
          <div class="form-group">
            {{Form::hidden('id', $item->id)}}
            {{Form::label('','item Name',['for' => 'categoryName'])}}
            {{Form::text('item_name', $item->item_name, ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','item Price',['for' => 'categoryName'])}}
            {{Form::number('item_price', $item->item_price, ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','item category')}}
            {{Form::select('item_category', $categories,$item->item_category,
            ['class' => 'form-control' ]
            )}}
          </div>
          <div class="form-group">
            {{Form::label('','item Image')}}
            {{Form::file('item_image',['class' => 'form-control'])}}
          </div>
          <div class="form-group">
            {{Form::label('','item discription',['for' => 'categoryName'])}}
            {{Form::textarea('item_description', $item->item_description, ['class' => 'form-control', ''])}}
          </div>
          {{-- <div class="form-group">
            {{Form::label('','item Status',['for' => 'categoryName'])}}
            {{Form::checkbox('item_status', '', 'true', ['class' => 'form-control'])}}
          </div> --}}
          <div class="form-group">
          {{Form::submit('update', ['class' =>'btn btn-primary'])}}
          </div>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
@endsection