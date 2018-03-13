<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Diary::class, function (Faker $faker) {
    $data =  [
        'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'audio' => 'http://omjq5ny0e.bkt.clouddn.com/suoxing.mp3',
        'video' => 'http://omjq5ny0e.bkt.clouddn.com/test_video.mp4',
        'goal_id' => \App\Models\Goal::all()->random()->id,
        'category_id' => \App\Models\Category::all()->random()->id,
        'user_id' => \App\Models\User::all()->random()->id
    ];

    for ($i = 0; $i <= mt_rand(1, 8); ++$i) {
        $data['images'][] = $faker->imageUrl();
    }
    return $data;
});
