@csrf

<div class="row">
    <div class="col align-self-start">
    </div>

    <div class="col align-self-center">

        <label for="">Nombre</label>
        <input class="form-control" type="text" placeholder="Nombre del cliente" name="nombre" value="{{ (isset($cliente)) ? $cliente->nombre : old('nombre') }}" required>
        
        <br>

        <label for="">Teléfono</label>
        <input class="form-control" type="text" placeholder="Número telefónico del cliente" name="telefono" value="{{ (isset($cliente)) ? $cliente->telefono : old('telefono') }}" required>

        <br>

        <label for="">Correo electrónico</label>
        <input class="form-control" type="email" placeholder="Correo electrónico del cliente" name="correo" value="{{ (isset($cliente)) ? $cliente->correo : old('correo') }}" required>

        <br>

        <label for="">Dirección</label>
        <input class="form-control" type="text" placeholder="Dirección del cliente" name="direccion" value="{{ (isset($cliente)) ? $cliente->direccion : old('direccion') }}" required>
    
    </div>

    <div class="col align-self-end">
    </div>
</div>