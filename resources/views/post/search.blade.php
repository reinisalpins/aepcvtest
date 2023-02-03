@extends('layouts.app')
{{-- @section('Visi', 'active') --}}
@section('content') 

<div class="search-container">
    <form class="search" action="{{ url('/search')}}">
        <input type="search" name="meklet" placeholder="Meklēt ierakstus">
        <button type="submit">Meklēt</button>
    </form>
</div>
<div class="pievienot-container">
    <h1>Meklēšanas rezultāti</h1>
    <a href="{{ action('PostController@create') }}"><button class="pievienot">Pievienot jaunu ierakstu</button></a>
</div>

<div class="visi-container">
    @if (session('success'))
    <div class="success">
        <p>{{ session('success') }}</p>
    </div>
@endif
<ul>
    @if (count($posts) == 0)
        <p>Tukšums</p>
    @else
    @foreach ($posts as $post)
        <li><a href="{{ action('PostController@show', $post) }}">{{ $post->title }}</a>
            <p>Izveidots : {{ $post->created_at}}</p>
            <p>Atjaunināts : {{ $post->updated_at}}</p>
            <form method="post" action="{{ action('PostController@destroy', $post) }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button class="delete-btn" type="submit">Dzēst ierakstu</button>
              </form>
        </li>
    @endforeach
    @endif
</ul>
</div>

@endsection 