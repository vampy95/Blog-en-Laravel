<?php

use Faker\Generator as Faker;

$factory->define(App\Articulo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'content' => $faker->paragraph(),
        'user_id' => App\User::all()->random()->id,
    ];
});
