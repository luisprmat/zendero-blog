@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
<section class="posts container">
    <article class="post">
        @if ($post->photos->count() === 1)
            <figure><img src="{{ url("storage/{$post->photos->first()->url}") }}" alt="image" class="img-responsive"></figure>
        @elseif($post->photos->count() > 1)
            @include('posts.carousel')
        @elseif($post->iframe)
            <div class="video">
                {!! $post->iframe !!}
            </div>
        @endif
        <div class="content-post">
            <header class="container-flex space-between">
                <div class="date">
                    <span class="c-gris">{{ optional($post->published_at)->format('M d') }}</span>
                </div>
                @if ($post->category)
                    <div class="post-category">
                        <span class="category">{{ $post->category->name }}</span>
                    </div>
                @endif
            </header>
            <h1>{{ $post->title }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $post->body !!}
            </div>

            <footer class="container-flex space-between">
                @include('partials.social-links', ['description' => $post->title])
                <div class="tags container-flex">
                    @foreach ($post->tags as $tag)
                        <span class="tag c-gris text-capitalize">#{{ $tag->name }}</span>
                    @endforeach
                </div>
            </footer>
            <div class="comments">
                <div class="divider"></div>
                <div id="disqus_thread"></div>
                @include('partials.disqus-script')
            </div><!-- .comments -->
        </div>
    </article>
</section>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/carousel-bootstrap.css') }}">
@endpush

@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script src="{{ asset('js/carousel-bootstrap.js') }}"></script>
@endpush
