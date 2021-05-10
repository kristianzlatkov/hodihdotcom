@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        <h1 class="page-title">{{$newsArticle->title}}</h1>

        <div>
            {!! $newsArticle->body !!}
        </div>
    </div>
@endsection
