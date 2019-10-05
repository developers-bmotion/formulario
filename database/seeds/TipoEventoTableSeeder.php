<?php

use App\CampaniaPublicitaria;
use App\Corporativo;
use App\Evento;
use Illuminate\Database\Seeder;
use \App\TipoEvento;
use App\VentaBoleteria;

class TipoEventoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tipo_evento = new TipoEvento();
        $tipo_evento->id = 1;
        $tipo_evento->nombre = 'Venta de boletería';
        $tipo_evento->save();

        $tipo_evento = new TipoEvento();
        $tipo_evento->id = 2;
        $tipo_evento->nombre = 'Corporativo';
        $tipo_evento->save();

        $tipo_evento = new TipoEvento();
        $tipo_evento->id = 3;
        $tipo_evento->nombre = 'Gubernamental';
        $tipo_evento->save();

        $tipo_evento = new TipoEvento();
        $tipo_evento->id = 4;
        $tipo_evento->nombre = 'Campaña publicitaria';
        $tipo_evento->save();

        $tipo_evento = new TipoEvento();
        $tipo_evento->id = 5;
        $tipo_evento->nombre = 'Giras';
        $tipo_evento->save();

        $tipo_evento = new TipoEvento();
        $tipo_evento->id = 6;
        $tipo_evento->nombre = 'Otros';
        $tipo_evento->save();
    }
}
