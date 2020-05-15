@extends('adminlte::page')

@section('title', "Editar rol")

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                ROLES:
                <small class="text-muted">Editar rol</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}"><i class="fas fa-map-signs fa-fw"></i> Listado</a></li>
                <li class="breadcrumb-item active">Editar rol</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Editar rol</h3>
                </div>
                <div class="card-body">
                    @include('partials.error-messages')
                    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                        @method('PUT')

                        @include('admin.roles.form')

                        <button class="btn btn-primary btn-block">Actualizar rol</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
