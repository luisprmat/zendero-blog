@foreach ($abilities as $ability)
    <div class="custom-control custom-checkbox">
        <input type="checkbox"
            name="abilities[]"
            class="custom-control-input"
            id="ability_{{ $ability->id }}"
            value="{{ $ability->id }}"
            {{ $user->abilities->contains($ability->id) ? 'checked' : '' }}
        >
        <label class="custom-control-label" for="ability_{{ $ability->id }}">
            {{ $ability->title }}
        </label>
    </div>
@endforeach
