@csrf

<div class="row">
    <div class="col align-self-start">
    </div>

    <label for="">Venta</label>

    <select name="idVenta" class="form-control">
        <option value="0">Selecciona una venta</option>
        @foreach ($ventas as $venta)
        <option value="{{$venta->idVenta}}" @isset($stock)
            {{ ($stock->idVenta ==$venta->idVenta)?'selected':''}} @endisset>
            {{ $venta->idVenta }}
        </option>
        @endforeach
    </select>

    <label for="">Stock</label>
        <select name="idStock" class="form-control">
            <option value="0">Selecciona un stock</option>
            @foreach ($stocks as $stock)
            <option value="{{$stock->idStock}}" @isset($stock)
                {{ ($stock->idStock ==$stock->idStock)?'selected':''}} @endisset>
                {{ $stock->idStock }}
            </option>
            @endforeach
        </select>

    <label for="">Cantidad</label>
    <input type="number"  class="form-control" name="cantidad"
            value="{{(isset($venta_stock))?$venta_stock->cantidad:old('cantidad')}}" required>


        <label for="">Descuento</label>
    <input type="number" step="10" min="10" max="80" class="form-control" name="descuento"
        value="{{(isset($venta_stock))?$venta_stock->descuento:old('descuento')}}" required>

      


</div>


<div class="col align-self-end">
</div>
</div>