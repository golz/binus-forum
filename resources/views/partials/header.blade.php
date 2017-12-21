<div id="wrap-head">

    <div id="site-header">
        <div class="chunk">
            <div id="site-logo">
                <a class="site-logo" href="{{ url('/') }}" title="Board index"></a>
                <p class="skiplink"><a href="#start_here">Skip to content</a></p>
            </div>


            <ul id="site-menu">
                {{--<li data-skip-responsive="true" class="site-menu"><a href="./faq.php?style=5" rel="help" title="Frequently Asked Questions">FAQ</a></li>--}}

                @guest
                    <li class="font-icon rightside"  data-skip-responsive="true">
                        <a href="{{ route('login') }}" title="Login" accesskey="x" role="menuitem"><i class="fa fa-power-off"></i>
                            <span class="nav-rh-2">Login</span>
                        </a>
                    </li>
                    <li class="font-icon rightside" data-skip-responsive="true">
                        <a href="{{ route('register') }}" role="menuitem"><i class="fa fa-pencil-square-o"></i>
                            <span class="nav-rh-2">Register</span>
                        </a>
                    </li>
                @else
                    <li class="font-icon dropdown-container" data-skip-responsive="true">
                        <a href="./search.php?style=5" class="dropdown-trigger"><i class="fa fa-user"></i></a>
                        <div class="dropdown hidden">
                            <div class="pointer"><div class="pointer-inner"></div></div>
                            <ul class="dropdown-contents dropdown-nonscroll" role="menu">
                                <li class="font-icon icon-profile">
                                    <a href="{{ url('user/cpanel/profile/') }}" title="User Control Panel" role="menuitem">
                                        <i class="fa fa-wrench"></i>
                                        User Control Panel
                                    </a>
                                </li>
                                <li class="font-icon icon-profile">
                                    <a href="{{ url('user/profile/'.Auth::user()->id) }}" title="Profile" role="menuitem">
                                        <i class="fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li class="separator"></li>
                                <li class="font-icon icon-logout">
                                    <a href="{{ route('logout') }}" title="Logout" accesskey="x" role="menuitem" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>

                                        <span class="nav-rh-2">Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endguest

                {{--<li class="font-icon dropdown-container" data-skip-responsive="true">--}}
                    {{--<a href="./search.php?style=5" class="dropdown-trigger"><i class="fa fa-search"></i></a>--}}
                    {{--<div class="dropdown hidden">--}}
                        {{--<div class="pointer"><div class="pointer-inner"></div></div>--}}
                        {{--<div id="site-search" class="dropdown-contents">--}}
                            {{--<form action="{{  }}" method="get">--}}
                                {{--<fieldset>--}}
                                    {{--<input name="keyword" type="search" maxlength="128" title="Search for keywords" size="20" value="" placeholder="Search" /><button type="submit" title="Search"><i class="fa fa-search"></i></button><input type="hidden" name="style" value="5" />--}}

                                {{--</fieldset>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}

            </ul>

        </div>
    </div>
</div>