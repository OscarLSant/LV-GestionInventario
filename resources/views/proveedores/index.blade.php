<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proveedores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                    {{-- {{ __("Vista de Proveedores") }} --}}

                    <div style="display: inline;">

                        <div class="container">
                            <div class="row">
                                <div class="col-2">

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalC">
                                        <i class="fa-regular fa-plus fa-shake" style="color: #ffffff;"></i>Nuevo
                                        proveedor
                                    </button>

                                </div>
                                <div class="col-2">

                                    <a href="{{ route ('proveedores.pdf') }}" class="btn btn-secondary"
                                        style="margin-bottom:  25px;">
                                        <i class="fas fa-file-pdf" style="color: #ffffff;"></i>
                                        </i> Exportar PDF</a>
                                </div>
                                <div class="col-8" style="text-align: right;">

                                    <a class="navbar-brand">Listar</a>
                                    <select class="custom-select" id="limit" name="limit">
                                        @foreach([5,10,15,20] as $limit)
                                        <option value="{{$limit}}" @if(isset($_GET['limit']))
                                            {{($_GET['limit']==$limit)?'selected': ''}}@endif>{{$limit}}</option>
                                        @endforeach
                                    </select>
                                    <input style="width: 30%; display: inline" class="form-control mr-sm-2"
                                        type="search" id="search" placeholder="Buscar" aria-label="Search"
                                        value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">
                                </div>
                            </div>
                        </div>
                        <br>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalC" tabindex="-1" aria-labelledby="exampleModalCLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1B1B1B;">
                                        <h5 class=" text-white" id="exampleModalCLabel">Agregar proveedor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route ('proveedores.store') }}" method="POST"
                                            enctype="multipart/form-data" id="create">
                                            @include('proveedores.partials.form')
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        

                                        <button class="btn btn-success" form="create">Agregar</button>

                                    </div>
                                </div>
                            </div>
                        </div>






                        @include('components.flash_alerts')
                        <br>


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Dirección</th>
                                        <th style="padding-right: 75px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proveedores as $proveedor)
                                    <tr>
                                        <th scope="row">{{$proveedor->idProveedor}}</th>
                                        <td>{{$proveedor->nombre}}</td>
                                        <td>{{$proveedor->telefono}}</td>
                                        <td>{{$proveedor->correo}}</td>
                                        <td>{{$proveedor->direccion}}</td>
                                        <td>

                                            <a href="{{route ('proveedores.show', $proveedor->idProveedor)}}"
                                                class="btn btn-primary"><i class="fa-regular fa-eye"
                                                    style="color: #ffffff;"></i></a>

                                            <!-- <a href="{{route ('proveedores.edit', $proveedor->idProveedor)}}"
                                                class="btn btn-warning"> <i class="fa-solid fa-pencil"
                                                    style="color: #ffffff;"></i></a> -->

                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalE" form="put_{{ $proveedor->idProveedor}}">
                                                <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                                            </button>

                                            <button type="submit" class="btn btn-danger"
                                                form="delete_{{$proveedor->idProveedor}}"
                                                onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i
                                                    class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                            <form action="{{route('proveedores.destroy', $proveedor->idProveedor)}}"
                                                id="delete_{{$proveedor->idProveedor}}" method="post"
                                                enctype="multipart/form-data" hidden>
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalE" tabindex="-1"
                                aria-labelledby="exampleModalELabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1B1B1B;">
                                            <h5 class=" text-white" id="exampleModalELabel">Editar proveedor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route ('proveedores.update', $proveedor->idProveedor) }}"
                                                method="POST" enctype="multipart/form-data" id="edit">
                                                @method('PUT')
                                                @include('proveedores.partials.form')
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                           

                                            <button class="btn btn-success" form="edit">Actualizar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
</x-app-layout>


<div class="card-footer">
</div>

@section('scripts')

<script type="text/javascript">
$('#limit').on('change', function() {
    window.location.href = '{{ route('proveedores.index') }}?limit=' + $(this).val() + '&search=' + $('#search').val()
})

$('#search').on('keyup', function(e) {
    if (e.keyCode == 13) {
        window.location.href = '{{ route('proveedores.index') }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
    }
})
</script>
@endsection