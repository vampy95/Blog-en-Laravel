<?php

use Illuminate\Database\Seeder;
use App\Articulo;

class ArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Articulo::class, 50)->create();
    }
}
