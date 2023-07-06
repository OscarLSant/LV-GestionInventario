<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                    {{-- {{ __("Vista de categorias") }} --}}
                    <div style="display: inline;">


                        <div class="container">
                            <div class="row">
                                <div class="col-2">

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-regular fa-plus fa-shake" style="color: #ffffff;"></i>Nueva
                                        categoria
                                    </button>

                                </div>

                            </div>
                        </div>




                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #000000;">
                                        <h5 class=" text-white" id="exampleModalLabel">Formulario para crear una
                                            categoria</h5>

                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route ('categorias.store') }}" method="POST"
                                            enctype="multipart/form-data" id="create">
                                            @include('categorias.partials.form')
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>

                                        <button class="btn btn-success" form="create">Crear</button>

                                    </div>
                                </div>
                            </div>
                        </div>






                        @include('components.flash_alerts')
                        <br>


                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-8">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nombre</th>
                                                    <th style="padding-right: 75px" style="text-align: center;">Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categorias as $categoria)
                                                <tr>
                                                    <th scope="row">{{$categoria->idCategoria}}</th>
                                                    <td>{{$categoria->nombre}}</td>
                                                    <td>

                                                        <button type="submit" class="btn btn-danger"
                                                            form="delete_{{$categoria->idCategoria}}"
                                                            onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i
                                                                class="fa-solid fa-trash"
                                                                style="color: #ffffff;"></i></button>
                                                        <form
                                                            action="{{route('categorias.destroy', $categoria->idCategoria)}}"
                                                            id="delete_{{$categoria->idCategoria}}" method="post"
                                                            enctype="multipart/form-data" hidden>
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="card-footer">
                                            @if($categorias->total() > 10)
                                            {{$categorias->links()}}
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
</x-app-layout>


<!-- VA EN EL INDEX AL FINAL -->
@section('scripts')
<script type="text/javascript">
$('#limit').on('change', function() {
    window.location.href = '{{ route('categorias.index') }}?limit=' + $(this).val() + '&search=' + $('#search').val()
})

$('#search').on('keyup', function(e) {
    if (e.keyCode == 13) {
        window.location.href = '{{ route('categorias.index') }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
    }
})
</script>
@endsection