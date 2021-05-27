@extends('layouts.app', ['type' => 'home'])

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

            @if(!empty($articles))
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($articles as $article)
                            <div class="swiper-slide">
                                @include('components.article-list', ['article' => $article])
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            @endif

            <div class="page-section">
                <h2 class="page-section-title">За нас</h2>
                <div class="row">
                    <div class="col-12 col-md-6">
                        През месец септември 1981г. група съученици от IV-то ОУ „Стою Шишков”
                        в град Смолян полагат основите на пещерният клуб в града. Тодор
                        Чолаков, Тодор Узунов, Тодор Тодоров, Васил Аршенов, Стефан Йовчев,
                        Антон Димитров и Кирил Милкотев се включват активно в експедициите
                        на пещерен клуб „Студенец” от град Чепеларе. До 1984г. провеждат над
                        30 еднодневни и 20 двудневни експедиции.

                        На 6 декември 1984г. групата се отделя като самостоятелен клуб. За
                        председател е избран Тодор Тодоров, негов заместник е Антон Димитров,
                        секретар на клуба е М. Пичурова, а за зав. НИД е избран Антон Загуров.
                        Част от членовете са Васил Аршенов, Златко Андонов и Тодор Чолаков, а
                        до средата на 1985г. броят им се увеличава на 96. През 1986г. са
                        регистрирани 128 члена, на следващата година броят им нараства на
                        139, а през 1988г. те вече са 154.
                    </div>
                    <div class="col-12 col-md-6">
                        <img class="img-fluid" src="{{asset('assets/images/bg.png')}}"/>
                    </div>
                </div>
            </div>
        </div>
        <footer class="index-section-footer"></footer>
    </section>

    <section class="container-sm">
        <div class="text-center">
            <h2 class="section-title">@lang('front.gallery')</h2>
        </div>

        <div class="swiper-gallery-container">
            <div id="lightgallery" class="swiper-wrapper">
                @if(!empty($images))
                    @foreach($images as $image)
                        <div class="swiper-slide" data-src="{{asset(\Illuminate\Support\Facades\Storage::url($image))}}">
                            @include('components.photo-list', ['url' => $image])
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="container-sm">
        <div id="map" class="mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d1330.8173711349218!2d24.666132991489107!3d41.51329103805531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e0!4m0!4m3!3m2!1d41.512979699999995!2d24.666548799999997!5e0!3m2!1sbg!2sbg!4v1622143274667!5m2!1sbg!2sbg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>        </div>
    </section>
@endsection
