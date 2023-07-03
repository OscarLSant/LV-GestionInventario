<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelProveedores extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProveedor';
    protected $table = 'proveedores';
    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'direccion',
    ];
}
