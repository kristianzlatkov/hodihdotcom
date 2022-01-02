@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        {{ Breadcrumbs::render('blogPage') }}

        <h1 class="page-title">
            @if(empty($category))
                @lang('blog::front.blog_title')
            @else
                {{$category->title}}
            @endif
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
