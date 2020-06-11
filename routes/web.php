<?php

use Illuminate\Support\Facades\Route;

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
use App\Product;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Rutas de productos
Route::get('products/category/{id}', 'CategoryController@filter')->name('category_filter');
Route::resource('products', 'ProductController');

// Rutas de empleados
Route::resource('employees', 'EmployeeController');   

// Rutas de clientes
Route::resource('clients', 'ClientController');

// Rutas de contacto
Route::view('contact', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('message.store');

// Rutas para vistas simples
Route::view('who', 'who')->name('who');
Route::view('help', 'help')->name('help');
