<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// Rutas Administrativas
Route::middleware('admin')->prefix('admin')->group(function(){
    
    // Página de inicio del área administrativa
    Route::get('/home', 'AdmHomeController@index')->name('admin.index');
    
    // Rutas de empleados
    Route::get('employees/xls', 'EmployeeController@xls')->name('employees.xls');
    Route::get('employees/pdf', 'EmployeeController@pdf')->name('employees.pdf');
    Route::resource('employees', 'EmployeeController');   
    
    // Rutas de clientes
    Route::get('clients/xls', 'ClientController@xls')->name('clients.xls');
    Route::get('clients/pdf', 'ClientController@pdf')->name('clients.pdf');
    Route::resource('clients', 'ClientController');
    
    // Rutas de productos
    Route::get('products/image/{fielname}', 'ProductController@getImage')->name('products.image');
    Route::get('products/inout/{id}', 'ProductController@inout')->name('products.inout');
    Route::get('products/transaction/{id}', 'ProductController@transaction')->name('products.transaction');
    Route::get('products/xls', 'ProductController@xls')->name('products.xls');
    Route::get('products/pdf/{category?}', 'ProductController@pdf')->name('products.pdf');
    Route::resource('products', 'ProductController');
    Route::get('products/category/{id}', 'CategoryController@filter')->name('adm_category_filter');
    
    // Rutas de pedidos
    Route::get('orders/xls', 'OrderController@xls')->name('orders.xls');
    Route::get('orders/pdf', 'OrderController@pdf')->name('orders.pdf');
    Route::get('orders/create/search', 'OrderController@search')->name('orders.search');
    Route::get('orders/{id}/deliver', 'OrderController@deliver')->name('orders.deliver');
    /* Route::patch('orders/{rowId}/{order}', 'OrderController@edit')->name('orders.edit'); */
    Route::resource('orders', 'OrderController');
    
});

Route::get('image/{filename}', 'HomeController@getImage')->name('home-products.image');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// Rutas del catálogo
Route::get('catalog', 'ProductController@catalog')->name('catalog');
Route::get('catalog/image/{fielname}', 'ProductController@getImage')->name('catalog.image');
Route::get('catalog/category/{id}', 'CategoryController@filter')->name('category_filter');

// Rutas de contacto
Route::view('contact', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('message.store');

// Rutas para vistas simples
Route::view('who', 'who')->name('who');
Route::get('help', 'HelpController@getDownload')->name('help');

Auth::routes();

// Ruta para el carro de compras
Route::post('cart/store', 'CartController@store')->name('cart.store');
Route::get('cart', 'CartController@index')->name('cart.index');
Route::patch('cart/add/{id}', 'CartController@add')->name('cart.add');
Route::get('cart/add/{id}', 'CartController@add')->name('cart.add');
Route::get('cart/{id}/edit/', 'CartController@itemEdit')->name('cart.edit');
Route::delete('cart/edit/{id}/', 'CartController@remove')->name('cart.remove');