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
    </div>
@endsection
