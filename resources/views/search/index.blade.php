@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Home</h1>
        <a class="nav-link float-right" href="{{route('news.create')}}">Maak nieuwe Review</a>
    </header>
    <div class="container">
        @if(isset($details))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <h2>Sample User details</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @elseif(isset($message))
            <p>{{ $message }}</p>
        @endif
        @endif
    </div>
@endsection
