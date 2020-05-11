@extends('adminlte::page')

@section('title', "Editar usuario: {$user->name}")

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                USUARIOS:
                <small class="text-muted">Editar perfil de {{ $user->name }}</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}"><i class="fas fa-user fa-fw"></i> Listado</a></li>
                <li class="breadcrumb-item active">Editar usuario</li>
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
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input name="name" id="name" value="{{ old('name', $user->name) }}"
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
                            <input name="email" id="email" value="{{ old('email', $user->email) }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Nombre"
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block">Actualizar usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
