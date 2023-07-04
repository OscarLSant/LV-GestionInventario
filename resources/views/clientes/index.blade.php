<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}

            

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                    {{-- {{ __("Vista de clientes") }} --}}


                    <a href="{{ route ('clientes.create') }}" class="btn btn-success" style="margin-bottom:  25px; margin-top: 17px"><i class="fa-regular fa-plus fa-shake" style="color: #ffffff;"></i></i>   Nuevo cliente</a>

                    <div align="right" style="display: inline;">
                        <div class="form-group col-4" style="display: inline">
                            <a class="navbar-brand">Listar</a>
                            <select class="custom-select" id="limit" name="limit">
                                @foreach([5,10,15,20] as $limit)
                                <option value="{{$limit}}" @if(isset($_GET['limit']))
                                    {{($_GET['limit']==$limit)?'selected': ''}}@endif>{{$limit}}</option>
                                @endforeach
                            </select>
                            <input style="width: 30%; display: inline" class="form-control mr-sm-2" type="search" id="search" placeholder="Escribe aquí para hacer una búsqueda" aria-label="Search"
                            value="{{ (isset($_GET['search']))?$_GET['search']:'' }}"> 
                        </div>
                    </div>

                    <div class="table-responsive">
                        
                        @include('components.flash_alerts')

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
                            @foreach($clientes as $cliente)
                            <tr>
                                <th scope="row">{{$cliente->idCliente}}</th>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->correo}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>
            
                                    <a href="{{route ('clientes.show', $cliente->idCliente)}}" class="btn btn-primary"><i class="fa-regular fa-eye" style="color: #ffffff;"></i></a>
            
                                    <a href="{{route ('clientes.edit', $cliente->idCliente)}}" class="btn btn-warning"> <i class="fa-solid fa-pencil" style="color: #ffffff;"></i></a>
            
                                    <button type="submit" class="btn btn-danger" form="delete_{{$cliente->idCliente}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                    <form action="{{route('clientes.destroy', $cliente->idCliente)}}"
                                          id="delete_{{$cliente->idCliente}}" method="post" enctype="multipart/form-data"
                                          hidden>
                                          @csrf
                                          @method('DELETE')
                                    </form>
            
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="card-footer">
                        @if($clientes->total() > 10)
                        {{$clientes->links()}}
                        @endif
                     </div>

                    

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

 <!-- VA EN EL INDEX AL FINAL -->
                    @section('scripts')
                    <script type="text/javascript">

                        $('#limit').on('change',function(){
                            window.location.href = '{{ route('clientes.index') }}?limit='+$(this).val()+'&search='+$('#search').val()
                        })

                        $('#search').on('keyup',function(e){
                            if(e.keyCode== 13){
                                window.location.href = '{{ route('clientes.index') }}?limit='+$('#limit').val()+'&search='+$(this).val()
                            }
                        })
                    </script>
                    @endsection