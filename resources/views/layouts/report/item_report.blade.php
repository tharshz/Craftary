{{-- @extends('layouts.admin.master')
@section('content') --}}
 <!DOCTYPE html>
    <head>
        <style>
          
          table{width:100%;}
        table, th, td {
          border: 2px solid black;
          border-collapse: collapse;
        }
        th {
  text-align: center;
  color: white;
  background-color: black;
  /* width:20px; height:20px; */
}
td {background-color: white; height:50px; text-align: center;}
#t01 {
    color: white;
  background-color: black;}
  #t02 {
  text-align: center;
  
}
#t04 {
    color: white;
  
}
        </style>
       
    </head>
    <body>
        
        <h1 class="grey-text text-darken-1 center">Item Report</h1>
        <table class="table table-bordered">
            <thead>
               
                <tr>
                   
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                 
                  <th>Description</th>
                  <th>Category</th>
                  
         
         
                 </tr>
               </thead>
                   <tbody>
                     @foreach ($items as $item)

                       <tr>
                       <td>{{$item->id}}</td>
                       <td>{{$item->item_name}}</td>
                       <td>${{$item->item_price}}</td>
                       
                       <td>{{$item->item_description}}</td>
                       <td>{{$item->item_category}}</td>
                    </tr>
                    
                @endforeach
          
        </table>
        
    </body>
</html> 
