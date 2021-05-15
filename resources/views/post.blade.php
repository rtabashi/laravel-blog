@extends('layouts.app')

@section('title', '記事')

@section('content')
    <article>
        <div class="post-title">
            {{ $post->title }}
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
        <div class="post-body">
            <div>
                {!! nl2br(e($post->body)) !!}
            </div>
        </div>
        <div class="modify-link">
            <a href="/edit/{{ $post->slug }}">編集</a>
            <a href="/delete/{{ $post->slug }}">削除</a>
        </div>
    </article>
@endsection