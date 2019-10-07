<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporativo extends Model
{
    protected $fillable = [
        "cliente_final",
        "objetivo_evento",
        "eventos_id"
    ];
}
