<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Venta-Stock / Nueva Venta-stock') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 style="text-align: center; font-size: 25px">Formulario para crear un nueva Venta-Stock</h1>
                    <a href="{{ route('venta_stocks.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
                    
                    
                    <br><br>
                    <div>
                        <form action="{{ route ('venta_stocks.store') }}" method="POST" enctype="multipart/form-data" id="create">
                            @include('venta_stocks.partials.form')
                        </form>
                    </div>      

                    <div align="center">
                        <br>
                        <button class="btn btn-success" form="create">Crear</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>