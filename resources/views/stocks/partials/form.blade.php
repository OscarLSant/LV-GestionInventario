@csrf

<div class="row">
    <div class="col align-self-start">
    </div>
    <div>

        <label for="">Producto</label>

        <select name="idProducto" class="form-control">
            <option value="0">Selecciona una producto</option>
            @foreach ($productos as $producto)
            <option value="{{$producto->idProducto}}" @isset($stock)
                {{ ($stock->idProducto ==$producto->idProducto)?'selected':''}} @endisset>
                {{ $producto->nombre }}
            </option>
            @endforeach
        </select>

        <label for="">Proveedor</label>

        <select name="idProveedor" class="form-control">
            <option value="0">Selecciona una opción</option>
            @foreach ($proveedores as $proveedor)
            <option value="{{$proveedor->idProveedor}}" @isset($stock)
                {{ ($stock->idProveedor ==$proveedor->idProveedor)?'selected':''}} @endisset>
                {{ $proveedor->nombre }}
            </option>
            @endforeach
        </select>

        <label for="">Precio de compra</label>
        <input type="number" step="0.01" min="1" max="1000" class="form-control" name="precioCompra"
            value="{{(isset($stock))?$stock->precioCompra:old('precioCompra')}}" required>


        <label for="">Precio de venta</label>
        <input type="number" step="0.01" min="1" max="1000" class="form-control" name="precioVenta"
            value="{{(isset($stock))?$stock->precioVenta:old('precioVenta')}}" required>

        <label for="">Cantidad</label>
        <input type="number" class="form-control" name="cantidad"
            value="{{(isset($stock))?$stock->cantidad:old('cantidad')}}" required>

        <label for="">Notas</label>
        <input type="text" class="form-control" name="notas" value="{{(isset($stock))?$stock->notas:old('notas')}}"
            required>




    </div>


    <div class="col align-self-end">
    </div>
</div>