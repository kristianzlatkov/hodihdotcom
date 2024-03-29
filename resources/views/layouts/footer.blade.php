<div class="container-sm footer">
    <div class="footer-top">
        <div class="row">
            <div class="col-12 col-md-3 offset-md-2">
                <form id="subscribe" method="post" action="{{route('subscribe')}}" class="form-validate">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="newsletterEmail">@lang('front.newsletter')</label><br>
                        <sub>@lang('front.newsletter_message')</sub><br>
                        <input
                            type="email"
                            name="email"
                            class="form-control my-2"
                            id="newsletterEmail"
                            placeholder="@lang('front.newsletter_input_placeholder')"
                            required
                        />
                    </div>
                    <button class="btn btn-primary">Абонирай се</button>
                </form>
            </div>
            <div class="col-12 col-md-7">
                <div class="logo animate__animated animate__fadeIn text-center">
                    <a href="/" title="@lang('front.site_title')">
                        <img class="img-fluid" src="{{asset('assets/images/logo.svg')}}"
                             alt="@lang('front.site_title')"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <sub>Copyright @ 2021 All Rights Reserved</sub>
    </div>
</div>
