@extends('layouts.app', ['type' => 'base'])

@section('content')
    <div class="container-sm">
        <div id="lightgallery" class="row">
            @foreach($images as $image)
                <div class="col-12 col-md-6 col-lg-4" data-src="{{asset(\Illuminate\Support\Facades\Storage::url($image))}}">
                    @include('components.photo-list', ['url' => $image])
                </div>
            @endforeach
        </div>
    </div>
@endsection
