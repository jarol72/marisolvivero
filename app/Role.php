<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Obtener los usuarios que poseen un rol
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
