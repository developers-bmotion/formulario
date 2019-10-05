<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        "fecha",
        "hora",
        "lugar",
        "ciudades_id",
        "aforos_id",
        "tipos_eventos_id",
        "artistas_id"
    ];

}
