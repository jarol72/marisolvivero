<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

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
        
        Cart::store($nit);

        Cart::destroy();

        return redirect()->route('cart.index')->with('orderSent', 'Su pedido ha sido enviado correctamente');
    }
}
