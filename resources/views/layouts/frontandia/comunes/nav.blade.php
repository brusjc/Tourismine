         <nav class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <div class="h1">
                        <a href="/{{ session('lang') }}/">Tourismine.com</a>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if(!Auth::guest())
                            @if(Auth::user()->roll_id==99)
                                <li>
                                    <a href="/es/master"><i class="fa fa-key fa-2x misvg"></i><br>{{ trans('message.master') }}</a>
                                </li>
                            @endif
                        @endif
                        <li>
                            <a href="/{{ session('lang') }}/ciudades"><i class="fa fa-camera fa-2x misvg"></i><br>Ciudades</a>
                        </li>
                        <li>
                            <a href="services.html"><i class="fa fa-cloud-download fa-2x misvg"></i><br>Descargar</a>
                        </li>
                        <li>
                            <a href="contact.html"><i class="fa fa-envelope fa-2x"></i><br>Contact</a>
                        </li>
                        @if(Auth::guest())
                            <li><a href="/login" rel="nofollow"><i class="fa fa-user fa-2x"></i><br>{{ trans('message.usuario') }}</a></li>
                        @else
                            <li>
                              <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" id="logout"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-user-times fa-2x"></i><br>{{ trans('message.signout') }}</a>
                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                                  <input type="submit" value="logout" style="display: none;">
                              </form>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
