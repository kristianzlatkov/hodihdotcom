@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        {{ Breadcrumbs::render('gallery') }}

        <h1 class="page-title">
            @lang('gallery::front.page_title')
        </h1>

        <div id="lightgallery" class="row">
            @foreach($images as $image)
                <div class="col-12 col-md-6 col-lg-4 my-2" data-src="{{asset(\Illuminate\Support\Facades\Storage::url($image))}}">
                    @include('components.photo-list', ['url' => $image])
                </div>
            @endforeach
        </div>
        {{$images->links('components.pagination')}}
    </div>
@endsection
