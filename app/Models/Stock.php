<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $primaryKey = 'idStock';
    protected $foreignKeyProductos = 'idProducto';
    protected $foreignKeyProvedores = 'idProveedor';
    protected $table = 'stocks';
    protected $fillable = [

        'precioCompra',
        'precioVenta',
        'cantidad',
        'notas'
    ];

    public function productos(){
        return $this->belongsTo('App\Models\Producto', 'idProducto', 'idProducto');
    }

    public function proveedores(){
        return $this->belongsTo('App\Models\modelProveedores', 'idProveedor', 'idProveedor');
    }

}
