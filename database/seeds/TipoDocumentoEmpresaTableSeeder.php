<?php

use Illuminate\Database\Seeder;
use \App\TipoDocumentoCompania;

class TipoDocumentoEmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tipo_documento_empresa = new TipoDocumentoCompania();
        $tipo_documento_empresa->id = 1;
        $tipo_documento_empresa->nombre = 'NIT';
        $tipo_documento_empresa->save();

        $tipo_documento_empresa = new TipoDocumentoCompania();
        $tipo_documento_empresa->id = 2;
        $tipo_documento_empresa->nombre = 'Otro';
        $tipo_documento_empresa->save();
    }
}
