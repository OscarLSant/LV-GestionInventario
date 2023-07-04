<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}

        </h2>
    </x-slot>

    @if(session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger" role="alert">
    {{ session('danger') }}
    </div>
@endif
    
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                    {{-- {{ __("Vista de clientes") }} --}}


                    <div class="column">
                        <a href="{{ route ('productos.create') }}" class="btn btn-success"
                            style="margin-bottom:  25px; margin-top: 17px"><i class="fa-regular fa-plus fa-shake"
                                style="color: #ffffff;"></i></i> Nuevo producto</a>

                        <a href="{{route ('productos.pdf') }}" class="btn btn-primary">Generar <i
                                class="fas fa-sharp fa-light fa-file-pdf"></i>
                        </a>
                    </div>

                    <div align="right" style="display: inline;">
                        <div class="form-group col-4" style="display: inline">
                            <a class="navbar-brand">Listar</a>
                            <select class="custom-select" id="limit" name="limit">
                                @foreach([5,10,15,20] as $limit)
                                <option value="{{$limit}}" @if(isset($_GET['limit']))
                                    {{($_GET['limit']==$limit)?'selected': ''}}@endif>{{$limit}}</option>
                                @endforeach
                            </select>
                            <input style="width: 30%; display: inline" class="form-control mr-sm-2" type="search"
                                id="search" placeholder="Escribe aquí para hacer una búsqueda" aria-label="Search"
                                value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">
                        </div>
                    </div><br><br>

                    <div class="table-responsive">

                        <table class="table table-hover table-info table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Detalles</th>
                                    <th scope="col">Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto )
                                <tr>
                                    <th scope="row">{{$producto->idProducto}}</th>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->detalles}}</td>
                                    <td>{{$producto->categoria}}</td>
                                    <td>

                                        <a href="{{route ('productos.show', $producto->idProducto)}}"
                                            class="btn btn-primary"><i class="fa-regular fa-eye"
                                                style="color: #ffffff;"></i></a>

                                        <a href="{{route ('productos.edit', $producto->idProducto)}}"
                                            class="btn btn-warning"> <i class="fa-solid fa-pencil"
                                                style="color: #ffffff;"></i></a>

                                        <button type="submit" class="btn btn-danger"
                                            form="delete_{{$producto->idproducto}}"
                                            onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i
                                                class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                        <form action="{{route('productos.destroy', $producto->idProducto)}}"
                                            id="delete_{{$producto->idproducto}}" method="post"
                                            enctype="multipart/form-data" hidden>
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                    <div class="card-footer">

                        @if($productos->total() > 5)
                        {{$productos->links()}}
                        @endif

                    </div>



                    @section('scripts')
                    <script type="text/javascript">
                    $('#limit').on('change', function() {
                        window.location.href = '{{ route('productos.index') }}?limit=' + $(this).val() + '&search=' + $('#search').val()
                    })

                    $('#search').on('keyup', function(e) {
                        if (e.keyCode == 13) {
                            window.location.href = '{{ route('productos.index') }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
                        }
                    })
                    </script>
                    @endsection



                </div>
            </div>
        </div>
    </div>
</x-app-layout>