<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostDog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     PostDog::factory(10)->create();
    }
}
