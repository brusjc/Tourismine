    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <p class="h1 text-light"><a href="/{{ session('lang') }}/"><span>Tourismine</span></a></p>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li><a href="/{{ session('lang') }}/ciudades">Ciudades</a></li>
          <li>
            @if(Auth::guest())
                <li><a href="{{ url('/login') }}"><i class="fas fa-user"></i>Login</a></li>
            @else
                <!-- User Account Menu -->
                <li class="dropdown user user-menu" id="user_menu" style="max-width: 280px;white-space: nowrap;">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="max-width: 280px;white-space: nowrap;overflow: hidden;overflow-text: ellipsis">
                        <button type="button" class="btn btn-default ml-1 mr-1">
                          <i class="fa fa-user"></i>
                          <span class="hidden-xs" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                        </button>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <i class="fa fa-user"></i>
                            <p>
                                <span data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                                <small>{{ trans('message.login') }} Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
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
                        <!-- Menu Footer-->
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
          </li>
          @if (! Auth::guest())
            @if(Auth::user()->roll_id==99)
              <li class="nav-item">
                <a href="/es/master" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>{{ trans('message.master') }}</p>
                </a>
              </li>
            @endif
          @endif
          <li><a href="#contact">Contact</a></li>

          <li class="get-started"><a href="#about">Get Started</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
