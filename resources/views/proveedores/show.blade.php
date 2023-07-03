@extends('layouts.app')
@section('content')

@csrf

<div class="card mt-3">
    <div class="card-header -inline-flex">
        <h3>Formulario para ver el cliente</h3>
        <a href="{{ route ('proveedores.index') }}" class="btn btn-primary ml-auto">
        <i class="fa-solid fa-house-person-return"></i>
        Regresar        
        </a>
        
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" readonly value="{{ (isset($proveedor))?$proveedor->nombre:old('nombre') }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" class="form-control" name="telefono" readonly value="{{ (isset($proveedor))?$proveedor->telefono:old('telefono') }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Correo</label>
            <input type="text" class="form-control" name="correo" readonly value="{{ (isset($proveedor))?$proveedor->correo:old('correo') }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Dirección</label>
            <input type="text" class="form-control" name="direccion" readonly value="{{ (isset($proveedor))?$proveedor->direccion:old('correo') }}" required>
        </div>
    </div>


</div>

@endsection