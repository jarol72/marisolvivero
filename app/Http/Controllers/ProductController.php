<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Http\Requests\SaveProductRequest;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    
    public function index()
    {
        $categories = Category::get();
        $products = Product::paginate(12);
        
        return view('products.products')->with(['products' => $products, 'categories' => $categories]);
    }
    
    public function create()
    {
        $categories = Category::get();
        return view('products.create')->with(['product' => new Product,  'categories' => $categories]);
    }

    public function store(SaveProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.create')->with('status', 'El producto fue registrado correctamente.');
    }

    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::find($id);
        return view('products.edit')->with(['product' => $product, 'categories' => $categories]);
    }

    public function update(Product $product, SaveProductRequest $request)
    {
        $product->update($request->validated());

        return redirect()->route('products.edit')->with('status', 'El producto fue actualizado correctamente.');

    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('status', 'El producto fue eliminado correctamente.');

    }
}
