<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Exports\ProductsExport;
use Barryvdh\DomPDF\Facade as PDF;


class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('catalog');
    }
    
    public function index()
    {
        $categories = Category::get();
        $products = Product::get();
        
        return view('admin.products.index')->with(['products' => $products, 'categories' => $categories]);
    }
    
    public function create()
    {
        $categories = Category::get();
        return view('admin.products.create')->with(['product' => new Product,  'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            
            'category_id' => 'required',
            'common_name' => 'required|unique:App\Product,common_name',
            'scientific_name' => 'required|unique:App\Product,scientific_name',
            'cost' => 'required|Integer|min:0',
            'stock' => 'required|Integer|min:0',
            'use' => 'required',
            'image' => 'string'
            ]);
        
            $product = new Product;
            $product->category_id = $request->input('category_id');
            $product->common_name = $request->input('common_name');
            $product->scientific_name = $request->input('scientific_name');
            $product->cost = $request->input('cost');
            $product->stock = $request->input('stock');
            $product->use = $request->input('use');
            
            $image = $request->file('image');
            if($image){
                // Poner nombre único a la imagen
                $image_name = time().$image->getClientOriginalName();
    
                // Guardar imagen en carpeta (storage/app/productsimg)
                Storage::disk('productsimg')->put($image_name, File::get($image));
    
                $product->image = $image_name;
            }
            
            $product->save();        
        
        return redirect()->route('products.index')->with('status', 'El producto fue creado correctamente.');
        
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
        $product = Product::findOrFail($id);
        return view('admin.products.edit')->with(['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'id' => 'required',
            'category_id' => 'required',
            'common_name' => 'required|unique:App\Product,common_name,'.$id,
            'scientific_name' => 'required|unique:App\Product,scientific_name,'.$id,
            'cost' => 'required|Integer|min:0',
            'stock' => 'required|Integer|min:0',
            'use' => 'required',
            'image' => ''
        ]);
 
        $product = Product::findOrFail($id);
        $product->category_id = $request->input('category_id');
        $product->common_name = $request->input('common_name');
        $product->scientific_name = $request->input('scientific_name');
        $product->cost = $request->input('cost');
        $product->stock = $request->input('stock');
        $product->use = $request->input('use');
        
        $image = $request->file('image');
        if($image){
            // Poner nombre único a la imagen
            $image_name = time().$image->getClientOriginalName();

            // Guardar imagen en carpeta (storage/app/productsimg)
            Storage::disk('productsimg')->put($image_name, File::get($image));

            $product->image = $image_name;
        }
        
        $product->update();
        
        /* $product->image = $request->file('image')->store('productsimg');
        
        $product->update($request->except('image')); */

        return redirect()->route('products.edit', $id)->with('status', 'El producto fue actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('status', 'El producto fue eliminado correctamente.');

    }

    public function getImage($filename){
        $file = Storage::disk('productsimg')->get($filename);
        return new Response($file, 200);
    }

    public function catalog()
    {
        $categories = Category::get();
        $products = Product::paginate(12);
        
        return view('catalog')->with(['products' => $products, 'categories' => $categories]);
    }

    public function xls() 
    {
        $productsExport = new ProductsExport;
        return $productsExport->download('Products ' . date('Ymd') . '.xlsx');
        
    }

    public function pdf() 
    {
        $categories = Category::all();
        $products = Product::orderBy('common_name')->get(); 

        $pdf = PDF::loadView('admin.products.pdf', compact('products', 'categories'));
        $pdf->setPaper('letter', 'landscape');

        return $pdf->stream('listado.pdf');
    }

    public function inout($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.inout')->with(['product' => $product]);
    }
    
    public function transaction(Request $request, $id) 
    {
        $this->validate($request,[
            'id' => 'required',
            'quantity' => 'required|integer',
            'type' => 'required',
            'reason' => 'required',
        ]);
        $id = $request['id'];
        $type = $request['type'];
        $quantity = $request['quantity'];

        $product = Product::findOrFail($id);
        
        switch($type){
            case 'entrada':
                $product->stock += $quantity;
                $operation = 'agregado';
            break;

            case 'salida':
                $product->stock -= $quantity;
                $operation = 'disminuido';
            break;

            default:
                print ('<script>alert("No ha seleccionado el tipo de operación");</script>');
            }
        
        $product->update($request->only('quantity'));

        DB::table('product_transactions')->insert([
            'product_id' => $id,
            'user_id' => auth()->user()->id,
            'type' => $type,
            'quantity' => $quantity,
            'created_at' => new \DateTime
        ]);

        return redirect()->route('products.show', $id)->with('status', 'Se han ' . $operation . ' ' . $quantity . ' unidades al producto ' . $product->common_name);
    }

    public function orders(){
        return $this->belongsToMany('\App\Order', 'order_product', 'product_id', 'order_id')->withPivot('quantity')->withTimestamps();
    }
}
