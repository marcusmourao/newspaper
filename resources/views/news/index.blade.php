@extends('template')
@section('content')
    <h1>News Index page</h1>
    <div class="row">
        <div class="col m8 l8">
            @foreach ($news as $new)
                <div class="card small">
                    <div class="col s6 m6 l6">
                        <div class="card-image">
                            <img class="materialboxed" src="{{asset('storage/images/news/' . $new->uri . '/image1.png')}}">
                        </div>
                    </div>
                    <div class="col s6 m6 l6">
                        <header>
                            <h1 class="card-title"><a href="/news/show/{{$new->uri}}">{{$new->title}}</a></h1>
                        </header>
                        <div>
                            <p class="text-justify truncate">{{$new->text}}</p>
                        </div>
                    </div>
                </div>
                <div class="divider light-gray"></div>
            @endforeach

        </div>
        <div class="col m4 l4"></div>
    </div>
@stop


