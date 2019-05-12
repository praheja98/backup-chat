<?php

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'comment' => $faker->sentence,
         // Any other Fields in your Comments Model
    ];
});
