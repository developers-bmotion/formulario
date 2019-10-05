<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        "nombre",
        "direccion",
        "sitioWeb",
        "documento",
        "tipos_companias_id",
        "tipos_documentos_personas_id",
        "tipos_documentos_compania_id",
        "ciudades_id"
    ];
}
