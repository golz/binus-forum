@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="{{ route('home') }}">Board index</a></span>
                </li>

                @include('partials.burger-menu')

            </ul>
        </div>
    </div>

    <a id="start_here" class="anchor"></a>

    <div id="wrap-subhead">
        <div class="chunk">

            <div id="subhead-title-tabs">
                <h2 class="topic-title">User Control Panel @yield('type') </h2>
            </div>

            <ul id="subhead-tabs">
                <li class="tab @if(Request::is('user/cpanel*')) activetab @endif"><a href="">Profile</a></li>
                <li class="tab @if(Request::is('user/privateMessage*')) activetab @endif"><a href="">Private messages</a></li>
                {{--<li class="tab @if(Request::is('user/friendList*')) activetab @endif"><a href="">Friends &amp; Foes</a></li>--}}
            </ul>

        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk-main">

            <div id="cp-menu">
                <div id="navigation" role="navigation">

                    @yield('navigation')

                </div>
            </div>

            <div id="cp-main" class="ucp-main panel-container">
                <div id="cp-main-inner">

                    {{--CONTENT HERE--}}
                    @yield('panel-editor')
                    {{--CONTENT HERE--}}

                </div>
            </div>
        </div>
    </div>



@endsection