<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\User;
use App\Reply;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    $users = User::count();
    $replies = Reply::count();
    return [
        'user_id' => rand(1, $users),
        'reply_id' => rand(1, $replies)
    ];
});
