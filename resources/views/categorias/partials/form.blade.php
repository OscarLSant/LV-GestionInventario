@csrf

<div class="row">
    <div class="col align-self-start">
    </div>

    <div class="">

        <label for="">Nombre</label>
        <input class="form-control" type="text" placeholder="Nombre de la categoria" name="nombre" value="{{ (isset($categoria)) ? $categoria->nombre : old('nombre') }}" required>
        
    </div>

    <div class="col align-self-end">
    </div>
</div>