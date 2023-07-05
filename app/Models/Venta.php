<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $primaryKey = 'idVenta';
    protected $foreignKey = 'idCliente';
    protected $table = 'ventas';
    protected $fillable = [

        'fechaFactura'
    ];

    public function clientes(){
        return $this->belongsTo('App\Models\modelClientes', 'idCliente', 'idCliente');
    }
}
