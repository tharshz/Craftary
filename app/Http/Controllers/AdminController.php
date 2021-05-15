<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Storage;
use Illuminate\support\Facades\Redirect;
use Session;
use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\Item;
use App\Payment;
use App\Comment;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function loginadmin() {
        return view('admin.login');
    }

    public function loginaccount(Request $request) {
        $this->validate($request, ['email' => 'email|required',
        'password' => 'required']);

          $user = DB::table('users')->where('email', $request->input('email'))->first();

           if ($user) {
///////////
            if (Hash::check($request->input('password'), $user->password)){
                Session::put('user', $user);

              return redirect('/dashboard');
//return back()->with('status', 'Your email is '.Session::get('customer')->email);
           }else{
/////////
               return back()->with('error','Wrong password');
               }
            }else {
             return back()->with('error','This is not correct email');
            }

    }

    public function logoutadmin() {
        Session::forget('user');
        return view('admin.login');
    }
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function slider() {
        return view('admin.slider');
    }
    public function addslider() {
        return view('admin.addslider');
    }
    
    public function order() {
        $order = Order::paginate(10);

        return view('admin.order')->with('orders',$order);
    }
    
    public function orderitem() {
        
       $order= DB::table('order_items')
       ->join('items', 'order_items.item_id','=','items.id')
    
       ->select('items.*','order_items.*')
       
       ->paginate(10);
        return view('admin.order_item')->with('orders',$order);
    }

    public function deleteOrder($id) {
        $order =Order::find($id);
        $order->delete();

    return redirect('/order')->with('status', 'The '.$order->order_id.' Order has been deleted successfully');
    } 
    /////////////////change order status///////////////////
    public function delivered_order($id){
        $order = Order::find($id);

        $order->order_status =('delivered');

        $order->update();

        return redirect('order')->with('status', 'The '.$order->order_id.' order  has been delivered successfully');
    }
///////////////change order status////////////////////////////////////////////
    public function pending_order($id){
        $order = Order::find($id);

        $order->order_status =('pending');

        $order->update();

        return redirect('order')->with('status', 'The '.$order->order_id.' Order status is pending ');
    }
//////////////////////////////search order/////////////////////////////////
    public function search_order(Request $request){

        $this->validate($request,[
            'search' => 'required',
            'options'  => 'required'
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $orders = DB::table('orders')
        ->where( $option, 'LIKE' , '%'.$str.'%' )
            ->paginate(10);
        return view('admin.search')->with([ 'orders' => $orders ,'search' => true ]);

        //return $request->input();
        // $order=Order::where('email', 'like', '%'.$request->input('query').'%')->get();
    
        // return view('admin.search',['order'=>$order]);
    }
    


     public function customer() {
        $customer = Customer::latest()->paginate(10);
         return view('admin.customer')->with('customers',$customer);
     }

     public function comment() {
        
        $comment= DB::table('comments')
        ->join('items', 'comments.item_id','=','items.id')
        
        ->select('items.*','comments.*')
        ->paginate(5);
         return view('admin.viewcomment')->with('comments',$comment);
     }
     public function payment() {
        
        $payment=Payment::paginate(10);
         return view('admin.payment')->with('payments',$payment);
     }

     static function adminitem(){

        
        return Item::count();
    }
     
    
    static function admincustomer(){

        
        return Customer::count();
    }
    static function adminorder(){

        
        return Order::count();
    }
    static function admincomment(){

        
        return Comment::count();
    }
    ///////////create pdf in comments///////////////////
    public function createPDF(Request $request) {

        $this->validate($request,[
            'search' => 'required',
            'options'  => 'required'
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $comments = DB::table('comments')->join('items','items.id','=','comments.item_id')
        ->where( $option, 'LIKE' , '%'.$str.'%' )
        ->get();
        
    
        // share data to view
        view()->share('comments',$comments);
    
     
        $pdf = PDF::loadView('layouts.report.comment_report', $comments);
       
       
     $pdf->setpaper('A4','landscape', $comments);
        // download PDF file with download method
        return $pdf->download('comment.pdf');
      }

      ///////////////create pdf in customer////////////////////////////
      public function customerPDF() {
        // retreive all records from db
        $customer =DB::table('customers')
        
        ->get();
    
        // share data to view
        view()->share('customers',$customer);
    
     
        $pdf = PDF::loadView('layouts.report.customer_report', $customer);
       
       
     $pdf->setpaper('A4','landscape', $customer);
        // download PDF file with download method
        return $pdf->download('customer.pdf');
      }
      //////////create pdf in order/////////////////////////////////////////

      public function orderPDF() {
        // $this->validate($request,[
        //     'date_from' => 'required',
        //     'date_to'   => 'required'
        // ]);
        
        // $date_from = $request->input('date_from');
        // $date_to = $request->input('date_to');

        // /**
        //  *  orders between two dates
        //  */
        // $orders = Order::whereBetween('created_at' ,[new Carbon($date_from),new Carbon($date_to)])->get();

        // //generate pdf
        // $pdf = PDF::loadView('layouts.report.order_report',['orders' => $orders])->setPaper('a4', 'landscape');
        // return $pdf->stream('Order_report_from_'.$date_from.'_to_'.$date_to.'.pdf');
      
//////////////////////////////////////////////////////////////////
        

        $order =DB::table('orders')
        ->join('items','orders.item_id','=','items.id')
        ->select('items.*','orders.*')
        ->get();
    
        // share data to view
        view()->share('orders',$order);
    
     
        $pdf = PDF::loadView('layouts.report.order_report', $order);
       
       
     $pdf->setpaper('A4','landscape', $order);
        // download PDF file with download method
        return $pdf->download('order.pdf');
      }
     public function order_PDF(Request $request){

        $this->validate($request,[
                'date_from' => 'required',
                'date_to'   => 'required'
            ]);
            
            $date_from = $request->input('date_from');
            $date_to = $request->input('date_to');
    
            /**
             *  orders between two dates
             */
            $order = Order::whereBetween('created_at' ,[new Carbon($date_from),new Carbon($date_to)])->get();
    
            //generate pdf
            // $pdf = PDF::loadView('layouts.report.order_report',['orders' => $orders])->setPaper('a4', 'landscape');
            // return $pdf->stream('Order_report_from_'.$date_from.'_to_'.$date_to.'.pdf');
            view()->share('orders',$order);
    
     
            $pdf = PDF::loadView('layouts.report.order_report', $order);
           
           
         $pdf->setpaper('A4','landscape', $order);
            // download PDF file with download method
            return $pdf->download('order.pdf');
     }

     public function paymentPDF() {
        // retreive all records from db
        $payment = Payment::all();
    
        // share data to view
        view()->share('payments',$payment);
    //     $options = new Options();
    // $options->set('isRemoteEnabled', true);
     
        $pdf = PDF::loadView('layouts.report.payment_report', $payment);
        // $pdf->loadHtml($item['layouts.report.item_report']);
        
        // $pdf->set_option('isRemoteEnabled',TRUE);
       
    $pdf->setpaper('A4','landscape', $payment);
        // download PDF file with download method
        return $pdf->download('payment.pdf');
      }
    

      
    

}

