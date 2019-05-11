<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title'     => $faker->unique()->words(3,true),
        'content'   => $faker->paragraph(rand(15,30))
    ];
});
