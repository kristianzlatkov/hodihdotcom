@if(!empty($url))
    <a class="photo-list-box" src="{{\Illuminate\Support\Facades\Storage::url($url)}}"
       @if(!empty($alt))title="{{$alt}}" @endif>
        <img src="{{\Illuminate\Support\Facades\Storage::url($url)}}" @if(!empty($alt))alt="{{$alt}}" @endif />
    </a>
@endif
