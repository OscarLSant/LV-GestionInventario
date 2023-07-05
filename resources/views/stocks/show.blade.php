<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stocks / Detalles del stock') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 style="text-align: center; font-size: 25px">Información general del stock: {{ $stock->nombre}}</h1>
                    <a href="{{ route('stocks.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
                    
                    <div class="row">
                        <div class="col align-self-start">
                        </div>
                    
                        <div class="col align-self-center">
                    
                            <label for=""><b>Producto: </b></label>
                            <label for=""> {{$stock->productos->nombre}} </label>
                            <br>

                            <label for=""><b>Proveedor: </b></label>
                            <label for=""> {{$stock->proveedores->nombre}} </label>
                            <br>

                            <label for=""><b>Precio de compra: </b></label>
                            <label for=""> {{$stock->precioCompra}} </label>
                            <br>

                            <label for=""><b>Precio de venta: </b></label>
                            <label for=""> {{$stock->precioVenta}} </label>
                            <br>

                            <label for=""><b>Cantidad: </b></label>
                            <label for=""> {{$stock->cantidad}} </label>
                            <br>

                            <label for=""><b>Notas: </b></label>
                            <label for=""> {{$stock->notas}} </label>
                            <br>
                  
                    
                        
                        </div>
                    
                        <div class="col align-self-end">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
