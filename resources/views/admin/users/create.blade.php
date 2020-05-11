@extends('adminlte::page')

@section('title', "Crear usuario")

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                USUARIOS:
                <small class="text-muted">Nuevo usuario</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}"><i class="fas fa-users fa-fw"></i> Listado</a></li>
                <li class="breadcrumb-item active">Nuevo usuario</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    Hola
@endsection
