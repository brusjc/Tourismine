                            @if (trim($__env->yieldContent('tablapruebas')))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-solid">
                                            <div class="box-header with-border">
                                                <h2 class="box-title"> @yield('titulotablapruebas')</h2>
                                            </div>
                                            <div class="box-body">
                                                <ul>
                                                    @yield('tablapruebas')
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
