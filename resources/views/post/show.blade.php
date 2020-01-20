<h1>Dienasgrāmatas ieraksts {{ $post->id }}</h1>

<h2>{{ $post->title }}</h2>
<p>{{ $post->text }}</p>

<p><a href="{{ action('PostController@edit', $post) }}">Labot šo ierakstu</a></p>

<h1>Komentāri</h1>
<ul>
    @foreach($post->comments as $comment)
        <li>
            Autors: {{ $comment->email }}
            Datums: {{ $comment->created_at }}<br>
            {{ $comment->comment }}
        </li>
    @endforeach
</ul>
<form action="{{ action('CommentController@store', $post) }}" method="post">
    <h2>Komentēt</h2>
    {{ csrf_field() }}
    <p>
        <label>Tavs epasts <input type="text" name="email" value="{{ old('email') }}"></label>
    </p>
    <p>
        <label>Tavs komentārs
            <textarea name="comment">{{ old('comment') }}</textarea>
        </label>
    </p>
    <p><input type="submit" value="Komentēt"></p>
</form>