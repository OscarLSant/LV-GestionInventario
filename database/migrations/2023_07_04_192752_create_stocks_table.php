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
        Schema::create('stocks', function (Blueprint $table) {
            
            $table->increments('idStock');
            $table->double('precioCompra');
            $table->double('precioVenta');
            $table->integer('cantidad');
            $table->string('notas', 500);
            
            
            $table->integer('idProducto')->unsigned();
            $table->foreign('idProducto')->references('idProducto')->on('productos');

            $table->integer('idProveedor')->unsigned();
            $table->foreign('idProveedor')->references('idProveedor')->on('proveedores');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
