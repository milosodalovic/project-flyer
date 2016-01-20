@extends('layout')

@section('content')
        <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Project Flyer</h1>
        <p>
            This is a template for a simple marketing or informational website.
            It includes a large callout called a jumbotron and three supporting pieces of content.
            Use it as a starting point to create something more unique.
        </p>

        @if($signedIn)
            <a class="btn btn-primary btn-lg" href="/flyers/create" role="button">Create a Flyer »</a>
        @else
            <a class="btn btn-primary btn-lg" href="/register" role="button">SignUp »</a>
        @endif


    </div>
</div>
@stop