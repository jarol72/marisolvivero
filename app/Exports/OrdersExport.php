<?php

namespace App\Exports;

use App\Cart;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class OrdersExport implements FromCollection, WithColumnFormatting, WithHeadings, ShouldAutoSize
{
    use Exportable;
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cart::select('identifier', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            
            'Enviado',
        ];
    }

    public function map($order): array
    {
        return [
            $order->identifier,
            $order->content,
            Date::dateTimeToExcel($order->created_at),
        ];
    }
    
    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }


}
