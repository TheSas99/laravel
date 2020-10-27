@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Categorieën</h1>
        <a class="nav-link float-right" href="{{route('news.create')}}">Maak nieuw bericht</a>
    </header>
    <aside>
        <ul>
            @foreach($categories as $category)
                @php /** @var App\Category $category */ @endphp
                <li style="display:inline-block"><a href="#{{ $category->title }}">{{ $category->title }}</a> | </li>
            @endforeach
        </ul>
    </aside>
    <div>
        @foreach($categories as $category)
            @php /** @var App\Category $category */@endphp
                <h2 id="{{ $category->title }}">{{ $category->title }}</h2>

                <div class="row">
                    @foreach($category->newsItems as $newsItem)
                        <div class="col-sm card border-0">
                            <h3 class="card-title">{{$newsItem->title}}</h3>
                            <p><b>{{$newsItem->category->title}}</b></p>
                            <div>
                                @foreach($newsItem->tags as $tag)
                                    @php /** @var App\Models\Tag $tag */@endphp
                                    <span class="border border-dark btn">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <img class="img-responsive mx-auto" height="369" width="228" src="{{$newsItem->image}}" alt="{{$newsItem->title}}">
                            <p class="card-text">{{ Str::limit($newsItem->description, 150) }}</p>
                            <a class="btn btn-light" href="{{route('news.show', $newsItem->id)}}">Lees meer</a>
                        </div>
                    @endforeach
                </div>
        @endforeach
    </div>
@endsection
