@extends('layouts.app')

@section('content')
    <div class="index-view">
        <div class="welcome-bg-logo animate__animated animate__fadeIn"></div>
        <div class="welcome-bg" style="background-image: url('{{asset('assets/images/bg.png')}}')"></div>
        <div class="logo animate__animated animate__fadeIn">
            <a href="/" title="@lang('front.site_title')">
                <img class="img-fluid" src="{{asset('assets/images/logo.svg')}}" alt="@lang('front.site_title')"/>
            </a>
        </div>
        <div class="welcome-title container-sm">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <h2 class="title">@lang('front.welcome_title')</h2>
                    <sub>@lang('front.welcome_subtitle')</sub>
                </div>
            </div>
        </div>
    </div>
    <section class="main-section">
        <header class="index-section-header"></header>
        <div class="container-sm">
            <div class="text-center">
                <h2 class="section-title">@lang('front.attractions')</h2>
            </div>

            <div class="row">
                @if($articles->isNotEmpty())
                    @foreach($articles as $article)
                        <div class="col-12 col-lg-6">
                            @include('components.article-list', ['article' => $article])
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <footer class="index-section-footer"></footer>
    </section>
@endsection
