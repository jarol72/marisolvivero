<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    /**
     * Show the cart content.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('cart');
    }

    public function add(Request $request, int $id) {
        /* return $request->all(); */
        
        $id = $request['id'];
        $quantity = $request['quantity'];
        
        $product = Product::findOrFail($id);
        
        /* Add the product */
        Cart::add($product, $quantity);

        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('catalog');
    }

     public function itemEdit(Request $request, $rowId)
    {
        $quantity = $request['quantity'];
        
        Cart::update($rowId, $quantity);

        return view('cart');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('cart.index')->with('status', 'El producto fue eliminado correctamente.');
    }

    public function store(Request $request)
    {
        $nit = $request['nit'];
        
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->nit : $request->nit,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => now('America/Bogota'),
            'total' => Cart::total()*1000,
            ]);
            
            // Insert into order_product table
            foreach (Cart::content() as $item){
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                    ]);
                }
        
        Cart::instance($nit)->store($nit);
        
        Cart::instance('default')->destroy();

        return redirect()->route('cart.index')->with('orderSent', 'Su pedido ha sido enviado correctamente');
    }

    
}
