<div class="article-list-box">
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="text-center">
                <img
                    class="article-thumbnail"
                    src="{{Voyager::image($article->image)}}"
                    alt="{{$article->title}}"
                />
            </div>
        </div>
        <div class="col-12 col-xl-8">
            <div class="h-100 d-flex flex-column my-2">
                @if(!empty($article->title))
                    <h6 class="article-title">{{$article->title}}</h6>
                @endif
                @if(!empty($article->body))
                    <div class="article-list-box-content">
                        <span class="text-left">{{substr(strip_tags($article->body), 0, 200)}}...</span>
                    </div>
                @endif
                @if(!empty($article->slug))
                    <div class="text-end">
                        <a href="" @if(!empty($article->title)) title="{{$article->title}}" @endif>@lang('front.article_more')</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
