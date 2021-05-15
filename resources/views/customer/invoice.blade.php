<!DOCTYPE html>
<html>
<head>
    <style>
        h3{text-align: center;
        color:green;}
        h4{text-align: center;}
        h1{text-align: center;
        color:brown;}
    </style>
    <meta charset="utf-8" />
    <title>Crafttary | Mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="invoice/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="invoice/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="invoice/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="invoice/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Crafttary <small></small></h1>
</div>

<!-- Simple Invoice - START -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <i class="fa fa-search-plus pull-left icon"></i>
                <h2> </h2>
            </div>
            <hr>
            @foreach ($orders as $order)
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading"><img src="customer/img/bg-img/16.png" alt=""></div>
                        <div class="panel-heading"><h4>Thanks For Your Purchase</h4><h3> {{$order->firstname}} {{$order->lastname}}</h3><br>
                           <h4>Your Orders Will be Ready Soon</h4></div>
                        <div class="panel-body">
                            {{-- <strong></strong>
                            <strong>{{$order->firstname}}''{{$order->lasttname}}:</strong><br> --}}
                            
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Payment Information</div>
                        <div class="panel-body">
                            <strong>Card Name:</strong> Visa<br>
                            <strong>Card Number:</strong> ***** 332<br>
                            <strong>Exp Date:</strong> 09/2020<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Order Preferences</div>
                        <div class="panel-body">
                            <strong>Gift:</strong> No<br>
                            <strong>Express Delivery:</strong> Yes<br>
                            <strong>Insurance:</strong> No<br>
                            <strong>Coupon:</strong> No<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 pull-right">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Shipping Address</div>
                        <div class="panel-body">
                            <strong>David Peere:</strong><br>
                            1111 Army Navy Drive<br>
                            Arlington<br>
                            VA<br>
                            <strong>22 203</strong><br>
                        </div>
                    </div>
                </div> --}}
            </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{$order->item_name}}</td>
                                    <td class="text-center">${{$order->item_price}}</td>
                                    <td class="text-center">{{$order->quantity}}</td>
                                    <td class="text-right">{{$order->total_price}}</td>
                                </tr>
                                {{-- <tr>
                                    <td>Samsung Galaxy S5 Extra Battery</td>
                                    <td class="text-center">$30.00</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right">$30.00</td>
                                </tr>
                                <tr>
                                    <td>Screen protector</td>
                                    <td class="text-center">$7</td>
                                    <td class="text-center">4</td>
                                    <td class="text-right">$28</td>
                                </tr>--}}
                                {{-- <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Subtotal</strong></td>
                                    <td class="highrow text-right">{{$order->total_price}}</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Shipping</strong></td>
                                    <td class="emptyrow text-right">$0</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-right">{{$order->total_price}}</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div> --}}
    {{-- </div>  --}}
</div>

{{-- <style???>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style???> --}}

<!-- Simple Invoice - END -->

</div>

</body>
</html>