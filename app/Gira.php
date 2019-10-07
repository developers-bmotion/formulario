<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gira extends Model
{
    protected $guarded = ['data'];

    public function eventos() {
        return $this->belongsToMany(Evento::class, 'evento_gira', 'giras_id', 'eventos_id');
    }
}
