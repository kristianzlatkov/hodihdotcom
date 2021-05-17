@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        <h1 class="page-title">
            @lang('pages::front.news_page_title')
        </h1>

        @if(!empty($articles))
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-12 col-md-6">
                        @include('components.article-list', ['article' => $article])
                    </div>
                @endforeach
            </div>
        @endif
        {{$articles->links('components.pagination')}}
    </div>
@endsection
