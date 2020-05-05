@extends('adminlte::page')

@section('title', 'Editar post')

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
    @if ($post->photos->count())
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            @foreach($post->photos as $photo)
                                <div class="col-md-2">
                                    <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                                        @csrf @method('DELETE')
                                        <button class="btn-close btn btn-danger btn-xs">
                                            <i class="fas fa-times fa-fw"></i>
                                        </button>
                                        <img class="img-fluid" src="{{ url($photo->url) }}" alt="alt">
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.posts.update', $post) }}">
        <div class="row">
            @csrf
            @method('PUT')
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Título de la publicación</label>
                            <input type="text" name="title"
                                id="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Ingresa aquí el título de la publicación"
                                value="{{ old('title', $post->title) }}"
                            >
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Contenido de la publicación</label>
                            <textarea type="text" name="body"
                                id="body" class="form-control @error('body') is-invalid @enderror" rows="7"
                                placeholder="Ingresa el contenido completo de la publicación"
                            >{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Contenido embebido (iframe)</label>
                            <textarea type="text" name="iframe"
                                id="iframe" class="form-control @error('iframe') is-invalid @enderror" rows="2"
                                placeholder="Ingresa el código del contenido incrustado (audio o video)"
                            >{{ old('iframe', $post->iframe) }}</textarea>
                            @error('iframe')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="published_at">Fecha de publicación</label>
                            <input type="text" class="form-control"
                                name="published_at" id="published_at"
                                autocomplete="off"
                                value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"
                            >
                        </div>
                        <div class="form-group">
                            <label for="category">Categorías</label>
                            <select name="category" id="category" class="select2bs4 form-control @error('category') is-invalid @enderror">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <select class="select2bs4 @error('tags') is-invalid @enderror"
                                id="tags"
                                name="tags[]"
                                multiple="multiple"
                                data-placeholder="Seleccione una o más etiquetas"
                                style="width: 100%;"
                            >
                                @foreach ($tags as $tag)
                                    <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Extracto publicación</label>
                            <textarea type="text" name="excerpt"
                                id="excerpt" class="form-control @error('excerpt') is-invalid @enderror"
                                placeholder="Ingresa un extracto de la publicación"
                            >{{ old('excerpt', $post->excerpt) }}</textarea>
                            @error('excerpt')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="dropzone"></div>
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
    <script src="/adminlte/plugins/dropzone/dropzone.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    {{-- <script src="/adminlte/plugins/moment/moment.min.js"></script> --}}
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
    {{-- <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script> --}}
    <script src="{{ asset('/adminlte/plugins/gijgo/js/gijgo.js') }}"></script>
    <script>
        // $(function() {
        //     $('#published_at').daterangepicker({
        //         // singleDatePicker: true,
        //         autoUpdateInput: false,
        //         locale: {
        //             cancelLabel: 'Clear',
        //             daysOfWeek: [
        //                 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'
        //             ],
        //             monthNames: [
        //                 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
        //                 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        //             ]
        //         },
        //         showDropdowns: true,
        //         minYear: 1937,
        //         maxYear: parseInt(moment().add(10, 'years').format('YYYY'),10)
        //     });
        // });

        // gijgo - datepicker
        $('#published_at').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<i class="far fa-calendar-alt fa-fw"></i>'
            },
            showOtherMonths: true,
            selectOtherMonths: true
           // showOnFocus: true,
            // showRightIcon: false
        });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            tags: true
        });

        CKEDITOR.replace('body');
        CKEDITOR.config.height = 242;

        var myDropzone = new Dropzone('.dropzone', {
            url: '/admin/posts/{{ $post->url }}/photos',
            paramName: 'photo',
            acceptedFiles: 'image/*',
            maxFileSize: 0.1,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dictDefaultMessage: 'Arrastra las fotos para subirlas',
            dictInvalidFileType: 'Usted no puede cargar este tipo de archivo'
        });

        myDropzone.on('error', function (file, res) {
            var msg = res.errors.photo[0]
            $('.dz-error-message:last > span').text(msg)
        });

        Dropzone.autoDiscover = false;
    </script>
@endpush

@push('my_styles')
    <link rel="stylesheet" href="/adminlte/plugins/dropzone/dropzone.css">
    {{-- <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css"> --}}
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/gijgo/css/gijgo.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

