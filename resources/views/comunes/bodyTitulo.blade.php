<div class="row container-cargando">
  <div class="col-sm-12 text-center">
    <div class="cargando hidden"><i class="fa fa-spinner fa-spin fa-3x"></i></div>
  </div>
</div>
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark">
            @yield('contentheader_title', 'Page Header here')
            <small>@yield('contentheader_description')</small>
        </h1>
      </div>
      <div class="col-sm-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">{{ trans('message.home') }}</a></li>

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

          <li class="breadcrumb-item"> {{ trans('message.here') }} </li>
          
        </ol>
      </div>
    </div>
    </div>
</div>
