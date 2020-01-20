<ul>
    @foreach ($posts as $post)
        <li><a href="{{ action('PostController@show', $post) }}">{{ $post->id }}: {{ $post->title }}</a></li>
    @endforeach
</ul>
<p><a href="{{ action('PostController@create') }}">Pievienot jaunu ierakstu</a></p>