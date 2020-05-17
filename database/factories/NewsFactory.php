<?php

$factory->define(App\News::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "description" => $faker->name,
        "meta_title" => $faker->name,
        "meta_description" => $faker->name,
    ];
});
