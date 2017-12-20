@extends('layouts.cpanel')

@section('type')
    Edit profile
@endsection

@section('navigation')

    @include('partials.cpanel-profile-navigation')

@endsection

@section('panel-editor')

    <form action="{{ url('user/cpanel/signature') }}" method="post">
        {{ csrf_field() }}

        <div class="panel">
            <div class="inner">
                <p>This is a block of text that can be added to posts you make. There is a 255 character limit.</p>
                <fieldset>

                    <dl>
                        <div class="error">
                            @if($errors->has('content'))
                                {{$errors->first('content')}}
                            @endif
                        </div>
                        <dt style="width:10%;"><label for="subject">Content:</label></dt>
                        <dd style="max-width:700px;margin-left:11%;">
                            <textarea id="editor1" rows="10" cols="80" class="textarea" placeholder="Content">
                                @if($user->signature != null)
                                    {!! $user->signature->content !!}
                                @endif
                            </textarea>
                            <textarea name="content" id="content" hidden></textarea>
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

    <script>
        $(function(){
            CKEDITOR.replace('editor1');

            setInterval(updateContent,100);
            function updateContent(){
                var editorText = CKEDITOR.instances.editor1.getData();
                $('#content').html(editorText);
            }
        });
    </script>

@endsection