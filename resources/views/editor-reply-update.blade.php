@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="{{ route('home') }}">Board index</a></span>
                    <span class="crumb"><a href="{{ url('topic/'.$topic->id) }}">{{$topic->title}}</a></span>
                    <span class="crumb"><a href="">{{$thread->title}}</a></span>
                </li>

                @include('partials.burger-menu')

            </ul>
        </div>
    </div>

    <a id="start_here" class="anchor"></a>

    <div id="wrap-subhead">
        <div class="chunk">

            <div id="subhead-title">
                <h2 class="topic-title">{{$thread->title}}</h2>
            </div>

        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk">

            <form id="postform" method="post" action="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/reply/'.$reply->id.'/edit') }}" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="panel" id="postingbox">
                    <div class="inner">

                        <h3>Post a reply</h3>

                        <fieldset class="fields1">

                            <dl style="clear: left;">
                                <div class="error">
                                    @if($errors->has('title'))
                                        {{$errors->first('title')}}
                                    @endif
                                </div>
                                <dt><label for="subject">Title:</label></dt>
                                <dd><input type="text" name="title" id="title" size="45" maxlength="124" tabindex="2" value="{{$reply->title}}" class="inputbox autowidth" required ></dd>
                            </dl>

                            <dl style="clear: left;">
                                <div class="error">
                                    @if($errors->has('content'))
                                        {{$errors->first('content')}}
                                    @endif
                                </div>
                                <dt><label for="subject">Content:</label></dt>
                                <dd style="max-width:900px;">
                                    <textarea id="editor1" rows="10" cols="80" class="textarea" placeholder="Content">
                                        {!! $reply->content !!}
                                    </textarea>
                                    <textarea name="content" id="content" hidden></textarea>
                                </dd>
                            </dl>

                        </fieldset>

                    </div>
                </div>

                <div class="panel bg2">
                    <div class="inner">
                        <fieldset class="submit-buttons">

                            <input type="submit" accesskey="s" tabindex="6" name="post" value="Submit" class="button1 default-submit-action">

                        </fieldset>

                    </div>
                </div>

            </form>
        </div>
    </div>

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