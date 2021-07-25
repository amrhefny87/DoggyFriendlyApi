<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\PostDog;
use App\Models\PostSitter;
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
        User::factory(10)->create();
        PostDog::factory(10)->create();
        PostSitter::factory(10)->create();
        Post::factory(10)->create();
        
    }
}
