<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cliente / Editar cliente ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 style="text-align: center; font-size: 25px">Formulario para editar infomración del cliente: {{ $cliente->nombre}}</h1>
                    <a href="{{ route('clientes.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
                    
                    
                    <div>
                        <form action="{{ route ('clientes.update', $cliente->idCliente ) }}" method="POST" enctype="multipart/form-data" id="create">
                            @method('PUT')
                            @include('clientes.partials.form')
                        </form>
                    </div>       

                    <div align="center">
                        <br>
                        <button class="btn btn-success" form="create">Actualizar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
