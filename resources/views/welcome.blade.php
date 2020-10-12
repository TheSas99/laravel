@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Home</h1>
        <a class="nav-link float-right" href="{{route('news.create')}}">Maak nieuwe Review</a>
    </header>
    <div>
        <p>Welkom op Game Reviews</p>
    </div>
@endsection



