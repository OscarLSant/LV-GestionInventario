<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes / Detalles de cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 style="text-align: center; font-size: 25px">Información general del cliente: {{ $cliente->nombre}}</h1>
                    <a href="{{ route('clientes.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
                    
                    <div class="row">
                        <div class="col align-self-start">
                        </div>
                    
                        <div class="col align-self-center">
                    
                            <label for=""><b>Nomnbre: </b></label>
                            <label for=""> {{$cliente->nombre}} </label>
                            
                            <br><br>
                    
                            <label for=""><b>Teléfono: </b></label>
                            <label for=""> {{$cliente->telefono}} </label>

                            <br><br>
                    
                            <label for=""><b>Correo electrónico: </b></label>
                            <label for=""> {{$cliente->correo}} </label>
                    
                            <br><br>
                    
                            <label for=""><b>Dirección: </b></label>
                            <label for=""> {{$cliente->direccion}} </label>
                        
                        </div>
                    
                        <div class="col align-self-end">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
