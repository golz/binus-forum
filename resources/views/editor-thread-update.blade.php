@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="{{ route('home') }}">Board index</a></span>
                    <span class="crumb"><a href="{{ url('topic/'.$topic->id) }}">{{$topic->title}}</a></span>
                </li>

                @include('partials.burger-menu')

            </ul>
        </div>
    </div>

    <a id="start_here" class="anchor"></a>

    <div id="wrap-subhead">
        <div class="chunk">

            <div id="subhead-title">
                <h2 class="topic-title">{{$topic->title}}</h2>
            </div>

        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk">

            <form id="postform" method="post" action="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/edit') }}" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="panel" id="postingbox">
                    <div class="inner">

                        <h3>New thread</h3>

                        <fieldset class="fields1">

                            <dl style="clear: left;">
                                <div class="error">
                                    @if($errors->has('title'))
                                        {{$errors->first('title')}}
                                    @endif
                                </div>
                                <dt><label for="subject">Title:</label></dt>
                                <dd><input type="text" name="title" id="title" size="45" maxlength="124" tabindex="2" value="{{$thread->title}}" class="inputbox autowidth" placeholder="Title" required></dd>
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
                                        {!! $thread->content !!}
                                    </textarea>
                                    <textarea name="content" id="content" hidden></textarea>
                                </dd>
                            </dl>

                            @if(Auth::user()->role->name == 'Administrator' || $topic->topicModerators->find(Auth::user()->id) != null)
                                <dd style="clear: left;">
                                <dt></dt>
                                <dd><input type="checkbox" name="is_announcement" id="is_announcement" @if($thread->is_announcement == true) checked @endif />
                                    <label for="is_announcement"> Check this if want to <strong>announce</strong> this thread.</label>
                                </dd>
                                </dd>
                            @endif

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