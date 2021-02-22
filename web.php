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
Route::get('/whoami','WhatsMyNameController@index');
Route::get('/askme', function () { return view('whoami'); });

Route::get('/login', function()
{
    echo ("This is a test");
    // View 'loginView'has to be the name of the file in the view.
    return view('loginView');
});
// When the data is posted from the login page with
// the action set to 'doLogin' it will come here.
// then the route the request to the function called index
// in the LoginController. 
Route::post('/doLogin', 'LoginController@login');
Route::get('/login2', function ()
{
    return view('login2');
});
//Route to add a customer
Route::get('/customer', function()
{
    return view('customer');
});

Route::post('/addcustomer', 'CustomerController@index');

Route::get('/neworder', function()
{
    return view('order');
});
Route::post('/addorder', 'OrderController@index');

