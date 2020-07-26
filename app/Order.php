<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /* protected $table = 'shoppingcart';
    protected $primaryKey = 'identifier';
    public $incrementing = false;
    protected $keyType = 'string'; */
    
    // Atributos asignables en forma masiva
    protected $fillable = [
        'user_id', 'date', 'name', 'email', 'phone', 'total', 'status'
    ];

    // Definir el valor por defecto del campo 'status'
    protected $attributes = [
        'status' => 'Por entregar',
    ];

    /**
     * Obtener los productos incluidos en el pedido.
     */
   /*  public function products()
    {
        return $this->belongsToMany('App\Product')->as('detail')
                    ->using('App\OrderProduct')
                    ->withPivot(['quantity', 'created_at', 'updated_at'])
                    ->withTimeStamps();
    } */

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'order_product', 'order_id', 'product_id')->withPivot('quantity')->withTimestamps();
    }
}
