<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param \Faker\Generator $faker
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        \App\Models\Category::create([
            'name' => '跑步',
            'description' => '每天跑跑步',
            'color' => '#57be9f',
            'goal_id' => 1,
        ]);

        \App\Models\Category::create([
            'name' => '健身',
            'description' => '每天健健身',
            'color' => '#fdcb10',
            'goal_id' => 2,
        ]);
        \App\Models\Category::create([
            'name' => '阅读',
            'description' => '每天阅阅读',
            'color' => '#f7835c',
            'goal_id' => 3,
        ]);
        \App\Models\Category::create([
            'name' => '英语',
            'description' => '每天读英语',
            'color' => '#f58b37',
            'goal_id' => 4,
        ]);
        \App\Models\Category::create([
            'name' => '摄影',
            'description' => '每天摄摄影',
            'color' => '#479adf',
            'goal_id' => 12,
        ]);
        \App\Models\Category::create([
            'name' => '音乐',
            'description' => '每天听听歌',
            'color' => '#d276db',
            'goal_id' => 0,
        ]);
        \App\Models\Category::create([
            'name' => '写作',
            'description' => '每天写写做',
            'color' => '#5a7cdd',
            'goal_id' => 28,
        ]);
        \App\Models\Category::create([
            'name' => '陪伴',
            'description' => '每天的陪伴',
            'color' => '#ec7a87',
            'goal_id' => 50,
        ]);
    }
}
