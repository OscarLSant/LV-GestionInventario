<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\controllerCategorias;

class modelCategorias extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCategoria';
    protected $table = 'categorias';
    protected $fillable = [
        'nombre',
    ];
}
