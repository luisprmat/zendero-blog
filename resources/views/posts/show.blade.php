@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
<section class="posts container">
    <article class="post">

        @include($post->viewType())

        <div class="content-post">
            @include('posts.header')
            <h1>{{ $post->title }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $post->body !!}
            </div>

            <footer class="container-flex space-between">
                @include('partials.social-links', ['description' => $post->title])
                @include('posts.tags')
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
