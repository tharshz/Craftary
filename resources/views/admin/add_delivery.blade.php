@extends('layouts.admin.master')
@section('title')
<title>Add_delivery</title>
@endsection
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <i class="fas fa-align-justify"></i>Create a Delivery
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

            {!!Form::open(['action' =>'DeliveryController@savedelivery', 'class' =>'inoform', 'method' =>'POST', 'id'=> 'commentform'])!!}
          @csrf
          <div class="form-group">
            {{Form::label('','Country',['for' => 'categoryName'])}}
            {{Form::text('country_code', '', ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','One-Five',['for' => 'categoryName'])}}
            {{Form::text('one_to_five', '', ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','Five-Ten',['for' => 'categoryName'])}}
            {{Form::text('five_to_ten', '', ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','Ten-Twenty',['for' => 'categoryName'])}}
            {{Form::text('ten_to_twenty', '', ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','Twenty-Fifty',['for' => 'categoryName'])}}
            {{Form::text('twenty_to_fifty', '', ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','Fifty-Hundred',['for' => 'categoryName'])}}
            {{Form::text('fifty_to_hundred', '', ['class' => 'form-control', ''])}}
          </div>
          <div class="form-group">
            {{Form::label('','Above Hundred',['for' => 'categoryName'])}}
            {{Form::text('above_hundred', '', ['class' => 'form-control', ''])}}
          </div>

          {{Form::submit('Save', ['class' =>'btn btn-primary'])}}
        {!!Form::close()!!}
      </div>
    </div>
  </div>
@endsection