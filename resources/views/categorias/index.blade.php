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
                                    <a href="{{ route ('categorias.create') }}" class="btn btn-success "
                                        style="margin-bottom:  25px; margin-top: 17px text-align: left;><i class="
                                        fa-regular fa-plus fa-shake" style="color: #ffffff;"></i></i> Nueva
                                        categoria</a>
                                </div>
                                <div class="col-10" style="text-align: right;">
                                <a class="navbar-brand">Listar</a>
                            <select class="custom-select" id="limit" name="limit">
                                @foreach([5,10,15,20] as $limit)
                                <option value="{{$limit}}" @if(isset($_GET['limit']))
                                    {{($_GET['limit']==$limit)?'selected': ''}}@endif>{{$limit}}</option>
                                @endforeach
                            </select>
                            <input style="width: 30%; display: inline" class="form-control mr-sm-2" type="search"
                                id="search" placeholder="Escribe aquí para hacer una búsqueda" aria-label="Search"
                                value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">

                                </div>
                            </div>
                        </div>








                        @include('components.flash_alerts')
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th style="padding-right: 75px">Acciones</th>
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
                                                    class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                            <form action="{{route('categorias.destroy', $categoria->idCategoria)}}"
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