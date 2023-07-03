@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div>
        <h5>proveedores</h5>
        <a href="{{ route ('proveedores.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Agregar
        </a>

        <a href="{{ route ('proveedores.pdf') }}" class="btn btn-info">
            <i class="fas fa-file-pdf"></i>
            Exportar
        </a>
    </div>
</div>

<div class="card-body">

<div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <a class="navbar-brand">Listar</a>
                        <select class="custom-select" id="limit" name="limit">
                            @foreach([5,10,15,20] as $limit)
                            <option value="{{$limit}}" @if(isset($_GET['limit']))
                                {{($_GET['limit']==$limit)?'selected': ''}}@endif>{{$limit}}</option>
                            @endforeach
                        </select>      
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <a class="navbar-brand">Buscar</a>
                        <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search"
                        value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">  
                    </div>
                </div>
            </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Dirección</th>
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

                        <a href="{{route ('proveedores.show', $proveedor->idProveedor)}}" class="btn btn-info">
                            <i class="fas fa-eye"></i> 
                            Ver
                        </a>

                        <a href="{{route ('proveedores.edit', $proveedor->idProveedor)}}" class="btn btn-warning"> 
                            <i class="fas fa-pen"></i> 
                            Editar
                        </a>

                        <button type="submit" class="btn btn-danger btn-sm"
                                form="delete_{{$proveedor->idProveedor}}"
                                onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                <i class="fas fa-trash"></i>
                                Eliminara   
                            </button>
                        <form action="{{route('proveedores.destroy', $proveedor->idProveedor)}}"
                              id="delete_{{$proveedor->idProveedor}}" method="post" enctype="multipart/form-data"
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

<div class="card-footer">
</div>

@section('scripts')

<script type="text/javascript">

    $('#limit').on('change',function(){
        window.location.href = '{{ route('proveedores.index') }}?limit='+$(this).val()+'&search='+$('#search').val()
    })

    $('#search').on('keyup',function(e){
        if(e.keyCode== 13){
            window.location.href = '{{ route('proveedores.index') }}?limit='+$('#limit').val()+'&search='+$(this).val()
        }
    })
</script>
@endsection