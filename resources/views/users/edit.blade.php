<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios / Asignar roles ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 style="text-align: center; font-size: 25px">Asignación de roles para el usuario: {{ $usuario->name}}</h1>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
                    
                    
                    <div>
                        <form action="{{ route ('usuarios.update', $usuario->id ) }}" method="POST" enctype="multipart/form-data" id="create">
                            @method('PUT')
                            @include('users.partials.form')
                        </form>
                    </div>       

                    <div align="center">
                        <br>
                        <button class="btn btn-success" form="create">Asignar rol</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>