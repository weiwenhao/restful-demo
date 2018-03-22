<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Goal::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'began_at' => date('Y-m-d H:i:s', time() + mt_rand(-31556926, 2592000)),
        'ended_at' => date('Y-m-d H:i:s', time() + mt_rand(-2592000, 31556926)),
        'category_id' => \App\Models\Category::all()->random()->id,
        'user_id' => \App\Models\User::all()->random()->id,
        'kept_days' => mt_rand(1, 100)
    ];
});
