<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Definimos la tabla con la que trabajará el modelo Category
    protected $table = 'categories';

    /**
     * Obtener los productos que pertenecen a una categoría.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function scopeFilterCategory($query, $id)
    {
        return $query->where('id', '=', $id);
    }

}
