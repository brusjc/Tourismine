<nav style="--bs-breadcrumb-divider: '/';"  aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        @if({{session('BC1')}})
            <li class="breadcrumb-item">
                <a href="/{{session('lang')}}/{{session('BC1')}}">@yield("breadcrumb1")</a>
            </li>
        @else if(@yield("breadcrumb1"))
            <li class="breadcrumb-item">
                @yield("breadcrumb1")
            </li>
        @endif
        @if({{session('BC2')}})
            <li class="breadcrumb-item">
                <a href="/{{session('lang')}}/{{session('BC2')}}">@yield("breadcrumb2")</a>
            </li>
        @else if(@yield("breadcrumb2"))
            <li class="breadcrumb-item">
                @yield("breadcrumb2")
            </li>
        @endif
        @if({{session('BC3')}})
            <li class="breadcrumb-item">
                <a href="/{{session('lang')}}/{{session('BC3')}}">@yield("breadcrumb3")</a>
            </li>
        @else if(@yield("breadcrumb3"))
            <li class="breadcrumb-item">
                @yield("breadcrumb3")
            </li>
        @endif
        @if({{session('BC4')}})
            <li class="breadcrumb-item">
                <a href="/{{session('lang')}}/{{session('BC4')}}">@yield("breadcrumb4")</a>
            </li>
        @else if(@yield("breadcrumb4"))
            <li class="breadcrumb-item">
                @yield("breadcrumb4")
            </li>
        @endif
        @if({{session('BC5')}})
            <li class="breadcrumb-item">
                <a href="/{{session('lang')}}/{{session('BC5')}}">@yield("breadcrumb5")</a>
            </li>
        @else if(@yield("breadcrumb5"))
            <li class="breadcrumb-item">
                @yield("breadcrumb5")
            </li>
        @endif
    </ol>
</nav>
