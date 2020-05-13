@foreach ($roles as $role)
    <div class="custom-control custom-checkbox">
        <input type="checkbox"
            name="roles[]"
            class="custom-control-input"
            id="role_{{ $role->id }}"
            value="{{ $role->id }}"
            {{ $user->roles->contains($role->id) ? 'checked' : '' }}
        >
        <label class="custom-control-label" for="role_{{ $role->id }}">
            {{ $role->title }} <br>
            <small class="text-muted">
                {{ $role->abilities->pluck('title')->implode(', ') }}
            </small>
        </label>
    </div>
@endforeach
