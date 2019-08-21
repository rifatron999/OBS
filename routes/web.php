<?php

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

Route::get('/', function () {
    return view('welcome');
});



//login #############################
Route::get('/login', 'loginController@index')->name('login.index');
Route::post('/login', 'loginController@valid');
//login ends

//registration 
Route::get('/registration','registrationController@index')->name('registration.index');
Route::post('/registration', 'registrationController@valid');
//registration ends



//portal starts
Route::group(['middleware'=>['session_check']], function(){

Route::get('/portal','portalController@index')->name('portal.index');

//profile starts******************************************************************
Route::get('/portal/profile','portalController@profile')->name('portal.profile');
Route::post('/portal/profile', 'portalController@updateProfile'); 

//profile ends*********************************************************************















//preReg ends

//********************************************************************

//admin starts
Route::get('/portal/admin','adminController@index')->name('admin.index');
Route::get('/portal/addCategoryView','adminController@addCategoryView')->name('admin.addCategoryView');
Route::get('/portal/addBookView','adminController@addBookView')->name('admin.addBookView');
Route::get('/portal/admin/{u_id}','adminController@removeUser')->name('admin.removeUser');

Route::post('/portal/addCategoryView','adminController@addCategory');
Route::post('/portal/addBookView','adminController@addBook');
//admin ends


//customer stars
Route::get('/portal/customer','customerController@index')->name('customer.index');
Route::get('/portal/customer/bookListCategoryWise/{b_category}','customerController@bookListCategoryWise2')->name('customer.bookListCategoryWise');
Route::get('/portal/customer/bookListCategoryWise/{b_category}','customerController@bookListCategoryWise2')->name('customer.bookListCategoryWise');

Route::get('/portal/customer/bookDetails/{b_id}','customerController@bookDetails')->name('customer.bookDetails');

Route::get('/portal/customer/addToCart/{b_id}','customerController@addToCart')->name('customer.addToCart');

Route::get('/portal/customer/myCart/{u_name}','customerController@myCart')->name('customer.myCart');

Route::get('/portal/customer/myCart/{ca_id}','customerController@buy')->name('customer.buy');

Route::post('/portal/customer','customerController@bookListCategoryWise');
//customer ends

//******************************************************************************



































});
//portal ends



Route::get('/logout', 'logoutController@index');




