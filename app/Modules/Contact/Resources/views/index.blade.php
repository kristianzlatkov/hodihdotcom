@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        {{ Breadcrumbs::render('contact') }}
        <h1 class="page-title">@lang('contact::front.page_title')</h1>
        <div class="mt-3">
            <form
                method="post"
                action="{{route('contact.send')}}"
                id="contact-us-form"
                class="form-validate"
                data-validation-error-msg="test"
            >
                {{csrf_field()}}
                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="@lang('contact::front.first_name')" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="@lang('contact::front.last_name')" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="@lang('contact::front.email')" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea
                                class="form-control"
                                placeholder="@lang('contact::front.message')"
                                rows="7"
                                name="message"
                                required
                            ></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-light">@lang('contact::front.send')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
