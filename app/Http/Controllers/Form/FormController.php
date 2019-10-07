<?php

namespace App\Http\Controllers\Form;

use App\Aforo;
use App\Ciudad;
use App\Pais;
use App\TipoCompania;
use App\TipoDocumentoCompania;
use App\TipoDocumentoPersona;
use App\TipoEvento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function index() {
        /*
        $tipo_eventos = TipoEvento::all();
        $tipo_companias = TipoCompania::all();
        $tipo_documento_persona = TipoDocumentoPersona::all();
        $tipo_documento_empresa = TipoDocumentoCompania::all();
        $paises = Pais::all();
        $aforo  = Aforo::all();
        */
        return view('form.form-show');
    }

    public function getCiudades(Request $request) {
        $codigo = $request->input('codigo', null);
        $ciudades = [];
        if ($codigo) {
            $ciudades = Ciudad::select(['idCiudades', 'ciudad'])->where('paisesCodigo', '=', $codigo)->get();
        }
        return response()->json($ciudades);
    }


    public function getData() {
        $tipo_eventos = TipoEvento::select(['id', 'nombre'])->get();
        $tipo_companias = TipoCompania::select(['id', 'nombre'])->get();
        $tipo_documento_persona = TipoDocumentoPersona::select(['id', 'nombre'])->get();
        $tipo_documento_empresa = TipoDocumentoCompania::select(['id', 'nombre'])->get();
        $aforos  = Aforo::select(['id', 'rango'])->get();
        return response()->json([
            'tipoEventos' => $tipo_eventos,
            'tipoCompanias' => $tipo_companias,
            'tipoDocumentoPersonas' => $tipo_documento_persona,
            'tipoDocumentoEmpresas' => $tipo_documento_empresa,
            'aforos' => $aforos
        ]);
    }

    public function getPaises() {
        return response()->json(Pais::all());
    }

    public function solicitarEvento(Request $request) {
        $evento = $request->input('evento');
        $company = $request->input('company');
        $contact = $request->input('contact');

        $empresa = \App\Empresa::updateOrCreate($company);
        $contacto = \App\Contacto::updateOrCreate($contact);
        $evento['contactos_id'] = $contacto->id;
        $evento['empresas_id'] = $empresa->id;

        if ($evento["tipos_eventos_id"] !== 5) {
            $evento = \App\Evento::updateOrCreate($evento);
        } else {
            $this->guardarGira($request, $contacto->id, $empresa->id);
        }

        /*
        $corporativos = $request->input('corporativos');
        $ventaBoleterias = $request->input('ventaBoleterias');
        */

        switch ($evento["tipos_eventos_id"]) {
            case 1:
                $this->guardarVentaBoleteria($request, $evento);
                break;
            case 2:
                $this->guardarCorporativo($request, $evento);
                break;
            case 3:
                $this->guardarCorporativo($request, $evento);
                break;
            case 4:
                $this->guardarCampaniaPublicitaria($request, $evento);
                break;
            case 5:
                # code...
                break;
            case 6:
                # code...
                break;
        }

        return response()->json([
            "msg" => 'Success'
        ], 201);
    }

    private function guardarVentaBoleteria(Request $request, $evento) {
        $ventaBoleterias = $request->input('ventaBoleterias');
        $ventaBoleterias['eventos_id'] = $evento->id;

        \App\VentaBoleteria::updateOrCreate($ventaBoleterias);
    }

    private function guardarCorporativo(Request $request, $evento) {
        $corporativos = $request->input('corporativos');
        $corporativos['eventos_id'] = $evento->id;

        \App\Corporativo::updateOrCreate($corporativos);
    }

    private function guardarCampaniaPublicitaria(Request $request, $evento) {
        $campaniaPublicitaria = $request->input('campaniaPublicitaria');
        $campaniaPublicitaria['eventos_id'] = $evento->id;

        \App\CampaniaPublicitaria::updateOrCreate($campaniaPublicitaria);
    }

    private function guardarGira(Request $request, int $contactoId, int $empresaId){
        $giras = $request->input('giras');

        $gira = \App\Gira::create($giras);

        foreach ($giras["data"] as $evento) {
            $evento['contactos_id'] = $contactoId;
            $evento['empresas_id'] = $empresaId;
            $evento = \App\Evento::create($evento);

            $gira->eventos()->attach($evento->id);
        }
    }
}
