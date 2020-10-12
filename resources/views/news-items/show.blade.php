@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        @if($newsItem)
            <h1 class="modal-title float-left">{{$newsItem['title']}} - Review</h1>
        @else
            <h1 class="modal-title float-left">{{$newsItem['error']}}</h1>
        @endif
        <a class="nav-link float-right" href="{{route('news')}}">Terug naar reviews</a>
    </header>

    <div class="container">
        @if($newsItem)
            <article>
                <img class="img-responsive float-left center-block d-block mx-auto" src="{{$newsItem['image']}}" alt="{{$newsItem['title']}}"  />
                <p class="card-text">{{$newsItem['description']}}</p>
            </article>
        @endif
    </div>
@endsection
