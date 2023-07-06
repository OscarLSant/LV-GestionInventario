@csrf

<div class="row">
    <div class="col align-self-start">
    </div>

    <div class="col align-self-center">

        {{-- <label for=""><b>Rol actual: </b></label>
        <label for="">{{ $roles->name }}</label> --}}
        <br>

        <b>Listado de roles:</b> <br>
        @foreach ($roles as $role)
        
        <br>

        <input type="radio" id="opcion1" name="role" value="{{ $role->id }}">
        <label for="opcion1">{{ $role->name }}</label>

        @endforeach

        
        {{-- {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario], 'method' => 'put']) !!}

        @foreach ($roles as $role)

        <div>
            <label for="">
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                {{ $role->name }}
            </label>
        </div>
            
        @endforeach

        {!! Form::close() !!} --}}
        
    </div>

    <div class="col align-self-end">
    </div>
</div>