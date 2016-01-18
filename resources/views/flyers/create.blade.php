

@extends('layout')

@section('content')

    <h1 xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">Selling your home?</h1>
    <hr>

    <form method="POST" action="/flyers" enctype="multipart/form-data">
        @include('flyers/form')
        @include('errors/list')

    </form>

@stop