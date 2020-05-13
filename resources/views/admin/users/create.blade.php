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
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Datos personales</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>¡Hey!</strong> revisa los campos donde hay errores
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input name="name" id="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nombre"
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Correo electrónico"
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Roles</label>
                                @include('admin.roles.checkboxes')
                            </div>

                            <div class="form-group col-md-6">
                                <label>Permisos</label>
                                @include('admin.abilities.checkboxes')
                            </div>
                        </div>

                        <div class="form-group">
                            <small class="text-muted">La contraseña será generada y enviada a nuevo usuario via email</small>
                        </div>

                        <button class="btn btn-primary btn-block">Crear usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
