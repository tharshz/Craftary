<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
////////////////customer pages///////////////////
Route::get('/','CustomerController@crafttary');

Route::get('/checkout','CustomerController@checkout'); 
Route::get('/search_item','CustomerController@search_item');
Route::get('/shop','CustomerController@shop');
Route::get('/add_comment','CustomerController@add_comment'); 
Route::post('/create_comment','CustomerController@create_comment');  

//////////////customer auth////////////////////////
Route::get('/logincustomer','CustomerController@login'); 
Route::get('/signup','CustomerController@signup');
Route::get('/about','CustomerController@about');
Route::post('/createaccount','CustomerController@createaccount');
Route::post('/accessaccount','CustomerController@accessaccount'); 
Route::get('/logout','CustomerController@logout'); 
Route::get('/payment','CustomerController@payment'); 

//////////////order//////////////////////////////////
Route::post('/ordernow','CustomerController@ordernow'); 

////////////////////view admin page//////////////////
Route::get('/dashboard','AdminController@dashboard');

Route::get('/viewpayment','AdminController@payment');
Route::get('/order','AdminController@order');
Route::get('/orderitem','AdminController@orderitem');
Route::get('/user','AdminController@customer');
////////////manage order by admin//////////////////////////////
Route::get('/delete_order/{id}','AdminController@deleteOrder');
Route::get('/delivered_order/{id}','AdminController@delivered_order');
Route::get('/pending_order/{id}','AdminController@pending_order');
//////////////search option//////////////////////////////////
Route::post('/search_order','AdminController@search_order');
Route::get('/comment','AdminController@comment');
Route::post('/loginaccount','AdminController@loginaccount');
Route::get('/loginadmin','AdminController@loginadmin');
Route::get('/logoutadmin','AdminController@logoutadmin');
//////////admin dashboard detail////////////////////////////
Route::get('/adminitem','AdminController@admindetail');
Route::get('/admincustomer','AdminController@admincustomer');
Route::get('/adminorder','AdminController@adminorder');
Route::get('/admincomment','AdminController@admincomment');
/////////////////grnerate report in pdf////////////////////////
Route::post('/commentpdf','AdminController@createPDF');
Route::get('/customerpdf','AdminController@customerPDF');
Route::get('/orderpdf','AdminController@orderPDF');
Route::get('/paymentpdf','AdminController@paymentPDF');
Route::post('/order_pdf','AdminController@order_PDF');

/////////////////category section/////////////////////
Route::get('/category','CategoryController@category');
Route::get('/addcategory','CategoryController@addcategory');
Route::post('/savecategory','CategoryController@savecategory');
Route::get('/edit_category/{id}','CategoryController@edit');
Route::post('/updatecategory','CategoryController@updatecategory');
Route::get('/delete/{id}','CategoryController@delete');
Route::get('/view_by_cat/{name}','CategoryController@view_by_cat');
///////////////generate report category list in pdf////////////////
Route::get('/categorypdf','CategoryController@createPDF');

////////////////item section////////////////////////
Route::get('/item','ItemController@item');
Route::get('/additem','ItemController@additem');
Route::post('/saveitem','ItemController@saveitem');
Route::get('/edit_item/{id}','ItemController@edit');
Route::post('/updateitem','ItemController@updateitem');
Route::get('/delete_item/{id}','ItemController@delete');
Route::get('/activate_item/{id}','ItemController@activate_item');
Route::get('/unactivate_item/{id}','ItemController@unactivate_item');
///////////generate report item in pdf////////////////////
Route::get('/itempdf','ItemController@createPDF');

//////////////cart section//////////////////////////
Route::get('/add_to_cart','ItemController@addToCart');
Route::get('/cart','ItemController@cart'); 
Route::post('/updateqty','ItemController@updateqty');
Route::get('/removecart/{id}','ItemController@removeCart');


// payment
Route::post('/transaction', [PaymentController::class, 'makePayment'])->name('make-payment');

///////////////delivery charge//////////////////////
Route::get('/delivery','DeliveryController@delivery');
Route::get('/add_delivery','DeliveryController@add_delivery');
Route::post('/savedelivery','DeliveryController@savedelivery');
Route::get('/edit_delivery/{id}','DeliveryController@edit');
Route::post('/updatedelivery','DeliveryController@updatedelivery');
Route::get('/delete_delivery/{id}','DeliveryController@delete');
//////////generate report delivery/////////////////////
Route::get('/deliverypdf','DeliveryController@createPDF');




Auth::routes();












Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
