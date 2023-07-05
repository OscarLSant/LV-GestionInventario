<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ventas / Detalles de la venta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 style="text-align: center; font-size: 25px">Información general de la venta: {{ $venta->idVenta}}</h1>
                    <a href="{{ route('ventas.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
                    
                    <div class="row">
                        <div class="col align-self-start">
                        </div>
                    
                        <div class="col align-self-center">
                    
                            <label for=""><b>Venta: </b></label>
                            <label for=""> {{$venta->idVenta}} </label>
                            
                            <br><br>

                            <label for=""><b>Fecha de factura: </b></label>
                            <label for=""> {{$venta->fechaFactura}} </label>
                            
                            <br><br
                    
                            <label for=""><b>Cliente: </b></label>
                            <label for="">{{$venta->clientes->nombre}} </label>
                    
                        
                        </div>
                    
                        <div class="col align-self-end">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
