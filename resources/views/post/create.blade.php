@extends('layouts.app')
@section('content') 
 {{ method_field('PUT') }}

 <h1> Jauna ieraksta izveidošana</h1>

 <div class="ieraksts">

 @if (count($errors) > 0)
    <h2>Jūsu ievadītajos datos bija nepilnības</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div id="app">
<form action="{{ action('PostController@store') }}" method="post">
    {{ csrf_field() }}
    <p>
        <label>Ieraksta virsraksts <input type="text" name="title" value="{{ old('title') }}"></label>
    </p>
    <p>
        <label>Ieraksta teksts
            <textarea name="text">{{ old('text') }}</textarea>
        </label>
    </p>
    <button type="submit">Izveidot</button>
</form>
</div>
</div>
@endsection 