@csrf

<div class="row">
    <div class="col align-self-start">
    </div>

    <div >
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre"
            value="{{(isset($producto))?$producto->nombre:old('nombre')}}" required>




        <label for="">Detalles</label>
        <input type="text" class="form-control" name="detalles"
            value="{{(isset($producto))?$producto->detalles:old('detalles')}}" required>



        <label for="">Categoria </label>

        <select name="idCategoria" class="form-control">
            <option value="0">Selecciona una opción</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->idCategoria}}" @isset($producto)
                {{ ($producto->idCategoria ==$categoria->idCategoria)?'selected':''}} @endisset>
                {{ $categoria->nombre }}
            </option>
            @endforeach
        </select>

    </div>


    <div class="col align-self-end">
    </div>
</div>