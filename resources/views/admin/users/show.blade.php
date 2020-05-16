@extends('adminlte::page')

@section('title', "Perfil de {$user->name}")

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                USUARIOS:
                <small class="text-muted">Perfil de {{ $user->name }}</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}"><i class="fas fa-user fa-fw"></i> Listado</a></li>
                <li class="breadcrumb-item active">Ver perfil</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('img/default-user.png') }}"
                        alt="{{ $user->name }}"
                    >
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">{{ $user->roles->pluck('title')->implode(', ') }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Publicaciones</b> <a class="float-right">{{ $user->posts->count() }}</a>
                    </li>
                    @if ($user->roles->count())
                        <li class="list-group-item">
                            <b>Roles</b> <a class="float-right">{{ $user->roles->pluck('title')->implode(', ') }}</a>
                        </li>
                    @endif
                </ul>

                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Publicaciones</h3>
            </div>
            <ul class="list-group list-group-flush">
                @forelse ($user->posts as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', $post) }}" target="_blank">
                            <strong>{{ $post->title }}</strong>
                        </a>
                        <br>
                        <small class="text-muted"><i>Publicado el {{ $post->published_at->format('d/m/Y') }}</i></small>
                        <p class="card-text text-muted">{{ $post->excerpt }}</p>
                    </li>
                @empty
                    <li class="list-group-item">
                        <small class="text-muted">No tiene ninguna publicación</small>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Roles</h3>
            </div>
            <ul class="list-group list-group-flush">
                @forelse ($user->roles as $role)
                    <li class="list-group-item">
                        <strong>{{ $role->title }}</strong>
                        @if ($role->getAbilities()->count())
                            <br>
                            <small class="text-muted">
                                Permisos: <i>{{ $role->getAbilities()->pluck('title')->implode(', ') }}</i>
                            </small>
                        @endif
                    </li>
                @empty
                    <li class="list-group-item">
                        <small class="text-muted">No tiene ningún rol asignado</small>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Permisos adicionales</h3>
            </div>
            <ul class="list-group list-group-flush">
                @forelse ($user->abilities as $ability)
                    <li class="list-group-item">
                        <strong>{{ $ability->title }}</strong>
                    </li>
                @empty
                    <li class="list-group-item">
                        <small class="text-muted">No tienes permisos adicionales</small>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
