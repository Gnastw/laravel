<?php

use Faker\Generator as Faker;

$factory->define(\App\Spending::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(1, true),
        'price' => $faker->randomFloat(2,1,2000),
        'description' => $faker->text,
        'status' => $faker->randomElement(array('account','paid'))
    ];
});
