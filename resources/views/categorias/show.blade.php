@extends('layouts.app')
@section('content')

@csrf

<div class="card mt-3">
    <div class="card-header -inline-flex">
        <h3>Formulario para ver la categoria</h3>
        <a href="{{ route ('categorias.index') }}" class="btn btn-primary ml-auto">
        <i class="fa-solid fa-house-person-return"></i>
        Regresar        
        </a>
        
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" readonly value="{{ (isset($categoria))?$categoria->nombre:old('nombre') }}" required>
        </div>
    </div>

</div>

@endsection