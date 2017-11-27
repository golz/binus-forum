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

            <form id="register" method="post" action="">

                <div class="panel">
                    <div class="inner">

                        <fieldset class="fields2">
                            <dl>
                                <dt><label for="username">NIM:</label><br><span>NUM must be 10 characters long and use only numeric characters.</span></dt>
                                <dd><input type="text" tabindex="1" name="username" id="username" size="25" value="" class="inputbox autowidth" title="Username"></dd>
                            </dl>
                            <dl>
                                <dt><label for="username">Username:</label><br><span>Username must be between 6 characters and 20 characters long and use only alphanumeric characters.</span></dt>
                                <dd><input type="text" tabindex="1" name="username" id="username" size="25" value="" class="inputbox autowidth" title="Username"></dd>
                            </dl>
                            <dl>
                                <dt><label for="email">Email address:</label></dt>
                                <dd><input type="email" tabindex="2" name="email" id="email" size="25" maxlength="100" value="" class="inputbox autowidth" title="Email address" autocomplete="off"></dd>
                            </dl>
                            <dl>
                                <dt><label for="new_password">Password:</label><br><span>Must be between 6 characters and 100 characters.</span></dt>
                                <dd><input type="password" tabindex="4" name="new_password" id="new_password" size="25" value="" class="inputbox autowidth" title="New password" autocomplete="off"></dd>
                            </dl>
                            <dl>
                                <dt><label for="password_confirm">Confirm password:</label></dt>
                                <dd><input type="password" tabindex="5" name="password_confirm" id="password_confirm" size="25" value="" class="inputbox autowidth" title="Confirm password" autocomplete="off"></dd>
                            </dl>

                        </fieldset>
                    </div>
                </div>

                <div class="panel">
                    <div class="inner">

                        <fieldset class="submit-buttons">
                            <input type="hidden" name="agreed" value="true">
                            <input type="hidden" name="change_lang" value="0">
                            <input type="hidden" name="confirm_id" value="8447f2bd56400f427ccf9d2fc3268a67">

                            <input type="reset" value="Reset" name="reset" class="button2"><input type="submit" tabindex="9" name="submit" id="submit" value="Submit" class="button1 default-submit-action">
                            <input type="hidden" name="creation_time" value="1511775457">
                            <input type="hidden" name="form_token" value="f99881da13c42cb6d66069651a95dfcd5de1ac2a">

                        </fieldset>

                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection