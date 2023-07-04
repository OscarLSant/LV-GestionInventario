<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProducto';
    protected $foreignKey = 'idCategoria ';
    protected $table = 'productos';
    protected $fillable = [

        'nombre',
        'detalles'
    ];

    public function clientes(){
        return $this->belongsTo('App\Models\modelCategorias', 'idCategoria', 'idCategoria');
    }
}
