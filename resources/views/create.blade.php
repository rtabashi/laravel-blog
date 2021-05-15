@extends('layouts.app')

@section('title', '記事投稿')

@section('content')
    @isset ($err_msg)
        <div class="error">
            <p>{{ $err_msg }}</p>
        </div>
    @endif
    <form action="/create" method="POST">
        @csrf
        <input class="create-category" type="text" name="category" placeholder="カテゴリー" required>
        <input class="create-title" type="text" name="title" placeholder="タイトル" required>
        <textarea class="create-body" name="body" placeholder="本文" required></textarea>
        <input type="submit" value="投稿">
    </form>
@endsection