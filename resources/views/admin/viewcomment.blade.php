@extends('layouts.admin.master')
@section('title')<title>Comments</title>
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
                            <form class="form-header" action="/commentpdf" method="post">
                              @csrf
                              <div class="form-group-lg">
                                  
                                  <label for="search">Search Comments</label>
                                  <input id="search" type="text" name="search" >
                                  <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
                              </div>
                              <div class="form-group">
                                  <label for="options">Search by:</label>
                                  <select class="form-control form-control-sm" name="options" id="options">
                                      <option value="item_name">Name</option>
                                      <option value="comment">Comments</option>
                                      
                              
                                       </select>
                                  
                              </div>
                              
                              <div class="col l2">
                                  <button type="submit" class="btn btn-primary">Export to PDF</button>
                              </div>
                                              </form>
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
                       <th scope="col">Images</th>
                      <th scope="col">Name</th>
                       <th scope="col">Comments</th>
                       
                       
              
              
                      </tr>
                    </thead>
                        <tbody>
                          @foreach ($comments as $comment)

                            <tr>
                            <td>{{($comments->currentpage()-1)*5+$increment}}</td>
                            <td>
                            <img src="/storage/product_images/{{$comment->item_image}}" alt="" width="120px" height="120px" class="img-thumbnail">
                            </td>
                            <td>{{$comment->item_name}}</td>
                            <td>{{$comment->comment}}</td>
                            
                            

                            
             
                            

                            
              
                            </tr>
                             {{Form::hidden('', $increment=$increment + 1)}}
                          @endforeach
             
                        </tbody>
                    </table>

                </div>
                <div>
              {{$comments->links()}}
</div>
@endsection