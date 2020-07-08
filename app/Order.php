<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'shoppingcart';
    protected $primaryKey = 'identifier';
    public $incrementing = false;
    protected $keyType = 'string';
    
    //
    protected $attributes = [
        'status' => 'Pendiente de pago',
    ];

    /**
     * Obtener los productos incluidos en el pedido.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product')->as('detail')
                    ->using('App\OrderDetail')
                    ->withPivot(['quantity', 'created_at', 'updated_at'])
                    ->withTimeStamps();
    }
}
