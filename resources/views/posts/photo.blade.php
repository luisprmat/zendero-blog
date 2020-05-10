<figure>
    <img src="{{ asset('storage/' .$post->photos->first()->url) }}"
        alt="Foto: {{ $post->title }}"
        class="img-responsive"
    >
</figure>
