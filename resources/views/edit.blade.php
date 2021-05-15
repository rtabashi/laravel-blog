@extends('layouts.app')

@section('title', '記事編集')

@section('content')
    <a href="/posts/{{ $post->slug }}">戻る</a>
    <form action="/edit/{{ $post->slug }}" method="POST">
        @csrf
        カテゴリー: <input class="create-category" type="text" name="category" value="{{ $post->category->name }}" required>
        <input class="create-title" type="text" name="title" value="{{ $post->title }}" placeholder="タイトル" required>
        <textarea class="create-body" name="body" placeholder="本文" required>{{ $post->body }}</textarea>
        <input type="submit" value="更新">
    </form>
@endsection