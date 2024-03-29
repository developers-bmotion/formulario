<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoEventos = TipoEvento::select(['id', 'nombre'])->get();
        return response()->json($tipoEventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoEvento $tipoEvento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoEvento $tipoEvento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoEvento $tipoEvento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoEvento $tipoEvento)
    {
        //
    }
}
