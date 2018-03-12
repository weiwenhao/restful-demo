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
            'color' => '#57be9f',
        ]);

        \App\Models\Category::create([
            'name' => '健身',
            'color' => '#fdcb10',
        ]);
        \App\Models\Category::create([
            'name' => '阅读',
            'color' => '#f7835c',
        ]);
        \App\Models\Category::create([
            'name' => '英语',
            'color' => '#f58b37',
        ]);
        \App\Models\Category::create([
            'name' => '摄影',
            'color' => '#479adf',
        ]);
        \App\Models\Category::create([
            'name' => '音乐',
            'color' => '#d276db',
        ]);
        \App\Models\Category::create([
            'name' => '写作',
            'color' => '#5a7cdd',
        ]);
        \App\Models\Category::create([
            'name' => '陪伴',
            'color' => '#ec7a87',
        ]);
    }
}
