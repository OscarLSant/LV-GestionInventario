<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Venta-Stock / Detalles de Venta-stock') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 style="text-align: center; font-size: 25px">Información general de la venta stock: {{ $venta_stock->idVentaStock}}</h1>
                    <a href="{{ route('venta_stocks.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
                    
                    <div class="row">
                        <div class="col align-self-start">
                        </div>
                    
                        <div class="col align-self-center">
                    
                            <label for=""><b>Venta: </b></label>
                            <label for=""> {{$venta_stock->ventas->idVenta}} </label>
                            <br>

                            <label for=""><b>vStock: </b></label>
                            <label for=""> {{$venta_stock->stocks->idStock}} </label>
                            <br>

                            <label for=""><b>Cantidad: </b></label>
                            <label for=""> {{$venta_stock->cantidad}} </label>
                            <br>

                            <label for=""><b>Descuento: </b></label>
                            <label for=""> {{$venta_stock->descuento}} </label>
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
