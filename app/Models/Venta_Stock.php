<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta_Stock extends Model
{
    use HasFactory;

    protected $primaryKey = 'idVentaStock';
    protected $foreignKeyVenta = 'idVenta';
    protected $foreignKeyStock = 'idStock';
    protected $table = 'venta_stocks';
    protected $fillable = [

        'cantidad',
        'desceunto'

    ];

    public function ventas(){
        return $this->belongsTo('App\Models\Venta', 'idVenta', 'idVenta');
    }

    public function stocks(){
        return $this->belongsTo('App\Models\Stock', 'idStock', 'idStock');
    }
}

