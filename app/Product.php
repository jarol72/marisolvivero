<?php

namespace App;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Buyable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'common_name', 'scientific_name', 'cost', 'stock', 'image', 'category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
        'cost' => 'integer',
        'stock' => 'integer',
    ];
    
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

    // Para uso con el carro de compras
    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->common_name;
    }

    public function getBuyablePrice($options = null) {
        return $this->cost;
    }
}
