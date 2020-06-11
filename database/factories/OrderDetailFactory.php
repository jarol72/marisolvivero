<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\Product;
use App\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' => Order::inRandomOrder()->value('id') ?: factory(Order::class, 5)->unique(),
        'product_id' => Product::inRandomOrder()->value('id') ?: factory(Product::class),
        'quantity' => $faker->numberBetween(1,300)
    ];
});
