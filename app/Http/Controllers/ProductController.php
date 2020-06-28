<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;
use App\Exports\ProductsExport;


class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('catalog');
    }
    
    public function index()
    {
        $categories = Category::get();
        $products = Product::paginate(10);
        
        return view('admin.products.index')->with(['products' => $products, 'categories' => $categories]);
    }
    
    public function create()
    {
        $categories = Category::get();
        return view('admin.products.create')->with(['product' => new Product,  'categories' => $categories]);
    }

    public function store(SaveProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.create')->with('status', 'El producto fue registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(['product' => $product, 'categories' => $categories]);
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

    public function catalog()
    {
        $categories = Category::get();
        $products = Product::paginate(12);
        
        return view('catalog')->with(['products' => $products, 'categories' => $categories]);
    }

    public function xls() 
    {
        $employeesExport = new ProductsExport;
        return $employeesExport->download('Products ' . date('Ymd') . '.xlsx');
        
    }

    public function pdf() 
    {
        $employeesExport = new ProductsExport;
        return $employeesExport->download('Products ' . date('Ymd') . '.pdf');
        
    }
}
