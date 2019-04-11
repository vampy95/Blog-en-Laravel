<?php

use Illuminate\Database\Seeder;
use App\ArticuloCategoria;

class ArticulosCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ArticuloCategoria::class, 50)->create();
    }
}
