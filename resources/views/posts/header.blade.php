<header class="container-flex space-between">
    <div class="date">
        <span class="c-gris">
            {{ $post->published_at->format('M d') }} / {{ $post->owner->name }}
        </span>
    </div>
    <div class="post-category">
        <span class="category">
            <a href="{{ route('categories.show', $post->category) }}">
                {{ optional($post->category)->name }}
            </a>
        </span>
    </div>
</header>
