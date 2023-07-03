@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div>
        <h5>Categorias</h5>
        
        <a href="{{ route ('categorias.pdf') }}" class="btn btn-info">
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
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <th scope="row">{{$categoria->idCategoria}}</th>
                    <td>{{$categoria->nombre}}</td>
                    <td>

                        <a href="{{route ('categorias.show', $categoria->idCategoria)}}" class="btn btn-info">
                            <i class="fas fa-eye"></i> 
                            Ver
                        </a>

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
        window.location.href = '{{ route('categorias.index') }}?limit='+$(this).val()+'&search='+$('#search').val()
    })

    $('#search').on('keyup',function(e){
        if(e.keyCode== 13){
            window.location.href = '{{ route('categorias.index') }}?limit='+$('#limit').val()+'&search='+$(this).val()
        }
    })
</script>
@endsection