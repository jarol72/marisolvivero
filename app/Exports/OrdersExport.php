<?php

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

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








/* public function headings(): array
{
    return [
        'Id',
        'Fecha',
        'Tiempo Transcurrido',
        'Common Name',
        'Quantity',
        'Cost',
        'Status',
    ];
}

public function map($order): array
{
    return [
        $order->user_id,
        Date::dateTimeToExcel($order->created_at),
        Date::dateTimeToExcel($order->created_at),
        $order->product->common_name,
        $order->product->quantity,
        $order->product->cost,
        $order->product->status,
    ];
}

public function columnFormats(): array
{
    return [
        'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        'E' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        'F' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        'G' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
    ];
} */