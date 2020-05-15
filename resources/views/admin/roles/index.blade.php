@extends('adminlte::page')

@section('title', 'Listado de Roles')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                ROLES:
                <small class="text-muted">Listado</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i> Inicio</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Todos los roles</h3>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus fa-fw"></i> Crear rol
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="roles-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>rol</th>
                        <th>Nombre</th>
                        <th>Permisos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->title }}</td>
                            <td>{{ $role->abilities->pluck('title')->implode(', ') }}</td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role) }}"
                                    class="btn btn-info btn-xs"
                                ><i class="fas fa-pencil-alt fa-fw"></i></a>
                                @if ($role->name !== 'admin')
                                    <form method="POST" action="{{ route('admin.roles.destroy', $role) }}"
                                        style="display: inline"
                                        >
                                        @csrf @method('DELETE')
                                        <button href="#" class="btn btn-danger btn-xs"
                                            onclick="return confirm('¿Estás seguro de querer eliminar este rol?')"
                                        ><i class="fas fa-times fa-fw"></i>
                                        </button>
                                    </form>
                                @endif
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
            $('#roles-table').DataTable({
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
