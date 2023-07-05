<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('venta_stocks', function (Blueprint $table) {
           
            $table->increments('idVentaStock');
            $table->integer('cantidad');
            $table->double('descuento');
            
            $table->integer('idVenta')->unsigned();
            $table->foreign('idVenta')->references('idVenta')->on('ventas');

            $table->integer('idStock')->unsigned();
            $table->foreign('idStock')->references('idStock')->on('stocks');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_stocks');
    }
};
