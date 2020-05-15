@extends('adminlte::page')

@section('title', "Editar permiso")

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                ROLES:
                <small class="text-muted">Editar permiso</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.abilities.index') }}"><i class="fas fa-cat fa-fw"></i> Listado</a></li>
                <li class="breadcrumb-item active">Editar permiso</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Editar permiso</h3>
                </div>
                <div class="card-body">
                    @include('partials.error-messages')
                    <form method="POST" action="{{ route('admin.abilities.update', $ability) }}">
                        @method('PUT') @csrf

                        <div class="form-group">
                            <label for="name">identificador del permiso</label>
                            <input id="name" value="{{ $ability->name }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="title">Nombre</label>
                            <input name="title" id="title" value="{{ old('title', $ability->title) }}"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Nombre del rol"
                            >
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-primary btn-block">Actualizar permiso</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
