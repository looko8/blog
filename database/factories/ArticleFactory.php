<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'section_id' => $faker->randomDigitNot(6,7,8,9),
        'title' => Str::random(10),
        'description' => Str::random(100)
    ];
});
