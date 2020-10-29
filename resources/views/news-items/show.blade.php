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
                <button type="submit" class="float-right" ><img height="100px" src="https://www.flaticon.com/svg/static/icons/svg/2/2267.svg" alt="Like"></button>
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
