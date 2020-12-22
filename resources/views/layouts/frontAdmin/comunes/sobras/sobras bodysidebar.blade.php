
<aside class="main-sidebar">
    <section class="sidebar">
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
                </div>
            </div>
        @endif

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ trans('message.header') }}</li>
            <li class="active"><a href="/"><i class='fa fa-user'></i> <span>{{ trans('message.home') }}</span></a></li>
            @if (! Auth::guest())
                @if(Auth::user()->roll_id==99)
                    <li><a href="/pruebasmaster"><i class='fa fa-link'></i> <span>{{ trans('message.master') }}</span></a></li>
                @endif
            @endif
            <li><a href="/examenes-jqcv"><i class='fa fa-question'></i> <span>{{ trans('message.examenes_JQCV') }}</span></a></li>
            <li><a href="/vocabulario"><i class='fa fa-book'></i> <span>{{ trans('message.vocabulario') }}</span></a></li>
            <li><a href="/ortografia"><i class='fa fa-edit'></i> <span>{{ trans('message.ortografia') }}</span></a></li>
        </ul>
    </section>
</aside>
