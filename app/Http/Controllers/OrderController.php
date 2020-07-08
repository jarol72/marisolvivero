<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\OrdersExport;
use Gloudemans\Shoppingcart\Facades\Cart;
use Barryvdh\DomPDF\Facade as PDF;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){    
        $orders = Order::orderBy('created_at', 'desc')->get();
        
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function editItem(Request $request, Order $order, $rowId)
    {
        return $request->all();
        $quantity = $request['quantity'];
        $orderId = $request['orderId'];
        dd($orderId);
        Cart::update($rowId, $quantity);

        return view('admin.orders.show', compact('orderId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        
        $order->delete();

        return redirect()->route('orders.index')->with('status', 'El pedido fue eliminado correctamente.');
    }

    public function xls() 
    {
        $ordersExport = new OrdersExport;
        return $ordersExport->download('Pedidos hastal el ' . date('Ymd') . '.xlsx');
        
    }

    public function pdf() 
    {
        $orders = Order::orderBy('created_at', 'desc')->get(); 
        /* $orders = DB::table('shoppingcart')
                        ->groupBy('identifier')        
                        ->orderBy('created_at', 'desc')
                        ->get();  */

        $pdf = PDF::loadView('admin.orders.pdf', compact('orders'));

        $pdf->setPaper('letter', 'portrait');
/* return view('admin.orders.pdf', compact('orders')); */
        return $pdf->stream('listado.pdf');
    }
}
