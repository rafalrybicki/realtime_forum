<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Category;
use App\Question;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    $title = $faker->sentence;
    $users = User::count();
    $categories = Category::count();

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->text,
        'category_id' => rand(1, $categories),
        'user_id' => rand(1, $users),
    ];
});
