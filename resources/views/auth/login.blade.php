@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="{{ url('/') }}" data-navbar-reference="index">Board index</a></span>
                </li>

                @include('partials.burger-menu')

            </ul>
        </div>
    </div>

    <a id="start_here" class="anchor"></a>

    <div id="wrap-subhead">
        <div class="chunk">
            <div id="subhead-title">
                <h2 class="sitename-title">Login</h2>

            </div>
        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk">

            <form action="{{ route('login') }}" method="post" id="login" data-focus="username">
                {{ csrf_field() }}
                <div class="panel">
                    <div class="inner">

                        <div class="content">
                            <fieldset class="fields1">

                                <dl>
                                    <div class="error">
                                        @if($errors->has('email'))
                                            {{$errors->first('email')}}
                                        @endif
                                    </div>
                                    <dt><label for="username">Email:</label></dt>
                                    <dd><input type="text" tabindex="1" name="email" id="email" size="25" value="{{ old('email') }}" class="inputbox autowidth"></dd>
                                </dl>
                                <dl>
                                    <div class="error">
                                        @if($errors->has('password'))
                                            {{$errors->first('password')}}
                                        @endif
                                    </div>
                                    <dt><label for="password">Password:</label></dt>
                                    <dd><input type="password" tabindex="2" id="password" name="password" size="25" class="inputbox autowidth" autocomplete="off"></dd>
                                    <dd><a href="{{ route('password.request') }}">I forgot my password</a></dd>															</dl>
                                <dl>
                                    <dd><label for="autologin"><input type="checkbox" name="autologin" id="autologin" tabindex="4"> Remember me</label></dd>
                                </dl>

                                <dl>
                                    <dt>&nbsp;</dt>
                                    <dd>
                                        <input type="submit" name="login" tabindex="6" value="Login" class="button1">
                                    </dd>
                                </dl>
                            </fieldset>
                        </div>

                    </div>
                </div>


                <div class="panel">
                    <div class="inner">

                        <div class="content">
                            <h3>Register</h3>
                            <p>In order to login you must be registered. Registering takes only a few moments but gives you increased capabilities. The board administrator may also grant additional permissions to registered users. Before you register please ensure you are familiar with our terms of use and related policies. Please ensure you read any forum rules as you navigate around the board.</p>
                            <p><strong><a href="./ucp.php?style=5&amp;mode=terms">Terms of use</a> | <a href="./ucp.php?style=5&amp;mode=privacy">Privacy policy</a></strong></p>
                            <hr class="dashed">
                            <p><a href="{{ route('register') }}" class="button2">Register</a></p>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection