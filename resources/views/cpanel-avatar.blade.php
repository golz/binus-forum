@extends('layouts.cpanel')

@section('type')
    Edit profile
@endsection

@section('navigation')

    @include('partials.cpanel-profile-navigation')

@endsection

@section('panel-editor')

    <form action="{{ url('user/cpanel/avatar') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="panel">
            <div class="inner">
                <fieldset>
                    <dl>
                        <dt>
                            <label>Current image:</label>
                            <br>
                        </dt>
                        <dd>
                            <img src="{{ asset('uploads/profile/'.$user->image) }}" alt="{{$user->image}}" width="80" height="80">
                        </dd>
                    </dl>
                </fieldset>
                <h3>Select your avatar</h3>
                <div id="avatar_options">
                    <div id="avatar_option_avatar_driver_upload">
                        <fieldset>
                            <dl>
                                <div class="error">
                                    @if($errors->has('image'))
                                        {{$errors->first('image')}}
                                    @endif
                                </div>
                                <dt><label for="image">Upload profile's photo from your machine:</label></dt>
                                <dd><input type="file" name="image" id="image" class="autowidth"></dd>
                            </dl>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <fieldset class="submit-buttons">
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