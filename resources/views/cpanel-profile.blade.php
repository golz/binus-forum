@extends('layouts.cpanel')

@section('type')
    Edit profile
@endsection

@section('navigation')

    @include('partials.cpanel-profile-navigation')

@endsection

@section('panel-editor')

    <form action="{{ url('user/cpanel/profile') }}" method="post">
        {{ csrf_field() }}

        <div class="panel">
            <div class="inner">
                <p>Please note that this information may be viewable to other members. Be careful when including any personal details. Any fields marked with a * must be completed.</p>
                <fieldset>

                    <dl>
                        <div class="error">
                            @if($errors->has('fullname'))
                                {{$errors->first('fullname')}}
                            @endif
                        </div>
                        <dt><label for="fullname">Full name:</label><br><span>Full name must be between 5 and 50 characters long.</span></dt>
                        <dd><input type="text" tabindex="1" name="fullname" id="fullname" size="50" value="{{$user->fullname}}" class="inputbox autowidth" title="Full Name"></dd>
                    </dl>

                    <dl>
                        <div class="error">
                            @if($errors->has('bday_day') || $errors->has('bday_month') || $errors->has('bday_year'))
                                The birthday field must be in right format.
                            @endif
                        </div>
                        <dt><label for="dob">Birthday:</label><br></dt>
                        <dd>
                            {{-- selected="selected"--}}
                            <label for="dob">Day:
                                <select name="bday_day" id="bday_day">
                                    <option value="0">--</option>
                                    @for($i=1;$i<=31;$i++)
                                        <option value="{{$i}}" @if($i == $dob->day) selected="selected" @endif>{{$i}}</option>
                                    @endfor
                                </select>
                            </label>

                            <label for="bday_month">Month:
                                <select name="bday_month" id="bday_month">
                                    <option value="0">--</option>
                                    @for($i=1;$i<=12;$i++)
                                        <option value="{{$i}}" @if($i == $dob->month) selected="selected" @endif>{{$i}}</option>
                                    @endfor
                                </select>
                            </label>

                            <label for="bday_year">Year:
                                <select name="bday_year" id="bday_year">
                                    <option value="0">--</option>
                                    @for($i=1917;$i<=\Carbon\Carbon::now()->year;$i++)
                                        <option value="{{$i}}" @if($i == $dob->year) selected="selected" @endif>{{$i}}</option>
                                    @endfor
                                    {{--1917 - 2017--}}
                                </select>
                            </label>
                        </dd>
                    </dl>
                </fieldset>
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