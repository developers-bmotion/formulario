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
        "artistas_id",
        "contactos_id",
        "empresas_id"
    ];

    public function giras() {
        return $this->belongsToMany(Gira::class, 'evento_gira', 'eventos_id', 'giras_id');
    }

}
