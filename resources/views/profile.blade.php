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

            <div id="subhead-title">
                <h2 class="topic-title">Viewing profile - {{$user->nickname}}</h2>
            </div>

        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk">
            <div id="viewprofile">
                <div class="panel bg1">
                    <div class="inner">

                        <dl class="left-box">
                            <dt class="profile-avatar"><img class="avatar" src="{{ asset('uploads/profile/'.$user->image) }}" width="80" height="80" alt="User avatar"></dt>
                            <dd style="text-align: center;">
                                @if($user->role->name == 'Administrator')
                                    Administrator
                                @elseif($isModerator == true)
                                    Moderator
                                @else
                                    Member
                                @endif
                            </dd>
                        </dl>

                        <dl class="left-box details profile-details">

                            <dt>NIM:</dt>
                            <dd>
                                <span style="font-weight: bold;">{{$user->nim}}</span>
                            </dd>
                            <dt>Fullname:</dt>
                            <dd>
                                <span style="font-weight: bold;">{{$user->fullname}}</span>
                            </dd>
                            <dt>Nickname:</dt>
                            <dd>
                                <span style="color: @if($user->role->name == 'Administrator') #AA0000 @elseif($isModerator == true) #00AA00 @endif ; font-weight: bold;">{{$user->nickname}}</span>
                            </dd>
                            <dt>&nbsp;</dt>
                            <dd>
                                <span><a href="{{ url('user/cpanel/profile/'.Auth::user()->id) }}">[edit profile]</a></span>
                            </dd>
                            @if($user->topicModerators->count() > 0)
                                <dt>Moderators:</dt>
                                <dd>
                                    <span>
                                        @foreach($user->topicModerators as $topicModerator)
                                            {{$topicModerator->topic->title}} <a href="{{ url('user/'.$user->id.'/removeModerator?topic_id='.$topicModerator->topic->id) }}"><i class="fa fa-remove"></i></a>,
                                        @endforeach
                                    </span>
                                </dd>
                            @endif

                            <dt>&nbsp;</dt>
                            @if(Auth::user()->role->id == 1 && $user->role->id != 1)
                                <form method="post" action="{{ url('user/'.$user->id.'/addModerator') }}">
                                    {{ csrf_field() }}
                                    <dd>
                                        <select name="topic_id">
                                            @foreach($topics as $topic)
                                                @if($topic->topicModerators->where('user_id', $user->id)->count() == 0)
                                                    <option value="{{$topic->id}}" >{{$topic->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <input type="submit" name="submit" value="Go" class="button2">
                                    </dd>
                                </form>
                            @endif
                        </dl>

                    </div>
                </div>

                <div class="panel bg2">
                    <div class="inner">

                        <div class="column1">
                            <h3>Contact {{$user->nickname}}</h3>
                            <dl class="details">
                                <dt>PM:</dt>
                                <dd><a href="">Send private message</a></dd>																								</dl>
                        </div>

                        <div class="column2">
                            <h3>User statistics</h3>
                            <dl class="details">
                                <dt>Joined:</dt> <dd>{{$user->created_at->format('d M Y, H:i')}}</dd>
                                <dt>Total posts:</dt>
                                <dd>{{$totalPost}} | <strong><a href="{{ url('user/profile/'.$user->id.'/search') }}">Search user’s posts</a></strong>
                                    <br>({{$postPercentage}} posts per day)
                                </dd>
                                <dt>Most active topic:</dt> <dd><strong><a href="{{ url('topic/'.$mostActiveTopic->id) }}">{{$mostActiveTopic->title}}</a></strong><br>({{$mostActiveTopicThreadCount}} Thread / {{round($mostActiveTopicThreadCount / $totalPost * 100, 2)}}% of user’s posts)</dd>
                                <dt>Most active thread:</dt> <dd><strong><a href="{{ url('topic/'.$mostActiveThread->topic->id.'/thread/'.$mostActiveThread->id) }}">{{$mostActiveThread->title}}</a></strong><br>({{$mostActiveThreadReplyCount}} Replies / {{round($mostActiveThreadReplyCount / $totalPost * 100, 2)}}% of user’s posts)</dd>
                            </dl>
                        </div>

                    </div>
                </div>

                @if($user->signature != null)
                <div class="panel bg1">
                    <div class="inner">

                        <h3>Signature</h3>

                        <div class="postbody"><div class="signature standalone">{!! $user->signature->content !!}</div></div>

                    </div>
                </div>
                @endif
                <div></div>
            </div>


        </div>
        <div class="chunk-main">



            <div class="dropdown-container dropdown-container-right dropdown-up dropdown-left dropdown-button-control" id="jumpbox">
		<span title="Jump to" class="dropdown-trigger button dropdown-select dropdown-toggle">
			Jump to		</span>
                <div class="dropdown hidden">
                    <div class="pointer"><div class="pointer-inner"></div></div>
                    <ul class="dropdown-contents">
                        <li><a href="./viewforum.php?style=5&amp;f=1">Main</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=2">Informations</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=3">General examples</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=5">Gramziu themes on ThemeForest</a></li>
                        <li><a href="./viewforum.php?style=5&amp;f=6">Themes</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=7">Hawiki</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=8">Ariki</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=9">Anami</a></li>
                        <li><a href="./viewforum.php?style=5&amp;f=10">Examples</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=11">Forum with long description</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=12">Forum with long description and subforums</a></li>
                        <li>&nbsp; &nbsp;&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=13">First subforum</a></li>
                        <li>&nbsp; &nbsp;&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=14">Second subforum</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=16">Locked forum with short description</a></li>
                        <li>&nbsp; &nbsp;<a href="./viewforum.php?style=5&amp;f=17">Locked forum with short description and moderator</a></li>
                        <li><a href="./viewforum.php?style=5&amp;f=4">Other</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

@endsection