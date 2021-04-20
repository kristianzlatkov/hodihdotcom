<div class="container-sm mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="logo animate__animated animate__fadeIn text-center">
                <a href="/" title="@lang('front.site_title')">
                    <img class="img-fluid" src="{{asset('assets/images/logo.svg')}}" alt="@lang('front.site_title')"/>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <form method="post" action="{{route('index')}}">
                <div class="form-group footer-form">
                    <label for="exampleInputEmail1">Абонамент</label><br>
                    <sub id="emailHelp">Абонирайте се за новини</sub><br>
                    <input
                        type="email"
                        class="form-control my-2"
                        id="emailAddressNewsletter"
                        aria-describedby="emailHelp"
                        placeholder="Email..."
                    />
                </div>
                <button class="btn btn-primary">Абонирай се</button>
            </form>
        </div>
        <div class="col-12 col-md-6 col-lg-4">asd</div>
    </div>
</div>
