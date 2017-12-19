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

    <div id="wrap-body">
        <div class="chunk-main">

            {{--Begin Sidebar--}}
            <div id="sidebar">
                <div class="side-block">
                    <img src="{{ asset('images/greater-nusantara.png') }}" alt="Greater Nusantara" style="border-radius: 3px;padding:30px;filter:grayscale(100%);">
                </div>

                @if(!Auth::check())
                <div class="side-block side-login">
                    <form method="post" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h4 class="side-block-head"><a href="{{ route('login') }}">Login</a>&nbsp; &bull; &nbsp;<a href="{{ route('register') }}">Register</a></h4>
                        <div class="side-block-body">
                            <fieldset>
                                <input type="text" tabindex="1" name="email" id="email" size="15" class="inputbox" title="Email" placeholder="Email" />
                                <div class="error">
                                    @if($errors->has('email'))
                                        {{$errors->first('email')}}
                                    @endif
                                </div>
                                <br />
                                <input type="password" tabindex="2" name="password" id="password" size="10" class="inputbox" title="Password" placeholder="Password" autocomplete="off" />
                                <div class="error">
                                    @if($errors->has('password'))
                                        {{$errors->first('password')}}
                                    @endif
                                </div>
                                <br />
                                <a href="{{ route('password.request') }}">
                                    I forgot my password <br />
                                </a>
                                <br />
                                <label for="autologin" id="remember-me"><input type="checkbox" tabindex="4" name="autologin" id="autologin" />Remember me</label>
                                <br />
                                <input type="submit" tabindex="5" name="login" value="Login" class="button2" />

                            </fieldset>
                        </div>
                    </form>
                </div>
                @endif

                <div class="side-block">
                    <h4 class="side-block-head">Recent Threads</h4>
                    <div class="side-block-body" id="sidebar-recent-posts">
                        @foreach($lastFivePosts as $lastFivePost)
                        <div>
                            <a class="sidebar-recent-title" href="{{ url('topic/'.$lastFivePost->topic->id.'/thread/'.$lastFivePost->id) }}">{{$lastFivePost->title}}</a>
                            <span class="sidebar-recent-author">by {{$lastFivePost->user->nickname}}</span>
                            <span class="sidebar-recent-content">{{trim(substr($lastFivePost->content,0,50))}}...</span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            {{--End Sidebar--}}

            {{--Begin Forum List--}}
            <div id="forumlist">
                <div id="forumlist-inner">

                    @foreach($types as $type)
                    <div class="forabg">
                        <div class="inner">
                            <ul class="topiclist">
                                <li class="header">
                                    <dl class="icon">
                                        <dt><div class="list-inner"><a href="">{{$type->name}}</a></div></dt>
                                    </dl>
                                </li>
                            </ul>
                            <ul class="topiclist forums">

                                @foreach($type->topics as $topic)

                                <li class="row">
                                    <dl class="icon forum_read">
                                        <dt title="{{$topic->title}}">

                                            <span class="ico_forum_read"></span>

                                        <div class="list-inner">
                                            <a href="{{ url('topic/'.$topic->id) }}" class="forumtitle">{{$topic->title}}</a>
                                            <br />
                                            {{$topic->description}}
                                            <div class="responsive-show" style="display: none;">
                                                Thread: <strong>{{$topic->threads->count()}}</strong>
                                            </div>
                                        </div>
                                        </dt>
                                        <dd class="topics">{{$topic->threads->count()}}<dfn>Threads</dfn></dd>
                                        <?php
                                            $lastSubject = null;
                                            $postCount = 0;
                                            foreach($topic->threads as $thread){
                                                $postCount += 1;

                                                if($lastSubject == null){
                                                    $lastSubject = $topic->threads->last();
                                                    $lastType = 'thread';
                                                }
                                                else if($topic->threads->last()->updated_at > $lastSubject->updated_at){
                                                    $lastSubject = $topic->threads->last();
                                                    $lastType = 'thread';
                                                }

                                                foreach($thread->replies as $reply){
                                                    $postCount +=1;
                                                    if($reply->updated_at > $lastSubject->updated_at){
                                                        $lastType = 'reply';
                                                        $lastSubject = $reply;
                                                    }
                                                }
                                            }

                                        ?>
                                        <dd class="posts">{{$postCount}}<dfn>Posts</dfn></dd>
                                        <dd class="lastpost">
                                            <dfn>Last thread</dfn>

                                            <a href="   @if($lastType == 'thread')
                                                            {{url('topic/'.$lastSubject->topic->id.'/thread/'.$lastSubject->id)}}
                                                        @else
                                                            {{url('topic/'.$lastSubject->thread->topic->id.'/thread/'.$lastSubject->thread->id.'?page='.\App\Reply::where('thread_id',$lastSubject->thread->id)->paginate(10)->lastPage())}}
                                                        @endif
                                                "
                                               title="@if($lastType == 'thread') {{$lastSubject->title}} @else {{$lastSubject->thread->title}} @endif"
                                               class="lastsubject">
                                                @if($lastType == 'thread')
                                                    {{$lastSubject->title}}
                                                @else
                                                    @if(strpos($lastSubject->title, 'Re:') != 0)
                                                        Re: {{$lastSubject->title}}
                                                    @else
                                                        {{$lastSubject->title}}
                                                    @endif
                                                @endif
                                            </a>
                                            <br />
                                            by
                                            <a href="" style="color: @if($lastSubject->user->role->name == 'Administrator') #AA0000 @elseif($topic->topicModerators->find($lastSubject->user->id) != null) #00AA00 @endif ;" class="username-coloured">{{$lastSubject->user->nickname}}</a>
                                            {{$lastSubject->updated_at->format('d M Y, H:i')}}
                                        </dd>
                                    </dl>
                                </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            {{--End Forum List--}}

        </div>

        <div id="site-footer-area">

            <div class="chunk">
                <div class="grid-3">
                    <h3>Who is online</h3>
                    <p>
                        In total there are <strong> {{$totalOnline}} </strong> members online (based on members active over the past 5 minutes)
                        {{--::  registered and 1 guest (based on users active over the past 5 minutes)--}}
                        {{--<br />Most users ever online was <strong>51</strong> on 11 Apr 2017, 10:11--}}
                        <br /> <br /> <br /> <br />
                        Registered users:
                        @if($users)
                            @foreach($users as $user)
                                @if($user->isOnline())
                                    @if($user == $users->first())
                                        <a href="#">{{$user->nickname}}</a>
                                    @else
                                        , <a href="#">{{$user->nickname}}</a>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                        <br />Legend:
                        <a style="color:#AA0000" href="">Administrators</a>,
                        <a style="color:#00AA00" href="">Global moderators</a>,
                        <span style="color:#9E8DA7">Bots</span>,
                        <a href=".">Registered users</a>
                    </p>
                </div>

                <div class="grid-3">
                    <h5>About us</h5>
                    <p><strong>BIFOR</strong> was formed as a forum for discussion to the Bina Nusantara University's students to discuss the information being trending at the time, these things can be tasks, important information such as events, and so forth. <br /> <br /> In addition to acting as a means of communication among students, they can also see direct notifications from each department so that the information provided is very accurate and does not cause confusion that often occurs in our beloved university and there is also a feature to view the schedule of each lecture.</p>
                </div>
                <div class="grid-3">
                    <h5>You Must Know</h5>
                    <ul>
                        <li>
                            <a href="#">Our Rules</a>
                        </li>
                        <li>
                            <a href="#">Frequently Asked Questions</a>
                        </li>
                    </ul>
                </div>

                <div class="side-block" style="clear: both;">
                    <h4 class="side-block-head">Birthdays</h4>
                    <div class="side-block-body">
                        @if($todayBirthdays->count() == 0)
                            No birthdays today
                        @else
                            @foreach($todayBirthdays as $user)
                                @if($user == $todayBirthdays->first())
                                    <a href="#">{{$user->nickname}}</a>
                                @else
                                    , <a href="#">{{$user->nickname}}</a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>

            <div class="chunk">

                <div class="statistics-list">
                    <h3>Statistics</h3>
                    <div>
                        <div><span>Total topics <strong>{{$totalTopics}}</strong></span></div>
                        <div><span>Total posts <strong>{{$totalPosts}}</strong></span></div>
                        <div><span>Total members <strong>{{$totalUsers}}</strong></span></div>
                        <div><span>Our newest member <strong><a href="" class="username">{{$users->last()->nickname}}</a></strong></span></div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection