<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Venta-Stock') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                    {{-- {{ __("Vista de Venta-venta_Stocks") }} --}}


                    <div class="column">
                        <a href="{{ route ('venta_stocks.create') }}" class="btn btn-success"
                            style="margin-bottom:  25px; margin-top: 17px"><i class="fa-regular fa-plus fa-shake"
                                style="color: #ffffff;"></i></i> Nuevo stock</a>

                        <a href="{{route ('venta_stocks.pdf') }}" class="btn btn-primary"
                        style="margin-bottom:  25px; margin-top: 17px">Generar <i
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
                        <table class="table table-hover table-info table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#ID Venta-Stock</th>
                                    <th scope="col">Venta</th> 
                                    <th scope="col">Stock</th> 
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Descuento</th>
                                    
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($venta_stocks as $venta_stock )
                                <tr>
                                    <th scope="row">{{$venta_stock->idVentaStock}}</th>
                                    <td>{{$venta_stock->ventas->idVenta}}</td>
                                    <td>{{$venta_stock->stocks->idStock}}</td>
                                    <td>{{$venta_stock->cantidad}}</td>
                                    <td>{{$venta_stock->descuento}}</td>
                                    <td>

                                        <a href="{{route ('venta_stocks.show', $venta_stock->idVentaStock)}}"
                                            class="btn btn-primary"><i class="fa-regular fa-eye"
                                                style="color: #ffffff;"></i></a>

                                        <a href="{{route ('venta_stocks.edit', $venta_stock->idVentaStock)}}"
                                            class="btn btn-warning"> <i class="fa-solid fa-pencil"
                                                style="color: #ffffff;"></i></a>

                                        <button type="submit" class="btn btn-danger"
                                            form="delete_{{$venta_stock->idVentaStock}}"
                                            onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i
                                                class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                        <form action="{{route('venta_stocks.destroy', $venta_stock->idVentaStock)}}"
                                            id="delete_{{$venta_stock->idVentaStock}}" method="post"
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

                        @if($venta_stocks->total() > 5)
                        {{$venta_stocks->links()}}
                        @endif

                    </div>



                    @section('scripts')
                    <script type="text/javascript">
                    $('#limit').on('change', function() {
                        window.location.href = '{{ route('venta_stocks.index') }}?limit=' + $(this).val() + '&search=' + $('#search').val()
                    })

                    $('#search').on('keyup', function(e) {
                        if (e.keyCode == 13) {
                            window.location.href = '{{ route('venta_stocks.index') }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
                        }
                    })
                    </script>
                    @endsection



                </div>
            </div>
        </div>
    </div>
</x-app-layout>