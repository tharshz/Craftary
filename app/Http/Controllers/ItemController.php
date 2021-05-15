<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use Illuminate\support\Facades\Redirect;
use App\Item;
use App\Category;
use Session;
use App\Cart;
use PDF;
// use Options;
// use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
 ////////create item////////////////////////////////////////////////////
 public function additem() {
    $categories = Category::All()->pluck('category_name', 'category_name');
    return view('admin.additem')->with('categories', $categories);
    
}

public function saveitem(Request $request){

    $this->validate($request,['item_name' => 'required'],
    ['item_price' => 'required'],
   ['item_image' => 'image|nullable|max:1999'],
   ['item_description' => 'required'],
   ['item_color' => 'required'],
   ['item_material' => 'required']);
    if($request->input('item_category')){
        if($request->hasfile('item_image')){
            //get file name with ext

            $fileNameWithExt = $request->file('item_image')->getClientOriginalName();

            //get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            //GET JUST ext

            $extension = $request->file('item_image')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload image

            $path = $request->file('item_image')->storeAs('public/product_images',
            $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        $item = new Item();

$item->item_name = $request->input('item_name');
$item->item_price = $request->input('item_price');
$item->item_category = $request->input('item_category');
$item->item_color = $request->input('item_color');
$item->item_material = $request->input('item_material');
$item->item_description = $request->input('item_description');

$item->item_image = $fileNameToStore;
$item->status =1;

$item->save();
return redirect('/additem')->with('status', 'The '.$item->item_name.' Item  has been saved successfully');
    }
    else{
        return redirect('/additem')->with('status1', 'Do select the category please');
    }
 
                           
}

///////////view item////////////////////////////////////////
public function item() {
    $items = Item::paginate(5);
    return view('admin.item')->with('items' , $items);
}

///////////edit item////////////////////////////////////////
public function edit($id){
    $categories = Category::All()->pluck('category_name', 'category_name');
    $item = Item::find($id);
    return view('admin.edititem')->with('item',$item)->with('categories', $categories);
}

public function updateitem(Request $request){
    $this->validate($request,['item_name' => 'required'],
                             ['item_price' => 'required'],
                             ['item_image' => 'image|nullable|max:1999'],
                             ['item_description' => 'required']);

    $item = Item::find($request->input('id'));

$item->item_name = $request->input('item_name');
$item->item_price = $request->input('item_price');
$item->item_category = $request->input('item_category');
$item->item_description = $request->input('item_description');

if($request->hasfile('item_image')){
//get file name with ext

$fileNameWithExt = $request->file('item_image')->getClientOriginalName();

//get just file name
$fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

//GET JUST ext

$extension = $request->file('item_image')->getClientOriginalExtension();

//file name to store
$fileNameToStore = $fileName.'_'.time().'.'.$extension;

//upload image

$path = $request->file('item_image')->storeAs('public/product_images',
$fileNameToStore);


$old_image = Item::find($request->input('id'));

if($old_image->item_image != 'noimage.jpg'){
  Storage::delete('public/product_images/' .$old_image->item_image);
}
$item->item_image = $fileNameToStore;


}
$item->update();

    return redirect('/item')->with('status', 'The '.$item->item_name.' Item has been updated successfully');
    
}

////////////////delete item///////////////////////////
public function delete($id){
    $item =Item::find($id);

    if($item->item_image != 'noimage.jpg'){
        Storage::delete('public/product_images/'.$item->item_image);
    }
    $item->delete();

    return redirect('item')->with('status', 'The '.$item->item_name.' Item has been deleted successfully');
}

///////////////activate item///////////////////////////
public function activate_item($id){
    $item = Item::find($id);

    $item->status = 1;

    $item->update();

    return redirect('item')->with('status', 'The '.$item->item_name.' item status has been activated successfully');
}

//////////////unactivate item//////////////////////////
public function unactivate_item($id){
    $item = Item::find($id);

    $item->status = 0;

    $item->update();

    return redirect('item')->with('status', 'The '.$item->item_name.' item status has been Unactivated successfully');
}
/////////cart section///////////////////////////////

function addToCart(Request $request){
    
    //return "hello";
    if($request->session()->has('customer')){

        
        $customerId=Session::get('customer')['id']; 
        $item_Id=$request->input('item_id');
        // $checkcat = Cart::where('customer_id',$customerId)->select('item_id')->first();
        $item=Item::where('id',$item_Id)->select('id')->get();
        $items=DB::table('carts')
        
        ->where('customer_id',$customerId)
           ->select('item_id')
           ->get();

           if($items==$item){
           /////////////for check Item already added to cart////////////////////
            return redirect('/shop')->with('status', 'The item has been already taken');
           }
           else{

      $price = $request->input('item_price');  
        
        $qty=1;
        
    $cart= new Cart;
    $cart->customer_id=$request->session()->get('customer')['id'];
    $cart->item_id=$request->item_id;
    $cart->quantity=$qty;
    $cart->total_price=$qty*$price;
    $cart->save();
    return redirect('/shop')->with('status', 'The item has been added to Cart successfully');
           }
    }
    else{
        
       return redirect('/logincustomer');
    }
}
////////view total quantity////////////////////////
static function cartItem(){

    $customerId=Session::get('customer')['id'];
    return Cart::where('customer_id',$customerId)->count();
}
///////view cart/////////////////////////////////
public function cart(Request $request) {
    if($request->session()->has('customer')){

    $customerId=Session::get('customer')['id'];
    $items= DB::table('carts')
    ->join('items', 'carts.item_id','=','items.id')
    ->where('carts.customer_id',$customerId)
    ->select('items.*','carts.*')
    ->paginate(5);
    /////////////////view total price////////////////
    $customerId=Session::get('customer')['id'];
    $total= DB::table('carts')
      ->join('items','carts.item_id','=','items.id')
      ->where('carts.customer_id',$customerId)
      ->sum('carts.total_price');

      $quantity= DB::table('carts')
      
      ->where('carts.customer_id',$customerId)
      ->sum('carts.quantity');

      if($quantity<=5){
          $delivery=5;
      }
      elseif($quantity<=10){
        $delivery=10;
      }
      elseif($quantity<=20){
        $delivery=20;
      }
      elseif($quantity<=50){
        $delivery=30;
      }
      elseif($quantity<=100){
        $delivery=40;
      }
      else{
        $delivery=50;

      }

    
    return view('customer.cart')->with('items',$items)->with('total',$total)->with('delivery',$delivery);
    }
    else{
        return redirect('/logincustomer');
    }
}
 ///////////////////////update cart quantity/////////////////////////////////
public function updateqty(Request $request){
    
    
    $cart = Cart::find($request->input('id'));
    $oldqty = $cart->quantity;
    $oldtotal = $cart->total_price;
    $newqty = $request->input('quantity');
    $price = $request->input('item_price');
    $newtotal =$newqty*$price ;
   
    $cart->quantity = $request->input('quantity');
    $cart->total_price =$newtotal;

    $cart->update();

    
    return redirect('cart');

    
    
    
}
////////////////remove item in cart///////////////////////////////
  public function removeCart($id) {
      Cart::destroy($id);
      return redirect('cart');
  }
  public function createPDF() {
    // retreive all records from db
    $item = Item::all();

    // share data to view
    view()->share('items',$item);
//     $options = new Options();
// $options->set('isRemoteEnabled', true);
 
    $pdf = PDF::loadView('layouts.report.item_report', $item);
    // $pdf->loadHtml($item['layouts.report.item_report']);
    
    // $pdf->set_option('isRemoteEnabled',TRUE);
   
$pdf->setpaper('A4','landscape', $item);
    // download PDF file with download method
    return $pdf->download('item.pdf');
  }

}
