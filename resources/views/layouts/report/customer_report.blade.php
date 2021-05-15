<!DOCTYPE html>
    <head>
        <style>
          
          table{width:75%;}
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
        
        <h1 class="grey-text text-darken-1 center">Customer Report</h1>
        <table class="table table-bordered">
            <thead>
                {{-- {{Form::hidden('', $increment=1)}} --}}
                <tr>
                  <th>id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  
              </tr>
          </thead>
          <tbody>
          @foreach ($customers as $customer)
              <tr>
               <td>{{$customer->id}}</td> 
               <td>{{$customer->firstname}}</td>
               <td>{{$customer->lastname}}</td> 
               <td>{{$customer->email}}</td> 
                 
              </tr>
                    {{-- {{Form::hidden('', $increment=$increment + 1)}} --}}
                @endforeach
          
        </table>
        {{-- @endsection --}}
    </body>
</html> 