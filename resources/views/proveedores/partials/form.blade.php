@csrf

<div class="row">
    <div class="col align-self-start">
    </div>

    <div class="col align-self-center">

        <label for="">Nombre</label>
        <input class="form-control" type="text" placeholder="Nombre del proveedor" name="nombre" value="{{ (isset($proveedor)) ? $proveedor->nombre : old('nombre') }}" required>
        
        <br>

        <label for="">Teléfono</label>
        <input class="form-control" type="text" placeholder="Número telefónico del proveedor" name="telefono" value="{{ (isset($proveedor)) ? $proveedor->telefono : old('telefono') }}" required>

        <br>

        <label for="">Correo electrónico</label>
        <input class="form-control" type="email" placeholder="Correo electrónico del proveedor" name="correo" value="{{ (isset($proveedor)) ? $proveedor->correo : old('correo') }}" required>

        <br>

        <label for="">Dirección</label>
        <input class="form-control" type="text" placeholder="Dirección del proveedor" name="direccion" value="{{ (isset($proveedor)) ? $proveedor->direccion : old('direccion') }}" required>
    
    </div>

    <div class="col align-self-end">
    </div>
</div>