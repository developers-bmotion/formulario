<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaniaPublicitaria extends Model
{
    protected $fillable = [
        'agencia',
        'marca',
        'objetivo'
    ];
    
}
