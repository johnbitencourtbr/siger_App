<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    protected $fillable =
    [
        'id','descricao','etiqueta','numero_serie','marca','modelo'
    ];
}
