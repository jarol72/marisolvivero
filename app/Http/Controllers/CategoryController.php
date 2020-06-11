<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function filter($id)
    {
        $categories = Category::all();
        $category = Category::FilterCategory($id)->first();
        $products = $category->products()->paginate(12);
        
        return view('products.products')->with(['products' => $products, 'categories' => $categories]);
    }
}
