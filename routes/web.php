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
    Route::get('products/inout/{id}', 'ProductController@inout')->name('products.inout');
    Route::get('products/transaction/{id}', 'ProductController@transaction')->name('products.transaction');
    Route::get('products/xls', 'ProductController@xls')->name('products.xls');
    Route::get('products/pdf/{category?}', 'ProductController@pdf')->name('products.pdf');
    Route::resource('products', 'ProductController');
    Route::get('products/category/{id}', 'CategoryController@filter')->name('adm_category_filter');
    
    // Rutas de facturas
    Route::resource('invoices', 'InvoiceController');
    
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// Rutas del catálogo
Route::get('catalog', 'ProductController@catalog')->name('catalog');
Route::get('catalog/category/{id}', 'CategoryController@filter')->name('category_filter');

// Rutas de contacto
Route::view('contact', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('message.store');

// Rutas para vistas simples
Route::view('who', 'who')->name('who');
Route::view('help', 'help')->name('help');

Auth::routes();

// Ruta para el buscado en tiempo real
Route::get('clients/search', 'ClientController@search');

