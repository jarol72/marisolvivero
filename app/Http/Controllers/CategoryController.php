<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller
{
    /* public function filter($id)
    {
        $categories = Category::all();
        $category = Category::FilterCategory($id)->first();
        $products = $category->products()->paginate(12);
        
        return view('catalog')->with(['products' => $products, 'categories' => $categories]);
    } */

    public function filter($id)
    {
        $categories = Category::all();
        $category = Category::FilterCategory($id)->first();
        $products = $category->products()->paginate(12);
        
        if(auth()->check() && auth()->user()->role_id !=3){
            return view('admin.products.index')->with(['products' => $products, 'categories' => $categories]);
        }else{
            return view('catalog')->with(['products' => $products, 'categories' => $categories]);
        }
    }
}
