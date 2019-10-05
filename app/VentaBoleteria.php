<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaBoleteria extends Model
{
    protected $fillable = [
        "tiquetera_definida",
        "nombre_responsable",
        "experiencia_responsable"
    ];
}
