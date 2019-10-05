<?php

use Illuminate\Database\Seeder;
use  \App\TipoCompania;

class TipoCompaniaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tipo_compania = new TipoCompania();
        $tipo_compania->id = 1;
        $tipo_compania->nombre = 'Privada';
        $tipo_compania->save();

        $tipo_compania = new TipoCompania();
        $tipo_compania->id = 2;
        $tipo_compania->nombre = 'Pública';
        $tipo_compania->save();

        $tipo_compania = new TipoCompania();
        $tipo_compania->id = 3;
        $tipo_compania->nombre = 'Persona Natural';
        $tipo_compania->save();

    }
}
