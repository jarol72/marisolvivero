<?php

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrdersExport implements FromView, ShouldAutoSize  /* , WithColumnFormatting, WithHeadings, WithMapping */
{
    use Exportable;
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.orders.xls', ['orders' => Order::all()]);
    }
}
