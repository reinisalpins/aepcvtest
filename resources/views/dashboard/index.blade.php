@extends('layouts.app')
@section('content') 
@section('Statistika', 'active')

<div class="statistika-container">
    <div class="box"><div class="circle"><span>{{$postsCount}}</span></div><p>Ieraksti kopā</p></div>
    <div class="box"><div class="circle"><span>{{$commentsCount}}</span></div><p>Komentāri kopā</p></div>
    <div class="box"> <div class="circle"><span>{{$blockedCount}}</span></div><p>Bloķēti komentētāji</p></div>
</div>

<div class="activity-container">
    <div class="heading">Jaunākie ieraksti</div>
    <hr>
    <div class="ieraksti">
        <table>
            <tr>
                <th>ID</th>
                <th>Nosaukums</th>
                <th>Izveidots</th>
              </tr>
              
            @foreach($latestPosts as $post)
            <tr onclick="window.location= '{{ action('PostController@show', $post) }}'" class="tr-link">
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
              </tr>
            </a>
              @endforeach
        </table>
    </div>
</div>


<div class="stats">
    <div class="heading">Pēdējie bloķētie komentētāji</div>
    <hr>
    <ul>
        @foreach($latestBlocked as $blocked)
        <li>{{$blocked->email}}
            <form method="post" action="{{ action('CommentController@unblock', $blocked->email) }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit"><span><i class="fa fa-times" aria-hidden="true"></i></span></button>
            </form>
        </li>
        <hr>
        @endforeach
    </ul>
</div>

<div class="stats">
    <div class="heading">Jaunākie komentāri</div>
    <hr>
    <ul class="comments">
    @foreach($latestComments as $comment)
    <li>
        <p>Komentētājs: {{$comment->email}}</p>
        <p>Komentārs: {{$comment->comment}}</p>
        <a href="{{ action('PostController@show', $comment->post_id) }}">Ieraksts: {{$comment->post_id}}</a>
        <form class="ban" method="post" action="{{ action('CommentController@destroy', [$post, $comment->email]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            <button type="submit"><i class="fa fa-ban" aria-hidden="true"></i></button>
        </form>
    </li>
    <hr>
    @endforeach
</ul>
</div>

@endsection 