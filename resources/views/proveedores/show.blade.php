<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proveedores / Detalles del proveedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 style="text-align: center; font-size: 25px">Información general del proveedor: {{ $proveedor->nombre}}</h1>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
                    
                    <div class="row">
                        <div class="col align-self-start">
                        </div>
                    
                        <div class="col align-self-center">
                    
                            <label for=""><b>Nomnbre: </b></label>
                            <label for=""> {{$proveedor->nombre}} </label>
                            
                            <br><br>
                    
                            <label for=""><b>Teléfono: </b></label>
                            <label for=""> {{$proveedor->telefono}} </label>

                            <br><br>
                    
                            <label for=""><b>Correo electrónico: </b></label>
                            <label for=""> {{$proveedor->correo}} </label>
                    
                            <br><br>
                    
                            <label for=""><b>Dirección: </b></label>
                            <label for=""> {{$proveedor->direccion}} </label>
                        
                        </div>
                    
                        <div class="col align-self-end">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
