

@extends('layout')

@section('content')

    <h1 xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">Selling your home?</h1>
    <hr>

    <div class="row">
    <form method="POST" action="/flyers" enctype="multipart/form-data" class="col-md-6">
        @include('flyers/form')
        @include('errors/list')

    </form>
    </div>
@stop