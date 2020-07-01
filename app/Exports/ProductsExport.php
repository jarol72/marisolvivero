<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('id', 'category_id', 'common_name', 'scientific_name','cost','stock')->get();
    }
    
    public function headings(): array
    {
        return [
            'Id',
            'Categoría',
            'Nombre Común',
            'Nombre Científico',
            'Costo',
            'Existencias',
        ];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->category,
            $product->common_name,
            $product->scientific_name,
            $product->cost,
            $product->stock
        ];
    }
    
    

}
