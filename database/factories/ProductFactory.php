<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => Category::inRandomOrder()->value('id') ?: factory(Category::class),
        'common_name' => $faker->unique()->firstName,
        'scientific_name' => $faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
        'cost' => $faker-> numberBetween($min = 1000, $max = 10000),
        'stock' => $faker-> numberBetween($min = 20, $max = 30),
        'use' => $faker-> sentences($nb = 3, $asText = false),
        'image' => $faker->unique()->imageUrl(350, 350, 'nature')
    ];
});
