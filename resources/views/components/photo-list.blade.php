@if(!empty($url))
    <div class="photo-list-box">
        <img src="{{$url}}" @if(!empty($alt))alt="{{$alt}}" @endif />
    </div>
@endif
