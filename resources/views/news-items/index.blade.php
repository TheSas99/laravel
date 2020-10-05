@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1>Reviews</h1>
        <a class="nav-link float right" href="{{route('news.create')}}">Maak bericht aan</a>
    </header>

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            @foreach($newsItems as $newsItem)
                <div class="col-sm card border-0">
                    <h2 class="card-title">{{$newsItem['title']}}</h2>
                    <p>
                        {{ $newsItem->category->title }}
                    </p>
                    <p class="card-text">{{$newsItem['description']}}</p>
                    <img class="card-img">{{$newsItem['image']}} alt="{{$newsItem['title']}}"/>
                    <a class="btn btn-light" href="{{route('news.show',$newsItem['id'])}}">Lees meer</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
