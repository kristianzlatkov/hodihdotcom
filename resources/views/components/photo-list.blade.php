@if(!empty($url))
    <a class="photo-list-box" src="{{$url}}" @if(!empty($alt))title="{{$alt}}" @endif>
        <img src="{{$url}}" @if(!empty($alt))alt="{{$alt}}" @endif />
    </a>
@endif
