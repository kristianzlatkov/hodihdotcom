<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler hamburger hamburger--squeeze ml-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @foreach($items as $item)
                    <li class="nav-item">
                        @if(!$item->children->isNotEmpty())
                            <a
                                class="nav-link"
                                aria-current="page"
                                href="{{$item->slug}}"
                                title="{{$item->title}}"
                            >{{$item->title}}</a>
                        @else
                            <a class="nav-link dropdown-toggle"
                               href="{{$item->slug}}"
                               id="{{$item->id}}-nav-link"
                               title="{{$item->title}}"
                               role="button"
                               data-bs-toggle="dropdown"
                               aria-expanded="false"
                            >
                                <span>{{$item->title}}</span>
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu"
                                aria-labelledby="{{$item->id}}-nav-link">
                                @foreach($item->children as $child)
                                    <a
                                        class="nav-link"
                                        aria-current="page"
                                        href="{{$child->slug}}"
                                        title="{{$child->title}}"
                                    >{{$child->title}}</a>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
