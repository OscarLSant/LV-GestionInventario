@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ (isset($proveedor)) ? $proveedor->nombre : old('nombre') }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Teléfono</label>
            <input type="text" class="form-control" name="telefono" value="{{ (isset($proveedor)) ? $proveedor->telefono : old('telefono') }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Correo</label>
            <input type="text" class="form-control" name="correo" value="{{ (isset($proveedor)) ? $proveedor->correo : old('correo') }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{ (isset($proveedor)) ? $proveedor->direccion : old('direccion') }}" required>
        </div>
    </div>
</div>
