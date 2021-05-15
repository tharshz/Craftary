<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use PDF;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addcategory() {
        return view('admin.addcategory');
    }
    //save//////////////////////////////
    public function savecategory(Request $request){
        $this->validate($request,['category_name' => 'required']);
      $checkcat = Category::where('category_name',$request->input('category_name'))->first();
      $Category = new Category();

      if(!$checkcat){
          $Category->category_name =$request->input('category_name');
          $Category->save();

          return redirect('/addcategory')->with('status', 'The '.$Category->category_name.' Category has been saved successfully');
      }else{
        return redirect('/addcategory')->with('status1', 'The '.$request->input('category_name').' Category already exist');
      }

    }
///////////view////////////////////////
    public function category() {
        $Category = category::paginate(10);
        return view('admin.category')->with('categories',$Category);
    }
    //////////////edit//////////////////

    public function edit($id){
        $Category = category::find($id);
        return view('admin.editcategory')->with('category',$Category);
    }

    ///////////////update///////////////
public function updatecategory(Request $request){
    $Category = category::find($request->input('id'));
    $oldcat = $Category->category_name;

    $Category->category_name = $request->input('category_name');
    
    //////////////update category in Item table///////////////////
    $data = array();
    $data['item_category'] = $request->input('category_name');
    
    DB::table('items')
        ->where('item_category', $oldcat)
        ->update($data);

    $Category->update();

    return redirect('/category')->with('status', 'The '.$Category->category_name.' Category has been update successfully');


}
/////////////////delete/////////////////////
public function delete($id){
    $Category =category::find($id);
    $Category->delete();

    return redirect('/category')->with('status', 'The '.$Category->category_name.'Category has been delete successfully');
}

/////////view item by category///////////

public function view_by_cat($name){
    $categories = Category::get();
    $items = Item::where('item_category', $name)->paginate(4);

    return view('customer.shop')->with('items', $items)->with('categories', $categories);
}
public function createPDF() {
    // retreive all records from db
    $category = Category::all();

    // share data to view
    view()->share('categories',$category);

 
    $pdf = PDF::loadView('layouts.report.category_report', $category);
   
   
 $pdf->setpaper('A4','landscape', $category);
    // download PDF file with download method
    return $pdf->download('category.pdf');
  }

}

