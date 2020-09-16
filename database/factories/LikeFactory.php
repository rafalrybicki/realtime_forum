<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\User;
use App\Reply;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 20),
        'reply_id' => rand(1, 1000)
    ];
});
