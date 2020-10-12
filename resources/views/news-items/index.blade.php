@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Reviews</h1>
        <a class="nav-link float-right" href="{{route('news.create')}}">Maak bericht aan</a>
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
                    <img class="card-img align-content-center">{{$newsItem['image']}} alt="{{$newsItem['title']}}"/>
                    <p>
                        {{ $newsItem->category->title }}
                    </p>
                    <div>
                        @foreach($newsItem->tags as $tag)
                            @php /** @var App\Models\Tag $tag */@endphp
                            <span class="border border-dark btn">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <p class="card-text">{{ Str::limit($newsItem->description, 150) }}</p>
                    <a class="btn btn-light" href="{{route('news.show',$newsItem['id'])}}">Lees meer...</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
