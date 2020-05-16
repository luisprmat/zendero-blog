@extends('adminlte::page')

@section('title', 'Listado de Permisos')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                PERMISOS:
                <small class="text-muted">Listado</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i> Inicio</a></li>
                <li class="breadcrumb-item active">Permisos</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Todos los permisos</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="abilities-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>rol</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abilities as $ability)
                        <tr>
                            <td>{{ $ability->id }}</td>
                            <td>{{ $ability->name }}</td>
                            <td>{{ $ability->title }}</td>
                            <td>
                                @can('update', $ability)
                                    <a href="{{ route('admin.abilities.edit', $ability) }}"
                                        class="btn btn-info btn-xs"
                                    ><i class="fas fa-pencil-alt fa-fw"></i></a>
                                @endcan
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
            $('#abilities-table').DataTable({
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
