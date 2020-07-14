<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->value('id') ?: factory(User::class),
        'date' => $faker->dateTime('now'),
        'status' => $faker->randomElement(['Por entregar','Entregado']),
    ];
});
