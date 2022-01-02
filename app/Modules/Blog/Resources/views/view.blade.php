@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        {{ Breadcrumbs::render('post') }}
        <h1 class="page-title">{{$article->title}}</h1>

        <div>
            {!! $article->body !!}
        </div>
    </div>
@endsection
