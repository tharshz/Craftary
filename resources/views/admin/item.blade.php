@extends('layouts.admin.master')
@section('title')
<title>Item</title>
@endsection
@section('content')
{{Form::hidden('', $increment=1)}}
  <div class="container">
    {{-- <div class="row justify-content-center"> --}}
      <div class="col-md-8">
          <i class="fas fa-hamburger"></i>Item
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
  <a class="btn btn-primary" href="{{ URL::to('/itempdf')  }}">Export to PDF</a>

</div>
            <div>
               <a href="additem" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Create Item</a>
               <hr>
            </div>
            
              <div>
                 <table class="table table-bordered">
                    <thead>
                     <tr>
                       <th scope="col">ID</th>
                       <th scope="col">Name</th>
                       <th scope="col">Price</th>
                       <th scope="col">Images</th>
                       <th scope="col">Description</th>
                       <th scope="col">Category</th>
                       <th scope="col">Status</th>
                       <th scope="col">Action</th>
                       <th scope="col"></th>
                       <th scope="col"></th>
              
              
                      </tr>
                    </thead>
                        <tbody>
                          @foreach ($items as $item)

                            <tr>
                            <td>{{($items->currentpage()-1)*5+$increment}}</td>
                            <td>{{$item->item_name}}</td>
                            <td>${{$item->item_price}}</td>
                            <td>
                            <img src="/storage/product_images/{{$item->item_image}}" alt="" width="120px" height="120px" class="img-thumbnail">
                            </td>
                            <td>{{$item->item_description}}</td>
                            <td>{{$item->item_category}}</td>

                             @if ($item->status == 1)
                            <td>
                            <label class="badge badge-success">Available</label>
                            </td>
                  
                              @else
                            <td>
                            <label class="badge badge-danger">Unavailable</label>
                            </td> 
                             @endif
             
                            <td>
                            <button class="btn btn-outline-primary" onclick="window.location ='{{url('/edit_item/'.$item->id)}}'">Edit</button>
                          </td><td> <a href="/delete_item/{{$item->id}}" class="btn btn-outline-danger"  onclick="window.location ='{{url('/delete_item/'.$item->id)}}'"id="delete">Delete</a></td>
                       
                          </td>
                              @if ($item->status == 1)
                              <td>
                              <button class="btn btn-outline-warning" onclick="window.location ='{{url('/unactivate_item/'.$item->id)}}'">Unactivate</button> 
                            </td>
                              @else
                              <td>
                              <button class="btn btn-outline-success" onclick="window.location ='{{url('/activate_item/'.$item->id)}}'">Activate</button>
                            </td>
                               @endif
                            
              
                            </tr>
                             {{Form::hidden('', $increment=$increment + 1)}}
                          @endforeach
             
                        </tbody>
                    </table>

                </div>
                <div>
              {{$items->links()}}
             </div> 
            </div>
          </div>
       </div> 
@endsection