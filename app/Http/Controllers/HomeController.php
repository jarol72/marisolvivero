<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Show homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $categories = Category::all();
        $products = Product::inRandomOrder()->take(8)->get();
        return view('home', compact('categories', 'products'));
    }

    public function getImage($filename){
        $file = Storage::disk('productsimg')->get($filename);
        return new Response($file, 200);
    }
    
    
}
