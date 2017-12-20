@extends('layouts.cpanel')

@section('type')
    Edit profile
@endsection

@section('navigation')

    @include('partials.cpanel-profile-navigation')

@endsection

@section('panel-editor')

    <form action="{{ url('user/cpanel/accountSetting') }}" method="post">
        {{ csrf_field() }}

        <div class="panel">
            <div class="inner">
                <fieldset>
                    <dl>
                        <div class="error">
                            @if($errors->has('nickname'))
                                {{$errors->first('nickname')}}
                            @endif
                        </div>
                        <dt><label for="nickname">Nickname:</label><br><span>Nickname must be between 3 characters and 20 characters long and use only alphanumeric characters. <br /> Nickname will be displayed as your identity in our forums.</span></dt>
                        <dd><input type="text" tabindex="1" name="nickname" id="nickname" size="50" value="{{$user->nickname}}" class="inputbox" title="Nick Name"></dd>
                    </dl>
                    <dl>
                        <div class="error">
                            @if($errors->has('email'))
                                {{$errors->first('email')}}
                            @endif
                        </div>
                        <dt><label for="email">Email address:</label></dt>
                        <dd><input type="email" tabindex="2" name="email" id="email" size="50" maxlength="100" value="{{$user->email}}" class="inputbox" title="Email address" autocomplete="off"></dd>
                    </dl>
                    <dl>
                        <div class="error">
                            @if($errors->has('new_password'))
                                {{$errors->first('new_password')}}
                            @endif
                        </div>
                        <dt><label for="new_password">New password:</label><br><span>Must be between 6 characters and 100 characters.</span></dt>
                        <dd><input type="password" name="new_password" id="new_password" maxlength="255" value="" class="inputbox" title="Change password" autocomplete="off"></dd>
                    </dl>
                    <dl>
                        <dt><label for="new_password_confirmation">Confirm password:</label><br><span>You only need to confirm your password if you changed it above.</span></dt>
                        <dd><input type="password" name="new_password_confirmation" id="new_password_confirmation" maxlength="255" value="" class="inputbox" title="Confirm password" autocomplete="off"></dd>
                    </dl>
                </fieldset>
            </div>
        </div>

        <div class="panel">
            <div class="inner">

                <fieldset>
                    <dl>
                        <dt><label for="password">Current password:</label><br><span>To change your password, your email address, or your username, you must enter your current password.</span></dt>
                        <dd><input type="password" name="password" id="password" maxlength="255" value="" class="inputbox" title="Current password" autocomplete="off"></dd>
                    </dl>
                </fieldset>

            </div>
        </div>

        <fieldset class="submit-buttons">
            <div class="error" style="margin-bottom:16px;">
                @if(\Session::has('error'))
                    {{\Session::get('error')}} <br/>
                @endif
            </div>
            <div class="syntaxkeyword" style="margin-bottom:16px;">
                @if(\Session::has('message'))
                    {{\Session::get('message')}} <br/>
                @endif
            </div>
            <input type="reset" value="Reset" name="reset" class="button2">&nbsp;
            <input type="submit" name="submit" value="Submit" class="button1">
        </fieldset>

    </form>

@endsection