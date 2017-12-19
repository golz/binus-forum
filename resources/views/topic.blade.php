@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="{{ route('home') }}">Board index</a></span>
                    <span class="crumb"><a href="">{{$topic->title}}</a></span>
                </li>

                @include('partials.burger-menu')

            </ul>
        </div>
    </div>

    <a id="start_here" class="anchor"></a>

    <div id="wrap-subhead">
        <div class="chunk">

            <div id="subhead-title">
                <h2 class="forum-title">{{$topic->title}}</h2>
            </div>

            <div class="search-box">
                <form method="get" id="forum-search" action="">
                    {{ csrf_field() }}
                    <fieldset>
                        <input class="inputbox search" type="search" name="keywords" id="search_keywords" size="20" placeholder="Search this forum…" />
                        <button class="button" type="submit" title="Search"><i class="fa fa-search"></i></button>
                    </fieldset>
                </form>
            </div>

            <div id="wrap-body">

                <div class="chunk-main">
                    <div class="action-bar top">
                        @if(Auth::check())
                            @if(Auth::user()->role->name == 'Administrator' || $topic->topicModerators->find(Auth::user()->id) != null)
                            <div class="buttons">
                                <a href="./posting.php?style=5&amp;mode=post&amp;f=2" class="button font-icon" title="Post a new topic">
                                    <i class="fa fa-pencil"></i>New Topic					</a>
                            </div>
                            @endif
                        @endif

                        <div class="pagination">
                            {{$topic->threads->count()}} threads
                            &bull; Page <strong> {{$threads->currentPage()}} </strong> of <strong> {{$threads->total()}}</strong>
                            <br>
                            {!! $threads->appends(Request::except('page'))->render() !!}
                        </div>

                    </div>

                    <div class="forumbg announcement">
                        <div class="inner">

                            @if($announcements->count() > 0)
                                <ul class="topiclist">
                                    <li class="header">
                                        <dl class="icon">
                                            <dt><div class="list-inner">Announcements</div></dt>
                                        </dl>
                                    </li>
                                </ul>
                            @endif

                            <ul class="topiclist topics">
                            @foreach($announcements as $announcement)
                                    <li class="row bg1 global-announce">
                                        <dl class="icon global_read">
                                            <dt title="No unread posts">

                                                <span class="ico_global_read"></span>

                                            <div class="list-inner">
                                                <a href="{{url('topic/'.$topic->id.'/thread/'.$announcement->id)}}" class="topictitle">{{$announcement->title}}</a><br />
                                                <span class="topic-ap"><i class="fa fa-floppy-o"></i></span>
                                                by
                                                <a href="" style="color: @if($announcement->user->role->name == 'Administrator') #AA0000 @elseif($topic->topicModerators->find($announcement->user->id) != null) #00AA00 @endif ;" class="username-coloured">{{$announcement->user->nickname}}</a> &raquo;
                                                {{$announcement->updated_at->format('d M Y, H:i')}}
                                                <div class="r-lastpost-container">
                                                    <a href="" title="Go to last post" class="r-lastpost"><i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                            </dt>

                                            <dd class="posts">{{$announcement->replies->count()}} <dfn>Replies</dfn></dd>
                                            <dd class="views">{{$announcement->view}}<dfn>Views</dfn></dd>

                                            @if($announcement->replies->count() > 0)
                                            <dd class="lastpost">
                                                <span>
                                                    <dfn>Last post </dfn>
                                                    Last post by
                                                    <a href="" style="color: @if($announcement->replies->last()->user->role->name == 'Administrator') #AA0000 @elseif($topic->topicModerators->find($announcement->user->id) != null) #00AA00 @endif ;" class="username-coloured">{{$announcement->replies->last()->user->nickname}}</a>
                                                    <span class="lastpostavatar">
                                                        <img class="avatar" src="{{ asset('uploads/profile/'.$announcement->replies->last()->user->image) }}" width="30" height="30" alt="User avatar" />
                                                    </span>
                                                    <a href="" title="Go to last post" class="lastpost-last"><i class="fa fa-arrow-right"></i></a>
                                                    <br />
                                                    {{$announcement->replies->last()->updated_at->format('d M Y, H:i')}}
                                                </span>
                                            </dd>
                                            @endif
                                        </dl>
                                    </li>
                            @endforeach
                            </ul>

                        </div>
                    </div>

                    <div class="forumbg">
                        <div class="inner">
                            <ul class="topiclist">
                                <li class="header">
                                    <dl class="icon">
                                        <dt><div class="list-inner">Threads</div></dt>
                                    </dl>
                                </li>
                            </ul>

                            <ul class="topiclist topics">
                            @foreach($threads as $thread)
                                <li class="row bg1 global-announce">
                                    <dl class="icon ico_topic_read_hot">
                                        <dt title="No unread posts">

                                            <span class="@if($thread->status == 'close')ico_topic_read_locked @else ico_topic_read_hot @endif"></span>

                                        <div class="list-inner">
                                            <a href="{{url('topic/'.$topic->id.'/thread/'.$thread->id)}}" class="topictitle">{{$thread->title}}</a><br />
                                            <span class="topic-ap"><i class="fa fa-floppy-o"></i></span>
                                            by
                                            <a href="" style="color: @if($thread->user->role->name == 'Administrator') #AA0000 @elseif($topic->topicModerators->find($thread->user->id) != null) #00AA00 @endif ;" class="username-coloured">{{$thread->user->nickname}}</a> &raquo;
                                            {{$thread->updated_at->format('d M Y, H:i')}}
                                            <div class="r-lastpost-container">
                                                <a href="" title="Go to last post" class="r-lastpost"><i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                        </dt>

                                        <dd class="posts">{{$thread->replies->count()}} <dfn>Replies</dfn></dd>
                                        <dd class="views">{{$thread->view}}<dfn>Views</dfn></dd>

                                        @if($thread->replies->count() > 0)
                                            <dd class="lastpost">
                                        <span>
                                            <dfn>Last post </dfn>
                                            Last post by
                                            <a href="" style="color: @if($thread->replies->last()->user->role->name == 'Administrator') #AA0000 @elseif($topic->topicModerators->find($thread->user->id) != null) #00AA00 @endif ;" class="username-coloured">{{$thread->replies->last()->user->nickname}}</a>
                                            <span class="lastpostavatar">
                                                <img class="avatar" src="{{ asset('uploads/profile/'.$thread->replies->last()->user->image) }}" width="30" height="30" alt="User avatar" />
                                            </span>
                                            <a href="" title="Go to last post" class="lastpost-last"><i class="fa fa-arrow-right"></i></a>
                                            <br />
                                            {{$thread->replies->last()->updated_at->format('d M Y, H:i')}}
                                        </span>
                                            </dd>
                                        @endif
                                    </dl>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <form method="get" action="">
                        {{ csrf_field() }}
                        <fieldset class="display-options">
                            <input type="hidden" name="page" id="page" value="{{$threads->currentPage()}}">
                            <label>Sort by
                                <select name="sk" id="sk">
                                    {{--<option value="a">Author</option>--}}
                                    <option value="t" selected="selected">Post time</option>
                                    {{--<option value="r">Replies</option>--}}
                                    <option value="s">Subject</option>
                                    <option value="v">Views</option>
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
                        @if(Auth::check())
                            @if(Auth::user()->role->name == 'Administrator' || $topic->topicModerators->find(Auth::user()->id) != null)
                                <div class="buttons">
                                    <a href="./posting.php?style=5&amp;mode=post&amp;f=2" class="button font-icon" title="Post a new topic">
                                        <i class="fa fa-pencil"></i>New Topic					</a>
                                </div>
                            @endif
                        @endif

                        <div class="pagination">
                            {{$topic->threads->count()}} threads
                            &bull; Page <strong> {{$threads->currentPage()}} </strong> of <strong> {{$threads->total()}}</strong>
                            <br>
                            {!! $threads->appends(Request::except('page'))->render() !!}
                        </div>

                    </div>


                    <p class="jumpbox-return"><a href="{{ route('home') }}" class="left-box arrow-left" accesskey="r">Return to Board Index</a></p>

                </div>
            </div>

        </div>

        <div id="site-footer-area" class="site-footer-forum">
            <div class="chunk">

            </div>
        </div>

    </div>


@endsection