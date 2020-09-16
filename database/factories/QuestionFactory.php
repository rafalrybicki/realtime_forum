<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Category;
use App\Question;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->text,
        'category_id' => rand(1, 10),
        'user_id' => rand(1, 20),
    ];
});
