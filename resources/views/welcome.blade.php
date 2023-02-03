@extends('layouts.app')
@section('content') 
@section('Sakumlapa', 'active')
<div class="welcome">
    <h1><a href="{{ action('PostController@index') }}">Ieraksti</a></h1>
    <h1><a href="{{ action('DashboardController@index') }}">Statistika</a></h1>
</div>
@endsection 
