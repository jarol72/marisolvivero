<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    
    $categories = ['Aromática', 'Frutales', 'Hortalizas', 'Ornamentales', 'Reforestación'];
    
    foreach($categories as $category){
        return [
            'category' => $category
        ];
    }
});
