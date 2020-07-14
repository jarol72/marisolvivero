<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    // Definimos la tabla con la que trabajará el modelo
    protected $table = 'order_product';
    
    // Atributos asignables en forma masiva
    protected $fillable = [
        'order_id', 'product_id', 'user_id', 'quantity'
    ];
    
    protected $touches = ['order'];
    
    public $incrementing = true;

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function products(){
        return $this->hasMany('App\Product')->with('produc_id');
    }
}
