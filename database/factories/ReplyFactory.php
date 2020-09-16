<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Reply;
use App\Question;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'user_id' => rand(1, 20),
        'question_id' => rand(1, 500),
    ];
});
