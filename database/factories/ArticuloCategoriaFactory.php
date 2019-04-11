<?php

use Faker\Generator as Faker;

$factory->define(App\ArticuloCategoria::class, function (Faker $faker) {
    return [
        //Para que todos los articulos pertenezcan almenos a una categoria
        'articulo_id' => $faker->unique()->numberBetween($min = 1, $max = 50),
        'categoria_id' => App\Categoria::all()->random()->id,
    ];
});
