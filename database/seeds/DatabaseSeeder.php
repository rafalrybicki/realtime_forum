<?php

use App\Like;
use App\User;
use App\Reply;
use App\Category;
use App\Question;
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
        // $this->call(UserSeeder::class);
        // factory(User::class, 20)->create();
        // factory(Category::class, 10)->create();
        // factory(Question::class, 500)->create();
        factory(Reply::class, 1000)->create();
        // factory(Like::class, 2000)->create();
    }
}
