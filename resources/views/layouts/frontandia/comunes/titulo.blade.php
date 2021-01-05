<div class="page-title-container mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeIn">
                <i class="fa fa-camera"></i>
                <h1>
                    @yield("contentheader_h1")
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeIn">
                <div class="center my-5">
                    @yield("contentheader_frase")
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeIn">
                <div class="my-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">@yield('breadcrumb0') </li>
                            @if(trim($__env->yieldContent('breadcrumb1')))
                                <li class="breadcrumb-item">@yield('breadcrumb1')</li>
                            @endif
                            @if(trim($__env->yieldContent('breadcrumb2')))
                                <li class="breadcrumb-item">@yield('breadcrumb2')</li>
                            @endif
                            @if(trim($__env->yieldContent('breadcrumb3')))
                                <li class="breadcrumb-item">@yield('breadcrumb3')</li>
                            @endif
                            @if(trim($__env->yieldContent('breadcrumb4')))
                            <li class="breadcrumb-item">@yield('breadcrumb4')</li>
                            @endif
                            @if(trim($__env->yieldContent('breadcrumb5')))
                                <li class="breadcrumb-item">@yield('breadcrumb5')</li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
