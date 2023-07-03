@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ (isset($cliente)) ? $cliente->nombre : old('nombre') }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Teléfono</label>
            <input type="text" class="form-control" name="telefono" value="{{ (isset($cliente)) ? $cliente->telefono : old('telefono') }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Correo</label>
            <input type="text" class="form-control" name="correo" value="{{ (isset($cliente)) ? $cliente->correo : old('correo') }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{ (isset($cliente)) ? $cliente->direccion : old('direccion') }}" required>
        </div>
    </div>
</div>
