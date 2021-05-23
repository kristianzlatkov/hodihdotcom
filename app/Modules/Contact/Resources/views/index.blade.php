@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        <h1 class="page-title">@lang('contact::front.page_title')</h1>
        <div class="mt-3">
            <form method="post" action="{{route('contact.send')}}">
                <div class="row g-3">
                    <div class="form-group col-12 col-md-4">
                        <input type="text" name="first_name" class="form-control" placeholder="@lang('contact::front.first_name')" required>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <input type="text" name="last_name" class="form-control" placeholder="@lang('contact::front.last_name')" required>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <input type="email" name="email" class="form-control" placeholder="@lang('contact::front.email')" required>
                    </div>
                    <div class="form-group col-12">
                        <textarea
                            class="form-control"
                            placeholder="@lang('contact::front.message')"
                            rows="7"
                            name="message"
                            required
                        ></textarea>
                    </div>
                    <div class="form-group col-12 text-end">
                        <button type="submit" class="btn btn-light">@lang('contact::front.send')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
