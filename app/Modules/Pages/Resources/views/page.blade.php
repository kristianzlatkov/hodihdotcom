@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        <h1 class="page-title">{{$page->title}}</h1>

        <div>
            {!! $page->body !!}
        </div>
    </div>
@endsection
