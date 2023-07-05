<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos / Detalles del producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 style="text-align: center; font-size: 25px">Información general del producto: {{ $producto->nombre}}</h1>
                    <a href="{{ route('productos.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
                    
                    <div class="row">
                        <div class="col align-self-start">
                        </div>
                    
                        <div class="col align-self-center">
                    
                            <label for=""><b>Nomnbre: </b></label>
                            <label for=""> {{$producto->nombre}} </label>
                            
                            <br><br>
                    
                            <label for=""><b>Detalles: </b></label>
                            <label for=""> {{$producto->detalles}} </label>

                            <br><br>
                    
                            <label for=""><b>Categoria: </b></label>
                            <label for="">{{$producto->categorias->nombre}} </label>
                    
                        
                        </div>
                    
                        <div class="col align-self-end">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
