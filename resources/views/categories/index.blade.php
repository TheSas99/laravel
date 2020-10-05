@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-right">Categories</h1>
        <a class="nav-link float-right" href="{{route('news.create')}}">Maak nieuw bericht</a>
    </header>
    <aside>
        <ul>
            @foreach($categories as $category)
                @php /** @var App\Category $category */ @endphp
                <li><a href="#{{ $category->title }}">{{ $category->title }}</a></li>
            @endforeach
        </ul>
    </aside>
    <div>
        @foreach($categories as $category)
            @php /** @var App\Category $category */@endphp
                <h2>{{ $category->title }}</h2>
                <div class="row">

                    @foreach($category->newsItems() as $newsItem)
                        <div class="col-sm card border-0">
                            <h3 class="card-title">{{$newsItem}}</h3>
                            <p>
                                <b>{{$newsItem->category->title}}</b>
                            </p>
                            <p class="card-text">{{$newsItem->category->description}}</p>
                            <img class="card-img" src="{{$newsItem->image}}" alt="{{$newsItem->title}}">
                            <a class="btn btn-light" href="{{route('$news.show', $newsItem->id)}}">Lees meer</a>
                        </div>
                    @endforeach
                </div>
        @endforeach
    </div>
@endsection
