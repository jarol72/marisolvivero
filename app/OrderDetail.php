<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderDetail extends Pivot
{
    // Definimos la tabla con la que trabajará el modelo
    protected $table = 'orderDetails';

    protected $touches = ['order'];
    public $incrementing = true;

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
