<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <a href="{{ route ('usuarios.create') }}" class="btn btn-success"
                        style="margin-bottom:  25px; margin-top: 17px"><i class="fa-regular fa-plus fa-shake"
                            style="color: #ffffff;"></i></i> Nuevo Usuario</a>


                    <div align="right" style="display: inline;">
                        <div class="form-group col-4" style="display: inline">
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

                    <div class="table-responsive">

                        @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif

                        @if(session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                        @endif
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th>Rol actual</th>
                                    <th style="padding-right: 75px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <th scope="row">{{$usuario->id}}</th>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>{{ $usuario->role }}</td>
                                    <td>

                                        <a href="{{route ('usuarios.edit', $usuario->id)}}"
                                            class="btn btn-warning"> <i class="fa-solid fa-pencil"
                                                style="color: #ffffff;"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="card-footer">
                            @if($usuarios->total() > 10)
                            {{$usuarios->links()}}
                            @endif
                        </div>

                        @section('scripts')
                    <script type="text/javascript">
                    $('#limit').on('change', function() {
                        window.location.href = '{{ route('usuarios.index') }}?limit=' + $(this).val() + '&search=' + $('#search').val()
                    })

                    $('#search').on('keyup', function(e) {
                        if (e.keyCode == 13) {
                            window.location.href = '{{ route('usuarios.index') }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
                        }
                    })
                    </script>
                    @endsection

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
