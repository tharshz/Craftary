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
        {{-- @include('layouts.admin.style') --}}
    </head>
    <body>
        
        <h1 class="grey-text text-darken-1 center">Order Report</h1>
        <table class="table table-bordered">
            <thead>
                {{-- {{Form::hidden('', $increment=1)}} --}}
                <tr>
                    <th>Id</th>
                    
                    <th>Item name </th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>phone no</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>status</th>
                    
                    
                </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                 <td>{{$order->id}}</td> 
                 
                 <td>{{$order->item_name}}</td> 
                 <td>{{$order->quantity}}</td> 
                 <td>${{$order->total_price}}.00</td> 
                 <td>{{$order->name}}</td> 
                 <td>{{$order->address}}</td>
                 <td>{{$order->phone_no}}</td>
                 <td>{{$order->email}}</td>
                 <td>{{$order->country}}</td>
                 <td>{{$order->city}}</td>
                 <td>{{$order->order_status}}</td>
                
                 
              </tr>
                    {{-- {{Form::hidden('', $increment=$increment + 1)}} --}}
                @endforeach
          
        </table>
        {{-- @endsection --}}
    </body>
</html> 