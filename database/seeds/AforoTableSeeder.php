<?php

use Illuminate\Database\Seeder;
use \App\Aforo;

class AforoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aforo = new Aforo();
        $aforo->id = 1;
        $aforo->rango = '1-1000';
        $aforo->save();

        $aforo = new Aforo();
        $aforo->id = 2;
        $aforo->rango = '1001-2000';
        $aforo->save();

        $aforo = new Aforo();
        $aforo->id = 3;
        $aforo->rango = '2001-3000';
        $aforo->save();

        $aforo = new Aforo();
        $aforo->id = 4;
        $aforo->rango = '+3000';
        $aforo->save();
    }
}
