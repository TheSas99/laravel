@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        @if($newsItem)
            <h1 class="modal-title float-left">{{$newsItem['title']}}</h1>
        @else
            <h1 class="modal-title float-left">{{$newsItem['error']}}</h1>
        @endif
        <a class="nav-link float-right" href="{{route('news')}}">Terug naar reviews</a>
    </header>

    <div class="container">
        @if($newsItem)
            <article>
                <p>{{$newsItem['description']}}</p>
                <img src="{{$newsItem['description']}}" alt="{{$newsItem['title']}}"/>
            </article>
        @endif
    </div>
@endsection
