@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        <h1 class="page-title">@lang('contact::front.page_title')</h1>
        <div class="mt-3">
            <form>
                <div class="row g-3">
                    <div class="form-group col-12 col-md-4">
                        <input type="text" class="form-control" placeholder="@lang('contact::front.first_name')">
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <input type="email" class="form-control" placeholder="@lang('contact::front.last_name')">
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <input type="text" class="form-control" placeholder="@lang('contact::front.email')">
                    </div>
                    <div class="form-group col-12">
                        <textarea
                            class="form-control"
                            placeholder="@lang('contact::front.message')"
                            rows="7"
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
