@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="./index.php?style=5" accesskey="h" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" data-navbar-reference="index">Board index</a></span>
                </li>

                @include('partials.burger-menu')

            </ul>
        </div>
    </div>

    <a id="start_here" class="anchor"></a>

    <div id="wrap-subhead">
        <div class="chunk">
            <div id="subhead-title">
                <h2 class="sitename-title">Registration</h2>

            </div>
        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk">

            <form action="./ucp.php?style=5&amp;mode=login" method="post" id="login" data-focus="username">
                <div class="panel">
                    <div class="inner">

                        <div class="content">
                            <fieldset class="fields1">
                                <dl>
                                    <dt><label for="username">Username:</label></dt>
                                    <dd><input type="text" tabindex="1" name="username" id="username" size="25" value="" class="inputbox autowidth"></dd>
                                </dl>
                                <dl>
                                    <dt><label for="password">Password:</label></dt>
                                    <dd><input type="password" tabindex="2" id="password" name="password" size="25" class="inputbox autowidth" autocomplete="off"></dd>
                                    <dd><a href="./ucp.php?style=5&amp;mode=sendpassword">I forgot my password</a></dd>															</dl>
                                <dl>
                                    <dd><label for="autologin"><input type="checkbox" name="autologin" id="autologin" tabindex="4"> Remember me</label></dd>
                                </dl>

                                <input type="hidden" name="redirect" value="./ucp.php?mode=login&amp;style=5&amp;style=5">

                                <dl>
                                    <dt>&nbsp;</dt>
                                    <dd><input type="hidden" name="sid" value="50c2c108a0efe329cdf324105c41dd78">
                                        <input type="hidden" name="redirect" value="index.php">
                                        <input type="submit" name="login" tabindex="6" value="Login" class="button1"></dd>
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
                            <p><a href="./ucp.php?style=5&amp;mode=register" class="button2">Register</a></p>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection