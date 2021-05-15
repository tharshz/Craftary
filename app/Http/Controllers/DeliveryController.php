<?php

namespace App\Http\Controllers;
use App\Delivery_charge;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function add_delivery() {
        return view('admin.add_delivery');
    }
    //
    //save//////////////////////////////
    public function savedelivery(Request $request){
        $this->validate($request,['country_code' => 'required'],
        ['one_to_five' => 'required'],['five_to_ten' => 'required'],['ten_to_twenty' => 'required'],['twenty_to_fifty' => 'required'],
        ['fifty_to_hundred' => 'required'],['above_hundred' => 'required']);
      
      $delivery = new Delivery_charge();

      
          $delivery->country_code =$request->input('country_code');
          $delivery->one_to_five =$request->input('one_to_five');
          $delivery->five_to_ten =$request->input('five_to_ten');
          $delivery->ten_to_twenty =$request->input('ten_to_twenty');
          $delivery->twenty_to_fifty =$request->input('twenty_to_fifty');
          $delivery->fifty_to_hundred =$request->input('fifty_to_hundred');
          $delivery->above_hundred =$request->input('above_hundred');
          $delivery->save();

          return redirect('/add_delivery')->with('status', 'The '.$delivery->country_code.' delivery charge has been saved successfully');
      

    }
    ///////////view////////////////////////
    public function delivery() {
        $delivery = Delivery_charge::paginate(10);
        return view('admin.delivery')->with('deliveries',$delivery);
    }

    //////////////edit//////////////////

    public function edit($id){
        $delivery = Delivery_charge::find($id);
        return view('admin.editdelivery')->with('delivery',$delivery);
    }

    public function updatedelivery(Request $request){
        $delivery = Delivery_charge::find($request->input('id'));
        
    
        $delivery->country_code = $request->input('country_code');
        $delivery->one_to_five =$request->input('one_to_five');
          $delivery->five_to_ten =$request->input('five_to_ten');
          $delivery->ten_to_twenty =$request->input('ten_to_twenty');
          $delivery->twenty_to_fifty =$request->input('twenty_to_fifty');
          $delivery->fifty_to_hundred =$request->input('fifty_to_hundred');
          $delivery->above_hundred =$request->input('above_hundred');
        
        
    
        $delivery->update();
    
        return redirect('/delivery')->with('status', 'The '.$delivery->country_code.' delivery charge has been updated successfully');
    
    
    }
    public function delete($id){
        $delivery =Delivery_charge::find($id);
        $delivery->delete();
    
        return redirect('/delivery')->with('status', 'The '.$delivery->country_code.' delivery charge has been deleted successfully');
    }
}
