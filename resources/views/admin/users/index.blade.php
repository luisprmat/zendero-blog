@extends('adminlte::page')

@section('title', 'Listado de Usuarios')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                USUARIOS:
                <small class="text-muted">Listado</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i> Inicio</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Todas las publicaciones</h3>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus fa-fw"></i> Crear usuario
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="users-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles->pluck('title')->implode(', ') }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', $user) }}"
                                    class="btn btn-secondary btn-xs"
                                ><i class="fas fa-eye fa-fw"></i></a>

                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="btn btn-info btn-xs"
                                ><i class="fas fa-pencil-alt fa-fw"></i></a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                    style="display: inline"
                                    >
                                    @csrf @method('DELETE')
                                    <button href="#" class="btn btn-danger btn-xs"
                                        onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')"
                                    ><i class="fas fa-times fa-fw"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
  </div>
@stop

@push('my_scripts')
    <script>
        $(function () {
            $('#users-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "language" : {
                    "url": "/dataTables.spanish.lang"
                },
                "columnDefs" : [
                    {"width" : "80px", "targets": 3}
                ]
            });
        });
    </script>
@endpush

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

{{-- @section('js')
    <script>

    </script>
@stop --}}
