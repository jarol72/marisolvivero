<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
        
    /**
     * Obtener la categoría a la que pertenecen el producto.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Obtener los pedidos en los que está incluido un producto.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order')->as('included_in')
                    ->using('App\OrderDetail')
                    ->withPivot(['quantity', 'created_at', 'updated_at'])
                    ->withTimestamps();
    }
}
