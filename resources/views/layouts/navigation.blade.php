<nav class="navbar navbar-expand-lg navbar-light animate__animated animate__fadeIn">
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
                                {{$item->title}}
                            </a>
                            <ul class="dropdown-menu animate__animated animate__fadeIn"
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
                {{--<li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>--}}
            </ul>
        </div>
    </div>
</nav>

