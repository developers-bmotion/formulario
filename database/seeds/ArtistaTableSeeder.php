<?php

use App\Artista;
use Illuminate\Database\Seeder;

class ArtistaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aforo = new Artista();
        $aforo->id = 1;
        $aforo->nombre = 'Yeison Jiménez';
        $aforo->save();
    }
}
