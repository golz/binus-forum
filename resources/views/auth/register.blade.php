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
                <h2 class="sitename-title">Registration</h2>

            </div>
        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk">

            <form id="register" method="post" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="panel">
                    <div class="inner">

                        <fieldset class="fields2">
                            <dl>
                                <div class="error">
                                    @if($errors->has('nim'))
                                        {{$errors->first('nim')}}
                                    @endif
                                </div>
                                <dt><label for="nim">NIM:</label><br><span>NIM must be 10 characters long and use only numeric characters.</span></dt>
                                <dd><input type="text" tabindex="1" name="nim" id="nim" size="25" value="" class="inputbox autowidth" title="Username"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('username'))
                                        {{$errors->first('username')}}
                                    @endif
                                </div>
                                <dt><label for="username">Username:</label><br><span>Username must be between 6 characters and 20 characters long and use only alphanumeric characters.</span></dt>
                                <dd><input type="text" tabindex="1" name="username" id="username" size="25" value="" class="inputbox autowidth" title="Username"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('email'))
                                        {{$errors->first('email')}}
                                    @endif
                                </div>
                                <dt><label for="email">Email address:</label></dt>
                                <dd><input type="email" tabindex="2" name="email" id="email" size="25" maxlength="100" value="" class="inputbox autowidth" title="Email address" autocomplete="off"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('password'))
                                        {{$errors->first('password')}}
                                    @endif
                                </div>
                                <dt><label for="password">Password:</label><br><span>Must be between 6 characters and 100 characters.</span></dt>
                                <dd><input type="password" tabindex="4" name="password" id="password" size="25" value="" class="inputbox autowidth" title="New password" autocomplete="off"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('password_confirmation'))
                                        {{$errors->first('password_confirmation')}}
                                    @endif
                                </div>
                                <dt><label for="password_confirmation">Confirm password:</label></dt>
                                <dd><input type="password" tabindex="5" name="password_confirmation" id="password_confirmation" size="25" value="" class="inputbox autowidth" title="Confirm password" autocomplete="off"></dd>

                            </dl>
                        </fieldset>
                    </div>
                </div>

                <div class="panel">
                    <div class="inner">

                        <fieldset class="submit-buttons">

                            <input type="reset" value="Reset" name="reset" class="button2">
                            <input type="submit" tabindex="9" name="submit" id="submit" value="Submit" class="button1 default-submit-action">

                        </fieldset>

                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection