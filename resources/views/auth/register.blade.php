@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="{{ route('home') }}">Board index</a></span>
                    <span class="crumb"><a href="{{ route('register') }}">Register</a></span>
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

            <form id="register" method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel">
                    <div class="inner">

                        <fieldset class="fields2">
                            <dl>
                                <div class="error">
                                    @if($errors->has('fullname'))
                                        {{$errors->first('fullname')}}
                                    @endif
                                </div>
                                <dt><label for="fullname">Full name:</label><br><span>Full name must be between 5 and 50 characters long.</span></dt>
                                <dd><input type="text" tabindex="1" name="fullname" id="fullname" size="50" value="" class="inputbox autowidth" title="Full Name"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('nickname'))
                                        {{$errors->first('nickname')}}
                                    @endif
                                </div>
                                <dt><label for="nickname">Nickname:</label><br><span>Nickname must be between 3 characters and 20 characters long and use only alphanumeric characters. <br /> Nickname will be displayed as your identity in our forums.</span></dt>
                                <dd><input type="text" tabindex="1" name="nickname" id="nickname" size="50" value="" class="inputbox autowidth" title="Nick Name"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('nim'))
                                        {{$errors->first('nim')}}
                                    @endif
                                </div>
                                <dt><label for="nim">NIM:</label><br><span>NIM must be 10 characters long and use only numeric characters.</span></dt>
                                <dd><input type="text" tabindex="1" name="nim" id="nim" size="50" value="" class="inputbox autowidth" title="Username"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('email'))
                                        {{$errors->first('email')}}
                                    @endif
                                </div>
                                <dt><label for="email">Email address:</label></dt>
                                <dd><input type="email" tabindex="2" name="email" id="email" size="50" maxlength="100" value="" class="inputbox autowidth" title="Email address" autocomplete="off"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('image'))
                                        {{$errors->first('image')}}
                                    @endif
                                </div>
                                <dt><label for="image">Upload profile's photo from your machine:</label></dt>
                                <dd><input type="file" name="image" id="image" class="autowidth"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('bday_day') || $errors->has('bday_month') || $errors->has('bday_year'))
                                        The birthday field must be in right format.
                                    @endif
                                </div>
                                <dt><label for="dob">Birthday:</label><br><span>Setting a year will list your age when it is your birthday.</span></dt>
                                <dd>
                                    <label for="dob">Day:
                                        <select name="bday_day" id="bday_day">
                                            <option value="0" selected="selected">--</option>
                                            @for($i=1;$i<=31;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </label>

                                    <label for="bday_month">Month:
                                        <select name="bday_month" id="bday_month">
                                            <option value="0" selected="selected">--</option>
                                            @for($i=1;$i<=12;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </label>

                                    <label for="bday_year">Year:
                                        <select name="bday_year" id="bday_year">
                                            <option value="0" selected="selected">--</option>
                                            @for($i=1917;$i<=\Carbon\Carbon::now()->year;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                            {{--1917 - 2017--}}
                                        </select>
                                    </label>
                                </dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('password'))
                                        {{$errors->first('password')}}
                                    @endif
                                </div>
                                <dt><label for="password">Password:</label><br><span>Must be between 6 and 100 characters long.</span></dt>
                                <dd><input type="password" tabindex="4" name="password" id="password" size="50" value="" class="inputbox autowidth" title="New password" autocomplete="off"></dd>
                            </dl>
                            <dl>
                                <div class="error">
                                    @if($errors->has('password_confirmation'))
                                        {{$errors->first('password_confirmation')}}
                                    @endif
                                </div>
                                <dt><label for="password_confirmation">Confirm password:</label></dt>
                                <dd><input type="password" tabindex="5" name="password_confirmation" id="password_confirmation" size="50" value="" class="inputbox autowidth" title="Confirm password" autocomplete="off"></dd>

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