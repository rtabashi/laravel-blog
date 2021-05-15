@extends('layouts.app')

@section('title')
    @if (isset($category))
        カテゴリー: {{ $category->name }}
    @elseif (isset($author))
        著者: {{ $author->name }}
    @else
        記事一覧
    @endif
@endsection

@section('content')
    @foreach ($posts as $post)
        <article>
            <div class="post-title">
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </div>
            <div class="post-info">
                <div>
                    カテゴリー: <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                </div>
                <div>
                    著者: <a href="/authors/{{ $post->author->username }}">{{ $post->author->name}}</a>
                </div>
                <div>
                    公開日：{{ strftime("%F", strtotime($post->published_at)) }}
                </div>
            </div>
        </article>
    @endforeach
@endsection