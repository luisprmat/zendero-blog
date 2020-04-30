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
                            <label for="published_at">Fecha de publicación</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt fa-fw"></i></span>
                                </div>
                                <input type="text" class="form-control" name="published_at" id="published_at">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category">Categorías</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <select class="select2bs4"
                                multiple="multiple"
                                data-placeholder="Seleccione una o más etiquetas"
                                style="width: 100%;"
                            >
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Extracto publicación</label>
                            <textarea type="text" name="excerpt"
                                id="excerpt" class="form-control"
                                placeholder="Ingresa un extracto de la publicación"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@push('my_scripts')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <script>
        $(function() {
            $('#published_at').daterangepicker({
                singleDatePicker: true,
                locale: {
                    daysOfWeek: [
                        'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'
                    ],
                    monthNames: [
                        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ]
                },
                showDropdowns: true,
                minYear: 1937,
                maxYear: parseInt(moment().add(10, 'years').format('YYYY'),10)
            });
        });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        CKEDITOR.replace('body');
    </script>
@endpush

@push('my_styles')
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
