<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'tag'     => $faker->unique()->words(1,true)
    ];
});


