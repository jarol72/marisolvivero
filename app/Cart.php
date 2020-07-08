<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'shoppingcart';
    protected $primaryKey = 'identifier';
    public $incrementing = false;
    protected $keyType = 'string';

}
