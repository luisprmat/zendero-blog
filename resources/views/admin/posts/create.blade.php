@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                POSTS
                <small>Crear publicación</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i> Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}"><i class="fas fa-list fa-fw"></i> Posts</a></li>
                <li class="breadcrumb-item active">Crear</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <form>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Título de la publicación</label>
                            <input type="text" name="title"
                                id="title" class="form-control"
                                placeholder="Ingresa aquí el título de la publicación"
                            >
                        </div>
                        <div class="form-group">
                            <label for="body">Contenido de la publicación</label>
                            <textarea type="text" name="body"
                                id="body" class="form-control" rows="7"
                                placeholder="Ingresa el contenido completo de la publicación"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="excerpt">Extracto publicación</label>
                            <textarea type="text" name="excerpt"
                                id="excerpt" class="form-control"
                                placeholder="Ingresa un extracto de la publicación"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
