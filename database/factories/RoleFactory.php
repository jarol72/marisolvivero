<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    
    $roles = ['Administrador', 'Empleado', 'Cliente'];
    
    foreach($roles as $role){
        return [
            'role' => $role
        ];
    }
});

