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

            <div class="search-box">
                <form method="get" id="topic-search" action="">
                    {{ csrf_field() }}
                    <fieldset>
                        <input class="inputbox search"  type="search" name="keywords" id="search_keywords" size="20" placeholder="Search this topic…" />
                        <button class="button" type="submit" title="Search"><i class="fa fa-search"></i></button>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk-main">

            <div class="action-bar top">

                <div class="buttons">
                    @if($thread->status == 'close')
                        <a href="" class="button font-icon" title="Closed">
                            <i class="fa fa-close"></i>Closed
                        </a>
                    @else
                        @if(Auth::check())
                            <a href="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/replyEditor') }}" class="button font-icon" title="Post a reply">
                                <i class="fa fa-reply"></i>Post a reply
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="button font-icon" title="Please login first">
                                <i class="fa fa-lock"></i>Please login first
                            </a>
                        @endif
                    @endif
                </div>

                <div class="pagination">
                    {{$thread->replies->count()}} replies
                    &bull; Page <strong> {{$replies->currentPage()}} </strong> of <strong> {{$replies->total()}}</strong>
                    <br>
                    {!! $replies->appends(Request::except('page'))->render() !!}
                </div>

            </div>

            @if($replies->currentPage() == 1)
                <div id="p{{$thread->id}}" class="post has-profile bg2">
                    <div class="inner">
                        <dl class="postprofile" id="profile56">
                            <dt class="has-profile-rank has-avatar">
                            <div class="avatar-container">
                                <a href="" class="avatar"><img class="avatar" src="{{ asset('uploads/profile/'.$thread->user->image) }}" width="80" height="80" alt="User avatar" /></a>																				</div>
                            <a href="" style="color: @if($thread->user->role->name == 'Administrator') #AA0000 @elseif($topic->topicModerators->find($thread->user->id) != null) #00AA00 @endif ;" class="username-coloured">
                                {{$thread->user->nickname}}
                            </a>
                            </dt>

                            <dd class="profile-rank">
                                @if($thread->user->role->name == 'Administrator')
                                    Administrator
                                @elseif($topic->topicModerators->find($thread->user->id))
                                    Moderator
                                @endif
                            </dd>

                            <dd class="profile-posts"><strong>Posts:</strong>
                                <a href="">{{$thread->user->replies->count() + $thread->user->threads->count()}}</a>
                            </dd>
                            <dd class="profile-joined">
                                <strong>Joined:</strong>
                                {{$thread->user->created_at->format('d M Y, H:i')}}
                            </dd>

                            <dd class="profile-contact">
                                <strong>Contact:</strong>
                                <a class="contact-icon contact-icon-pm" href="" title="Send private message">Send private message
                                </a>
                            </dd>
                        </dl>

                        <div class="postbody">
                            <div id="post_content56">

                                <h3 class="first">
                                    <a href="#p{{$thread->id}}">{{$thread->title}}</a></h3>

                                <ul class="posts-buttons">
                                    @if(Auth::check() && $thread->status != 'close')
                                        @if(Auth::user()->role->name == 'Administrator' || $topic->topicModerators->find($thread->user->id) != null)
                                            <li>
                                                <a href="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/close') }}" title="Close this thread"><i class="fa fa-crosshairs"></i><span>Close this thread</span></a>
                                            </li>
                                        @endif
                                        @if($thread->user->id == Auth::user()->id)
                                            <li>
                                                <a href="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/delete') }}" title="Remove this post"><i class="fa fa-remove"></i><span>Delete</span></a>
                                            </li>
                                            <li>
                                                <a href="" title="Edit this post"><i class="fa fa-edit"></i><span>Edit this post</span></a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="" title="Report this post"><i class="fa fa-flag"></i><span>Report this post</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/replyEditor') }}" title="Reply this thread"><i class="fa fa-reply"></i><span>Reply this thread</span></a>
                                        </li>
                                    @endif
                                </ul>

                                <p class="author"><a href=""> {{$thread->updated_at->format('d M Y, H:i')}} </a> </p>

                                <div class="content">
                                    {!! $thread->content !!}
                                </div>

                                <div id="sig{{$thread->id}}" class="signature">
                                    {{--signature here--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="divider" />
            @endif

            @foreach($replies as $reply)
                <div id="p{{$reply->id}}" class="post has-profile bg2">
                    <div class="inner">
                        <dl class="postprofile" id="profile56">
                            <dt class="has-profile-rank has-avatar">
                            <div class="avatar-container">
                                <a href="" class="avatar"><img class="avatar" src="{{ asset('uploads/profile/'.$reply->user->image) }}" width="80" height="80" alt="User avatar" /></a>																				</div>
                            <a href="" style="color: @if($reply->user->role->name == 'Administrator') #AA0000 @elseif($topic->topicModerators->find($reply->user->id) != null) #00AA00 @endif ;" class="username-coloured">
                                {{$reply->user->nickname}}
                            </a>
                            </dt>

                            <dd class="profile-rank">
                                @if($reply->user->role->name == 'Administrator')
                                    Administrator
                                @elseif($topic->topicModerators->find($reply->user->id))
                                    Moderator
                                @endif
                            </dd>

                            <dd class="profile-posts"><strong>Posts:</strong>
                                <a href="">{{$reply->user->replies->count() + $reply->user->threads->count()}}</a>
                            </dd>
                            <dd class="profile-joined">
                                <strong>Joined:</strong>
                                {{$reply->user->created_at->format('d M Y, H:i')}}
                            </dd>

                            <dd class="profile-contact">
                                <strong>Contact:</strong>
                                <a class="contact-icon contact-icon-pm" href="" title="Send private message">Send private message
                                </a>
                            </dd>
                        </dl>

                        <div class="postbody">
                            <div id="post_content56">

                                <h3 class="first">
                                    <a href="#p{{$reply->id}}">{{$reply->title}}</a></h3>

                                <ul class="posts-buttons">
                                    @if(Auth::check() && $thread->status != 'close')
                                        @if($reply->user->id == Auth::user()->id)
                                        <li>
                                            <a href="" title="Remove this post"><i class="fa fa-remove"></i><span>Delete</span></a>
                                        </li>
                                        <li>
                                            <a href="" title="Edit this post"><i class="fa fa-edit"></i><span>Edit this post</span></a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="" title="Report this post"><i class="fa fa-flag"></i><span>Report this post</span></a>
                                        </li>

                                            <li>
                                                <a href="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/replyEditor?quote='.$reply->id) }}" title="Reply with quote"><i class="fa fa-quote-left"></i><span>Quote</span></a>
                                            </li>
                                    @endif
                                </ul>

                                <p class="author"><a href=""> {{$reply->updated_at->format('d M Y, H:i')}} </a> </p>

                                <div class="content">
                                    {!! $reply->content !!}
                                </div>

                                <div id="sig{{$reply->id}}" class="signature">
                                    {{--signature here--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="divider" />
            @endforeach

        </div>
        @if(Auth::check() && $thread->status != 'close')
        <div class="chunk">
            <form method="post" action="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/postReply') }}" id="qr_postform">
                {{ csrf_field() }}
                <div class="panel">
                    <div class="inner">
                        <fieldset class="fields1">
                            <div class="qr-subject">
                                <input type="text" name="title" id="title" size="45" maxlength="124" tabindex="2" value="Re: {{$thread->title}}" class="inputbox autowidth" placeholder="Title" />
                            </div>
                            <div id="message-box">
                                <textarea style="height: 9em;color:#fff;" name="content" rows="7" cols="76" tabindex="3" class="inputbox" placeholder="Content"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="submit-buttons">
                            <input type="button" accesskey="f" tabindex="6" name="preview" value="Full Editor &amp; Preview" class="button2" id="qr_full_editor" onclick='window.location.href="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/replyEditor') }}"'>
                            <input type="submit" accesskey="s" tabindex="7" name="post" value="Submit" class="button1" />
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
        @endif

        <div class="chunk-main">

            <form id="viewtopic" method="get" action="">
                <fieldset class="display-options" style="margin-top: 0; ">
                    <label>Sort by
                        <select name="sk" id="sk">
                            {{--<option value="a">Author</option>--}}
                            <option value="t" selected="selected">Post time</option>
                            <option value="s">Subject</option>
                        </select>
                    </label>
                    <label>
                        <select name="sd" id="sd">
                            <option value="a" selected="selected">Ascending</option>
                            <option value="d">Descending</option>
                        </select>
                    </label>
                    <input type="submit" name="sort" value="Go" class="button2" />
                </fieldset>
            </form>

            <div class="action-bar bottom">

                <div class="buttons">
                    @if($thread->status == 'close')
                        <a href="" class="button font-icon" title="Closed">
                            <i class="fa fa-close"></i>Closed
                        </a>
                    @else
                        @if(Auth::check())
                            <a href="{{ url('topic/'.$topic->id.'/thread/'.$thread->id.'/replyEditor') }}" class="button font-icon" title="Post a reply">
                                <i class="fa fa-reply"></i>Post a reply
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="button font-icon" title="Please login first">
                                <i class="fa fa-lock"></i>Please login first
                            </a>
                        @endif
                    @endif
                </div>

                <div class="pagination">
                    {{$thread->replies->count()}} replies
                    &bull; Page <strong> {{$replies->currentPage()}} </strong> of <strong> {{$replies->total()}}</strong>
                    <br>
                    {!! $replies->appends(Request::except('page'))->render() !!}
                </div>

            </div>

            <p class="jumpbox-return"><a href="{{ url('topic/'.$topic->id) }}" class="left-box arrow-left" accesskey="r">Return to “{{$topic->title}}”</a></p>

        </div>

        <div id="site-footer-area" class="site-footer-forum">
            <div class="chunk">

            </div>
        </div>

    </div>

@endsection