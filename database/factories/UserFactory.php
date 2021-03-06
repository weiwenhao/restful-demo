<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'avatar' => $faker->imageUrl(200, 200),
        'nickname' => $faker->name,
        'sex' => mt_rand(0, 2),
        'category_id' => mt_rand(1, 8),
        'goal_id' => mt_rand(1, 1000),
        'kept_days' => mt_rand(1, 100)
    ];
});
