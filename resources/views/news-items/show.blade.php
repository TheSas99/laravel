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
            <div>
                @if(!auth()->user()->hasLiked($newsItem))
                    <form action="/like" method="post">
                        @csrf
                        <input type="hidden" name="likeable" value="{{ get_class($newsItem) }}">
                        <input type="hidden" name="id" value="{{ $newsItem->id }}">
                        <button type="submit" class="btn btn-primary">
                            Like
                        </button>
                    </form>
                @else
                    <button class="btn btn-secondary" disabled>
                        {{ $newsItem->likes()->count() }} likes
                    </button>
                @endif
            </div>
            <article>
                <img class="img-responsive float-left center-block d-block mx-auto" src="{{$newsItem['image']}}" alt="{{$newsItem['title']}}"  />
                <p class="card-text">{{$newsItem['description']}}</p>
            </article>
        <hr>
        @endif
            @if($comment ?? '')
                <commentsection>
                    <form method="post" action="{{ route('news.store') }}">
                        <div class="form-group">
                            <textarea class="form-control" id="description" name="description"></textarea>
                            @if ($errors->has('description'))
                                <span class="alert-danger form-check-inline">{{$errors->first('description')}}</span>
                            @endif
                            <button type="submit" class="btn-primary">Reactie Opslaan</button>
                        </div>
                    </form>
                </commentsection>
                <showcomments>
                    <h3>Comments</h3>

                    {{$comment ?? ''['comment']}}
                    {{$comment ?? ''['user']}}
                </showcomments>
            @endif
    </div>
@endsection
