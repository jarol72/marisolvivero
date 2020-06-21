<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'order_id' => Order::inRandomOrder()->value('id') ?: factory(Order::class, 5)->unique(),
        'date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', 'America/Bogota'),
        'total' => $faker->numberBetween($min = 1000, $max = 10000)
    ];
});
