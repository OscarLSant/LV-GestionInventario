<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorías') }}

            

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                    {{-- {{ __("Vista de categorias") }} --}}

                    <a href="{{ route ('categorias.create') }}" class="btn btn-success" style="margin-bottom:  25px;"><i class="fa-regular fa-plus fa-shake" style="color: #ffffff;"></i></i>   Nueva categoria</a>
                    <div align="right">
                        <div class="form-group col-4">
                            <a class="navbar-brand">Listar</a>
                            <select class="custom-select" id="limit" name="limit">
                                @foreach([5,10,15,20] as $limit)
                                <option value="{{$limit}}" @if(isset($_GET['limit']))
                                    {{($_GET['limit']==$limit)?'selected': ''}}@endif>{{$limit}}</option>
                                @endforeach
                            </select>
                            <input class="form-control mr-sm-2" type="search" id="search" placeholder="Escribe aquí para hacer una búsqueda" aria-label="Search"
                            value="{{ (isset($_GET['search']))?$_GET['search']:'' }}"> 
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th style="padding-right: 75px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $categoria)
                            <tr>
                                <th scope="row">{{$categoria->idCategoria}}</th>
                                <td>{{$categoria->nombre}}</td>
                                <td>
            
                                    <button type="submit" class="btn btn-danger" form="delete_{{$categoria->idCategoria}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                    <form action="{{route('categorias.destroy', $categoria->idCategoria)}}"
                                          id="delete_{{$categoria->idCategoria}}" method="post" enctype="multipart/form-data"
                                          hidden>
                                          @csrf
                                          @method('DELETE')
                                    </form>
            
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>