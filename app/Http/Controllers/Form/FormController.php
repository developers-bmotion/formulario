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

        $tipo_eventos = TipoEvento::all();
        $tipo_companias = TipoCompania::all();
        $tipo_documento_persona = TipoDocumentoPersona::all();
        $tipo_documento_empresa = TipoDocumentoCompania::all();
        $paises = Pais::all();
        $aforo  = Aforo::all();
        return view('form.form-show', compact(
            'tipo_eventos', 
            'tipo_companias',
            'paises', 
            'tipo_documento_empresa', 
            'tipo_documento_persona', 
            'aforo'
        ));
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
        $roles = $request->input('campaniaPublicitaria');
        return response()->json($request->all());
    }
}
