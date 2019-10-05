<?php

use Illuminate\Database\Seeder;
use \App\TipoDocumentoPersona;

class TipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tipo_documento = new TipoDocumentoPersona();
        $tipo_documento->id = 1;
        $tipo_documento->nombre = 'Cédula de ciudadania';
        $tipo_documento->save();

        $tipo_documento = new TipoDocumentoPersona();
        $tipo_documento->id = 2;
        $tipo_documento->nombre = 'Cédula de extranjería';
        $tipo_documento->save();

        $tipo_documento = new TipoDocumentoPersona();
        $tipo_documento->id = 3;
        $tipo_documento->nombre = 'Pasaporte';
        $tipo_documento->save();

        $tipo_documento = new TipoDocumentoPersona();
        $tipo_documento->id = 4;
        $tipo_documento->nombre = 'Otro';
        $tipo_documento->save();
    }
}
