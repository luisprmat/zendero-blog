@csrf

<div class="form-group">
    <label for="name">identificador del rol</label>
    @if (Silber\Bouncer\Database\Role::where('name', $role->name)->exists() )
        <input id="name" value="{{ $role->name }}"
            class="form-control @error('name') is-invalid @enderror"
            disabled
        >
    @else
        <input id="name" name="name" value="{{ old('name', $role->name) }}"
            class="form-control @error('name') is-invalid @enderror"
            placeholder="identificador-del-rol"
        >
    @endif

    @error('name')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="title">Nombre</label>
    <input name="title" id="title" value="{{ old('title', $role->title) }}"
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
