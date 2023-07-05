@csrf

<div class="row">
    <div class="col align-self-start">
    </div>

    
        <label for="">Fecha</label>
        <input type="date" class="form-control" name="fechaFactura"
            value="{{(isset($venta))?$venta->fechaFactura:old('fechaFactura')}}" required>


        <label for="">Cliente </label>

        <select name="idCliente" class="form-control">
            <option value="0">Selecciona una opción</option>
            @foreach ($clientes as $cliente)
            <option value="{{$cliente->idCliente}}" @isset($venta)
                {{ ($venta->idCliente ==$cliente->idCliente)?'selected':''}} @endisset>
                {{ $cliente->nombre }}
            </option>
            @endforeach
        </select>

    </div>


    <div class="col align-self-end">
    </div>
</div>