<div class="article-list-box">
    <div class="row">
        <div class="col-4">
            <img
                class="article-thumbnail"
                src="https://i.pik.bg/news/937/660_0dd9ee09003bf6f29475ee7cadcbd8b1.jpg"
                alt="Kristian"
            />
        </div>
        <div class="col-8">
            <div class="h-100 d-flex flex-column">
                @if(!empty($article->title))
                    <h6 class="article-title">{{$article->title}}</h6>
                @endif
                @if(!empty($article->body))
                    <div class="flex-grow-1">
                        <p class="text-left">{{substr(strip_tags($article->body), 0, 250)}}...</p>
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
