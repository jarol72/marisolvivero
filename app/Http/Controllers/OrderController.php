<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Illuminate\Support\Facades\DB;
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
        
        $orders = Order::orderBy('created_at', 'asc')->get();
        
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.orders.create');
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
        /* $order_product = OrderProduct::where('order_id', $order->id)->first(); */ 
        $order = Order::findOrFail($order->id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the quantity of the specified cart item.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
       $order = Order::findOrFail($order->id);
       $order->status = request('status');

       $order->save();

       return redirect()->route('orders.index')->with('status', 'El pedido se marcó como entregado.');
    }

    /**
     * Show the form for editing the quantity of the specified cart item.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    /* public function editItem(Request $request, Order $order, $rowId)
    {
        return $request->all();
        $quantity = $request['quantity'];
        $orderId = $request['orderId'];
        dd($orderId);
        Cart::update($rowId, $quantity);

        return view('admin.orders.show', compact('orderId'));
    } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order)
    {
       

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

        return $pdf->stream('listado.pdf');
    }



    public function search(Request $request)
    {
    if($request->ajax())
    {
    $output="";
    $products=DB::table('products')->where([
                                            ['common_name','LIKE','%'.$request->search."%"],
                                            /* ['scientific_name','LIKE','%'.$request->search."%"] */
                                        ])
                                        ->get();
    if($products)
    {
    foreach ($products as $key => $product) {
    $output.='<tr>'.
    '<td>'.$product->id.'</td>'.
    '<td>'.$product->common_name.'</td>'.
    '<td>'.$product->scientific_name.'</td>'.
    '<td>'.$product->cost.'</td>'.
    '<td>'.$product->stock.'</td>'.
    '<td>'.
            '<form method="GET" action="/cart/'.$product->id.'/edit/" class="my-2">
                
                <input type="text" name="id" value="'.$product->id.'">
                <div class="form-group align-items-baseline d-flex m-0">
                    <input class="form-control form-control-sm w-25 mr-2" name="quantity" type="number"  max="{{ $product->stock }}" min="0" placeholder="">
                    <input type="submit" class="btn bg-btn-lightgreen text-white btn-sm my-2" value="Agregar">
                </div>
            </form>'
    .'</td>'.
    '</tr>';
    }
    return Response($output);
       }
       }
    }


}
