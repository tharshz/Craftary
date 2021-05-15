@extends('layouts.customer.master')
@section('title')
<title>Crafttary | Checkout</title>

@endsection
 @section('content')

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>
                            @if (Session::has('status'))
			       <div class="alert alert-success">
				       {{Session::get('status')}}
				   </div>
		    @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
                {{Session::put('error',null)}}
            </div>
     @endif
                            <form action="/ordernow" method="POST" id="checkout-form">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="name" class="form-control" id="name" value="" placeholder=" Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <input type="number" name="phone_no" class="form-control" id="phone_no" placeholder="Phone No" value="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        {{Form::select('country_code', $deliveries, null,
                                        ['placeholder' => 'select the country', 'class' => 'w-100','required' ]
                                        )}}
                                     {{-- <select  class="w-100" id="country" name="country" required>
                                        <option value="SriLanka">SriLanka</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Germany">Germany</option>
                                        <option value="France">France</option>
                                        <option value="India">India</option>
                                        <option value="Australia">Australia</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option> 
                                        <option value="Italy">Italy</option> 
                                    </select> --}}
                                </div>
                                    <div class="col-md-6 mb-3">
                                    <input type="text" name="city" class="form-control mb-3" id="city" placeholder="City" value="" required>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="" required>
                                    </div>
                                  
               
                                  </div>
                                </div>
                            </div> 
                 
          
           

                                   
                                   
                               
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>${{$total}}.00</span></li>
                                {{-- <li><span>delivery:</span> <span>$.00</span></li>
                                <li><span>total:</span> <span>$.00</span></li> --}}
                                <input type="hidden" name="grandtotal" class="form-control" id="grandtotal" value="">
                                
                            </ul>

                            

                            <div class="cart-btn mt-100">
                                <button type="submit" class="btn amado-btn w-100">Checkout</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
    @endsection