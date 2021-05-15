<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use Illuminate\support\Facades\Redirect;
use Illuminate\support\Facades\Mail;
use App\Category;
use App\Delivery_charge;
use App\Item;
use App\Cart;
use Session;
use App\Customer;
use App\Order;
use App\Payment;
use App\Order_item;
use App\Comment;
use App\Mail\SendMail;
use Stripe\Charge;
use Stripe;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function crafttary() {
        return view('customer.crafttary');
    }
    
        
    
    public function checkout(Request $request) {
        if($request->session()->has('customer')){
        $customerId=Session::get('customer')['id'];

        $deliveries = Delivery_charge::All()->pluck('country_code', 'country_code');
        

        $total= DB::table('carts')
          ->join('items','carts.item_id','=','items.id')
          ->where('carts.customer_id',$customerId)
          ->sum('carts.total_price');

          $carts=DB::table('carts')
          ->where('carts.customer_id',$customerId)
          ->count('carts.id');

          

          if($carts>0){
        

        return view('customer.checkout')->with('total',$total)->with('deliveries', $deliveries);
        }
    
    else{
        return redirect('cart')->with('status','Your Cart is Empty');
    }
}
        else{
            return redirect('shop');
        }
        
    }
    
    public function shop() {

        $categories = Category::get();
        
        $items=DB::table('items')->where('status',1)
        ->paginate(4);
        // $items = Item::paginate(4);
        
       
        return view('customer.shop')->with('categories',$categories)->with('items',$items);
       
    }
    public function login() {
        return view('customer.login');
    }
    public function signup() {
        return view('customer.register');
    }
    public function about() {
        return view('customer.about');
    }
    /////////customer signup account/////////////////////////////////////////////
    public function createaccount(Request $request){
        $this->validate($request, ['firstname' => 'required',
                                   'lastname' => 'required',
                                   'email' => 'email|required|unique:customers',
                                   'password' => 'required|min:4']);

        $password=$request->input('password');
        $confirmpassword=$request->input('confirm_password');

        if($password==$confirmpassword){
            
        

        $customer = new Customer();
        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->email = $request->input('email');
        $customer->password = bcrypt($request->input('password'));

        $customer->save();

        return back()->with('status', 'Your account has been created successfully');
    }
    else{
        return back()->with('warning', 'Please enter password & confirm password correctly' );
    }
    }

    /////////customer login account///////////////////////////////////////////////
    public function accessaccount(Request $request){

        $this->validate($request, ['email' => 'email|required',
                                   'password' => 'required']);
                        
        $customer = Customer::where('email', $request->input('email'))->first();

        if ($customer) {
           ///////////
            if (Hash::check($request->input('password'), $customer->password)){
                Session::put('customer', $customer);

                  return redirect('/shop');
                //return back()->with('status', 'Your email is '.Session::get('customer')->email);
            }else{
              /////////
              return back()->with('error','Wrong password or email');
            }
        }else {
            return back()->with('error','You do not have an account');
        }
    }

    ///////customer logout account////////////////////////////////////////////
    public function logout(){
        Session::forget('customer');
        return back();
    }
    //////////////////create order//////////////////////////////
    public function ordernow(Request $request){
  //     $this->validate($request,['country_code' => 'required']
  //  );
        
       $customerId=Session::get('customer')['id'];
           $allCart=Cart::where('customer_id',$customerId)->get();
           

          $total= DB::table('carts')
          ->join('items','carts.item_id','=','items.id')
          ->where('carts.customer_id',$customerId)
          ->sum('carts.total_price');

          $delivery=$request->input('country_code');

            $order=new Order;
            
            $order->customer_id=$customerId;
            
            
            $order->name=$request->input('name');
            $order->phone_no=$request->input('phone_no');
            $order->email=$request->input('email');
            $order->city=$request->input('city');
            $order->country=$delivery;
            $order->address=$request->input('address');
            $order->order_status="pending";
            $order->save();

            /////////////////////
           
           
        
            /////////////////////

            $order_id=DB::getPdo()->lastinsertID();

            foreach($allCart as $cart){
                $orderitem = new Order_item;
                $orderitem->order_id =$order_id;
                $orderitem->item_id=$cart['item_id'];
                $orderitem->quantity=$cart['quantity'];
                $orderitem->total_price=$cart['total_price'];
                $orderitem->save();
            }

            $quantity= DB::table('carts')
            ->where('carts.customer_id',$customerId)
            ->sum('carts.quantity');
      
          
  
           
  
            if($quantity==0){
              
  
              $delivery_charge=0;
          }
  
            elseif($quantity<=5){
                $deliverycharge=DB::table('delivery_charges')->where('country_code',$delivery)
                //->select('one_to_five')
                ->sum('one_to_five');
  
                $delivery_charge=$deliverycharge;
            }
            elseif($quantity<=10){
              $deliverycharge=DB::table('delivery_charges')->where('country_code',$delivery)
                //->select('five_to_ten')
                ->sum('five_to_ten');
  
                $delivery_charge=$deliverycharge;
            }
            elseif($quantity<=20){
              $deliverycharge=DB::table('delivery_charges')->where('country_code',$delivery)
                //->select('ten_to_twenty')
                ->sum('ten_to_twenty');
  
                $delivery_charge=$deliverycharge;
            }
            elseif($quantity<=50){
              $deliverycharge=DB::table('delivery_charges')->where('country_code',$delivery)
                //->select('twenty_to_fifty')
                ->sum('twenty_to_fifty');
  
                $delivery_charge=$deliverycharge;
            }
            elseif($quantity<=100){
              $deliverycharge=DB::table('delivery_charges')->where('country_code',$delivery)
                // ->select('fifty_to_hundred')
                ->sum('fifty_to_hundred');
  
                $delivery_charge=$deliverycharge;
            }
            elseif($quantity>100){
              $deliverycharge=DB::table('delivery_charges')->where('country_code',$delivery)
                
                ->sum('above_hundred');
  
                $delivery_charge=$deliverycharge;
      
            }
            else{
              
            }
             $grandtotal=$total+$delivery_charge;

               $payment = new Payment;
               $payment->order_id=$order_id;
               $payment->amount=$grandtotal;
               $payment->save();
            
      
         Cart::where('customer_id',$customerId)->delete();
          return view('customer.payment')->with('total',$total)->with('delivery_charge',$delivery_charge);
        
    
    }
////////////////////////get comment page/////////////////////////
      public function add_comment(Request $request) {

        $item_Id=$request->input('item_id');
        $item=Item::where('id',$item_Id)->get();

    return view('customer.comment')->with('items',$item);

      }  
//////////////create comments////////////////////////////////////
      public function create_comment(Request $request) {

        $item_Id=$request->input('item_id');

        $comment= new Comment;
        $comment->item_id=$request->item_id;
        $comment->comment=$request->input('comment');
        $comment->save();

        return back()->with('status','Thanks for your comment');
      }

      public function payment() {
        return view('customer.payment');
    }

    public function makePayment(Request $request)
    {
        $customerId=Session::get('customer')['id'];
        $allCart=Cart::where('customer_id',$customerId)->get();

       $total= DB::table('carts')
       ->join('items','carts.item_id','=','items.id')
       ->where('carts.customer_id',$customerId)
       ->sum('carts.total_price');

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" =>$total* 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Make payment and chill." 
        ]);

        foreach($allCart as $cart)
           {
            $order=new Order;
            $order->item_id=$cart['item_id'];
            $order->customer_id=$cart['customer_id'];
            
            
            $order->quantity=$cart['quantity'];
            $order->total_price=$cart['total_price'];
            $order->name=$request->input('name');
            $order->phone_no=$request->input('phone_no');
            $order->email=$request->input('email');
            $order->city=$request->input('city');
            $order->country=$request->input('country');
            $order->address=$request->input('address');
            $order->status="pending";
            $order->save();
            Cart::where('customer_id',$customerId)->delete();
             
    
           }

        return redirect('/shop')->with('status','Payment successfully made, Thanks for your Purchase');
        // Session::flash('success', 'Payment successfully made, Thanks for your Purchase');
          
        // return back();
    
    }
    public function search_item(Request $request){

        //return $request->input();
        $item=Item::where('item_name', 'like', '%'.$request->input('query').'%')->get();
        $itemcount=Item::where('item_name', 'like', '%'.$request->input('query').'%')->count();
        if($itemcount>0){

        
        return view('customer.search',['items'=>$item]);
        }
        else{
          return redirect('/shop')->with('status','Items not found');
        }
        
        }
    


    
    
}
