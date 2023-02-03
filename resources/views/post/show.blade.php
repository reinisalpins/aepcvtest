@extends('layouts.app')
@section('content') 
<h1>Dienasgrāmatas ieraksts {{ $post->id }}</h1>

<div class="ieraksts-container">
<div class="ieraksts">

<h2>{{ $post->title }}</h2>
<p>{{ $post->text }}</p>
    <edit-post :old-data="{{ json_encode($post) }}"></edit-post>
</div>

<div class="komentari">

<h1>Komentāri</h1>
<ul>
    @foreach($post->comments as $comment)
        <li>
            <div class="comment-heading">
                <h1>Autors: {{ $comment->email }}</h1>
                <span> {{ $comment->created_at }}</span>
            </div>
            <p>{{ $comment->comment }}</p>
            <form action="{{ action('CommentController@destroy', [$post, $comment->email]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit">bloket so e-pastu</button>
              </form>
        </li>
        <hr>
    @endforeach
</ul>

</div>

<div class="komentet">
<form action="{{ action('CommentController@store', $post) }}" method="post">
    <h2>Komentēt</h2>
    @if (count($errors) > 0)
    <h2>Jūsu ievadītajos datos bija nepilnības</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
@if (session('error'))
    <div class="error">
        <p>{{ session('error') }}</p>
    </div>
@endif
    {{ csrf_field() }}
    <p>
        <label>Tavs epasts:  <input type="text" name="email" value="{{ old('email') }}" required></label>
    </p>
    <p>
        <label>Tavs komentārs: 
            <textarea name="comment" required>{{ old('comment') }}</textarea>
        </label>
    </p>
    <button type="submit">Komentēt</button>
</form>
</div>
</div>
@endsection 