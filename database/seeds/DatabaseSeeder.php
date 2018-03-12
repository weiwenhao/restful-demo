<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 20)->create();
        $this->call(CategorySeeder::class);
        factory(\App\Models\Goal::class, 100)->create();
        factory(\App\Models\Diary::class, 1000)->create();
    }
}
