@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="{{ route('home') }}">Board index</a></span>
                </li>

                @include('partials.burger-menu')

            </ul>
        </div>
    </div>

    <a id="start_here" class="anchor"></a>

    <div id="wrap-subhead">
        <div class="chunk">

            <div id="subhead-title-sm">
                <h2 class="searchresults-title">Search found {{$threads->count() + $replies->count()}} match: {{$data['keyword']}}</h2>

                <p id="subhead-more">
                    Searched query: <strong>{{$data['keyword']}}</strong>
                </p>
            </div>

        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk-main">

            @if($topic != null && ($threads->count() != 0 || $replies->count() != 0))
                <div class="action-bar top">
                    <p class="jumpbox-return"><a href="{{ url('topic/'.$topic->id) }}" class="left-box arrow-left" accesskey="r">Return to “{{$topic->title}}”</a></p>
                </div>
            @else
                <div class="action-bar top">

                </div>
            @endif

            @if($threads->count() == 0 && $replies->count() == 0)
                <div class="panel">
                    <div class="inner">
                        <strong>No suitable matches were found.</strong>
                    </div>
                </div>
            @else
                <h3>Search from threads ({{$threads->count()}}) : </h3>
                <hr>
                @foreach($threads as $thread)
                    <div class="search post bg2">
                        <div class="inner">

                            <dl class="postprofile">
                                <dt class="author">by <a href="{{ url('user/profile/'.$thread->user->id) }}" style="color: @if($thread->user->role->name == 'Administrator') #AA0000 @elseif($thread->topic->topicModerators->find($thread->user->id) != null) #00AA00 @endif ;" class="username-coloured">{{$thread->user->nickname}}</a></dt>
                                <dd class="search-result-date">{{$thread->user->created_at->format('d M Y, H:i')}}</dd>
                                <dd>Topic: <a href="{{ url('topic/'.$thread->topic->id) }}">{{$thread->topic->title}}</a></dd>
                                <dd>Thread: <a href="{{ url('topic/'.$thread->topic->id.'/thread/'.$thread->id) }}">{{$thread->title}}</a></dd>
                                <dd>Replies: <strong>{{ $thread->replies->count() }}</strong></dd>
                                <dd>Views: <strong>{{ $thread->view }}</strong></dd>
                            </dl>

                            <div class="postbody">
                                <h3>
                                    <a href="{{ url('topic/'.$thread->topic->id.'/thread/'.$thread->id) }}">
                                        {!! str_replace($data['keyword'],'<span class="posthilit">'.$data['keyword'].'</span>',$thread->title) !!}
                                    </a>
                                </h3>
                                <div class="content">
                                    {!! str_replace($data['keyword'],'<span class="posthilit">'.$data['keyword'].'</span>',$thread->content) !!}
                                </div>
                            </div>

                            <ul class="searchresults">
                                <li><a href="{{ url('topic/'.$thread->topic->id.'/thread/'.$thread->id) }}">Jump to thread</a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
                <h3>Search from replies ({{$replies->count()}}) : </h3>
                <hr>
                @foreach($replies as $reply)
                    <div class="search post bg2">
                        <div class="inner">

                            <dl class="postprofile">
                                <dt class="author">by <a href="{{ url('user/profile/'.$reply->user->id) }}" style="color: @if($reply->user->role->name == 'Administrator') #AA0000 @elseif($reply->thread->topic->topicModerators->find($reply->user->id) != null) #00AA00 @endif ;" class="username-coloured">{{$thread->user->nickname}}</a></dt>
                                <dd class="search-result-date">{{$reply->user->created_at->format('d M Y, H:i')}}</dd>
                                <dd>Topic: <a href="{{ url('topic/'.$reply->thread->topic->id) }}">{{$reply->thread->topic->title}}</a></dd>
                                <dd>Thread: <a href="{{ url('topic/'.$reply->thread->topic->id.'/thread/'.$reply->thread->id) }}">{{$reply->thread->title}}</a></dd>
                                <dd>Reply: <a href="{{ url('topic/'.$reply->thread->topic->id.'/thread/'.$reply->thread->id.'#p'.$reply->id) }}">{{$reply->title}}</a></dd>
                            </dl>

                            <div class="postbody">
                                <h3>
                                    <a href="{{ url('topic/'.$reply->thread->topic->id.'/thread/'.$reply->thread->id) }}">
                                        {!! str_replace($data['keyword'],'<span class="posthilit">'.$data['keyword'].'</span>',$reply->title) !!}
                                    </a>
                                </h3>
                                <div class="content">
                                    {!! str_replace($data['keyword'],'<span class="posthilit">'.$data['keyword'].'</span>',$reply->content) !!}
                                </div>
                            </div>

                            <ul class="searchresults">
                                <li><a href="{{ url('topic/'.$reply->thread->topic->id.'/thread/'.$reply->thread->id.'#p'.$reply->id) }}">Jump to reply</a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
        <div class="chunk-main">

            @if($topic != null )
                <p class="jumpbox-return"><a href="{{ url('topic/'.$topic->id) }}" class="left-box arrow-left" accesskey="r">Return to “{{$topic->title}}”</a></p>
            @endif

        </div>

        <div id="site-footer-area" class="site-footer-forum">
            <div class="chunk">

            </div>
        </div>
    </div>

@endsection