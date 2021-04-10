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
@endsection
