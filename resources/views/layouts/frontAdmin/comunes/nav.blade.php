<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto ml-1 mr-1">
      @if(Auth::guest())
          <li><a href="{{ url('/login') }}"><button type="button" class="btn btn-default ml-1 mr-1"><i class="fa fa-user"></i></button></a></li>
      @else
          <li class="dropdown user user-menu" id="user_menu" style="max-width: 280px;white-space: nowrap;">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="max-width: 280px;white-space: nowrap;overflow: hidden;overflow-text: ellipsis">
                  <button type="button" class="btn btn-default ml-1 mr-1">
                    <i class="fa fa-user"></i>
                    <span class="hidden-xs" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                  </button>
              </a>
              <ul class="dropdown-menu">
                  <li class="user-header">
                      <i class="fa fa-user"></i>
                      <p>
                          <span data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                          <small>{{ trans('message.login') }} Nov. 2012</small>
                      </p>
                  </li>
                  <li class="user-body">
                      <div class="col-xs-4 text-center">
                          <a href="#">{{ trans('message.followers') }}</a>
                      </div>
                      <div class="col-xs-4 text-center">
                          <a href="#">{{ trans('message.sales') }}</a>
                      </div>
                      <div class="col-xs-4 text-center">
                          <a href="#">{{ trans('message.friends') }}</a>
                      </div>
                  </li>
                  <li class="user-footer">
                      <div class="pull-left">
                          <a href="{{ url('/user/profile') }}" class="btn btn-default btn-flat">{{ trans('message.profile') }}</a>
                      </div>
                      <div class="pull-right">
                          <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" id="logout"
                             onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              {{ trans('message.signout') }}
                          </a>

                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                              <input type="submit" value="logout" style="display: none;">
                          </form>

                      </div>
                  </li>
              </ul>
          </li>
      @endif
      <li>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('change_lang', ['lang' => 'en']) }}"><button type="button" class="btn btn-default ml-1 mr-1">En</button></a></li>
            <li><a href="{{ route('change_lang', ['lang' => 'es']) }}"><button type="button" class="btn btn-default ml-1 mr-1">Es</button></a></li>
            <li><a href="{{ url('lang', ['fr']) }}"><button type="button" class="btn btn-default ml-1 mr-1">Fr</button></a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-chart-line"></i> Estadísticas
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </nav>
