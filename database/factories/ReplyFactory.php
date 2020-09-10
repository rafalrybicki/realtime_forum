<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Reply;
use App\Question;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    $users = User::count();
    $questions = Question::count();

    return [
        'body' => $faker->text,
        'question_id' => rand(1, $questions),
        'user_id' => rand(1, $users)
    ];
});
