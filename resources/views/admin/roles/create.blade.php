@extends('adminlte::page')

@section('title', "Crear rol")

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                ROLES:
                <small class="text-muted">Nuevo rol</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}"><i class="fas fa-map-signs fa-fw"></i> Listado</a></li>
                <li class="breadcrumb-item active">Nuevo rol</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Crear rol</h3>
                </div>
                <div class="card-body">
                    @include('partials.error-messages')
                    <form method="POST" action="{{ route('admin.roles.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">rol</label>
                            <input name="name" id="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="nombre-del-rol"
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Nombre</label>
                            <input name="title" id="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Nombre del rol"
                            >
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Permisos</label>
                                @include('admin.abilities.checkboxes', ['model' => $role])
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block">Crear rol</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
