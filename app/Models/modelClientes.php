<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\controllerClientes;

class modelClientes extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCliente';
    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'direccion'
    ];
}
