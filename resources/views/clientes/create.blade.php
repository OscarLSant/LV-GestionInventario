@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header -inline-flex">
        <h3>Formulario para registrar un cliente</h3>
        <a href="{{ route ('clientes.index') }}" class="btn btn-primary ml-auto">
        <i class="fa-solid fa-house-person-return"></i>
        </a>
        
    </div>
</div>

<div class="card-body">
    <form action="{{ route ('clientes.store') }}" method="POST" enctype="multipart/form-data" id="create">
        @include('clientes.partials.form')
    </form>
</div>

<div class="card-footer">
    <button class="btn btn-primary" form="create">
        <i class="fas fa-plus"></i>
            Crear
    </button>

</div>

@endsection