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
            <div id="sidebar">{{--Begin Sidebar--}}
                <div class="side-block">
                    <img src="{{ asset('images/greater-nusantara.png') }}" alt="Greater Nusantara" style="border-radius: 3px;padding:30px;filter:grayscale(100%);">
                </div>

                <div class="side-block side-login">
                    <form method="post" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h4 class="side-block-head"><a href="{{ route('login') }}">Login</a>&nbsp; &bull; &nbsp;<a href="{{ route('register') }}">Register</a></h4>
                        <div class="side-block-body">
                            <fieldset>
                                <input type="text" tabindex="1" name="username" id="username" size="10" class="inputbox" title="Username" placeholder="Username" />
                                <div class="error">
                                    @if($errors->has('username'))
                                        {{$errors->first('username')}}
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

                <div class="side-block">
                    <h4 class="side-block-head">Posts</h4>
                    <div class="side-block-body" id="sidebar-recent-posts"></div>
                </div>
            </div>{{--End Sidebar--}}
            @foreach($types as $type)

            <div id="forumlist">{{--Begin Forum List--}}
                <div id="forumlist-inner">

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
                                        <dt title="No unread posts">

                                            <span class="ico_forum_read"></span>

                                        <div class="list-inner">
                                            <!-- <a class="feed-icon-forum" title="Feed - Informations" href="http://gramziu.pl/phpBB/feed.php?f=2"><img src="./styles/anami/theme/images/feed.gif" alt="Feed - Informations" /></a> -->
                                            <a href="{{ url('topic/'.$topic->id) }}" class="forumtitle">{{$topic->title}}</a>
                                            <br />{{$topic->description}}.
                                            <div class="responsive-show" style="display: none;">
                                                Topics: <strong>2</strong>
                                            </div>
                                        </div>
                                        </dt>
                                        <dd class="topics">2<!--TODO count thread--><dfn>Topics</dfn></dd>
                                        <dd class="posts">2<dfn>Posts<!--TODO count all post--></dfn></dd>

                                        <dd class="lastpost">
                                            <dfn>Last post</dfn>
                                            <!--<a href="" title="Welcome" class="lastsubject">Welcome</a>
                                            <br />
                                            by
                                            <a href="" style="color: #AA0000;" class="username-coloured">Goldwin</a>
                                            -->
                                            <!--TODO disini tambahnin lastpost $topic->thread::orderBy('created_at', 'desc')->first();-->
                                            24 Feb 2015, 21:50
                                        </dd>

                                    </dl>
                                </li>
                                @endforeach
<!--


                                <li class="row">
                                    <dl class="icon forum_read_locked">
                                        <dt title="Forum locked">

                                            <span class="ico_forum_read_locked"></span>

                                        <div class="list-inner"> -->
                                            <!-- <a class="feed-icon-forum" title="Feed - General examples" href="http://gramziu.pl/phpBB/feed.php?f=3"><img src="./styles/anami/theme/images/feed.gif" alt="Feed - General examples" /></a> -->
<!--                                            <a href="" class="forumtitle">The lounge</a>
                                            <br />Examples of topics, you can see here how everything works.
                                            <div class="responsive-show" style="display: none;">
                                                Topics: <strong>6</strong>
                                            </div>
                                        </div>
                                        </dt>
                                        <dd class="topics">6<dfn>Topics</dfn></dd>
                                        <dd class="posts">45<dfn>Posts</dfn></dd>
                                        <dd class="lastpost">
                                            <dfn>Last post</dfn>
                                            <a href="" title="Re: Popular topic" class="lastsubject">
                                                Re: Popular topic
                                            </a>
                                            <br />
                                            by
                                            <a href="" style="color: #00AA00;" class="username-coloured">Nicholas</a> 07 Dec 2015, 20:03
                                        </dd>
                                    </dl>
                                </li>
                                -->
                            </ul>
                        </div>
                    </div>
@endforeach
<!--
                    <div class="forabg">
                        <div class="inner">
                            <ul class="topiclist">
                                <li class="header">

                                    <dl class="icon">
                                        <dt>
                                            <div class="list-inner">
                                                <a href="">Department</a>
                                            </div>
                                        </dt>
                                    </dl>

                                </li>
                            </ul>
                            <ul class="topiclist forums">

                                <li class="row">
                                    <dl class="icon forum_read">
                                        <dt title="No unread posts">

                                            <span class="ico_forum_read"></span>

                                        <div class="list-inner">
                                            <a href="" class="forumtitle">School of Computer Science</a>
                                            <br />Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium autem blanditiis facilis in ipsam odio reiciendis repellat veniam veritatis vitae! Adipisci assumenda enim exercitationem fuga fugit neque nostrum soluta sunt?.
                                            <div class="responsive-show" style="display: none;">
                                                Topics: <strong>1</strong>
                                            </div>
                                        </div>
                                        </dt>
                                        <dd class="topics">1<dfn>Topics</dfn></dd>
                                        <dd class="posts">2<dfn>Posts</dfn></dd>
                                        <dd class="lastpost">
                                            <dfn>Last post</dfn>
                                            <a href="" title="Re: Sample" class="lastsubject">
                                                Re: Sample
                                            </a>
                                            <br />
                                            by
                                            <a href="" class="username">Zamziu</a>
                                            07 Dec 2015, 20:20
                                        </dd>
                                    </dl>
                                </li>

                                <li class="row">
                                    <dl class="icon forum_read_subforum">
                                        <dt title="No unread posts">

                                            <span class="ico_forum_read_subforum"></span>

                                        <div class="list-inner">-->
                                            <!-- <a class="feed-icon-forum" title="Feed - Forum with long description and subforums" href="http://gramziu.pl/phpBB/feed.php?f=12"><img src="./styles/anami/theme/images/feed.gif" alt="Feed - Forum with long description and subforums" /></a> -->
<!--                                            <a href="" class="forumtitle">School of Information System</a>

                                            <br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            <br />

                                            <strong>Subforums:</strong>
                                            <a href="" class="subforum read" title="No unread posts">First subforum</a>,
                                            <a href="" class="subforum read" title="No unread posts">Second subforum</a>

                                            <br />
                                            <strong>Moderator:</strong>
                                            <a href="" style="color: #AA0000;" class="username-coloured">Gramziu</a>
                                            <div class="responsive-show" style="display: none;">
                                                Topics: <strong>1</strong>
                                            </div>
                                        </div>

                                        </dt>
                                        <dd class="topics">1<dfn>Topics</dfn></dd>
                                        <dd class="posts">2<dfn>Posts</dfn></dd>
                                        <dd class="lastpost">
                                            <dfn>Last post</dfn>
                                            <a href="" title="Re: Another example" class="lastsubject">Re: Another example</a>
                                            <br />
                                            by
                                            <a href="" class="username">Famziu</a>
                                            07 Dec 2015, 20:42
                                        </dd>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>{{--End Forum List--}}
        </div>
-->
        <div id="site-footer-area">
            <div class="chunk">


                <div class="grid-3">
                    <h3>Who is online</h3>
                    <p>
                        In total there are <strong>2</strong> users online :: 1 registered, 0 hidden and 1 guest (based on users active over the past 5 minutes)<br />Most users ever online was <strong>51</strong> on 11 Apr 2017, 10:11
                        <br /> <br />
                        Registered users:
                        <a href="" class="username">Grettaeloma</a>
                        <br />Legend:
                        <a style="color:#AA0000" href="">Administrators</a>,
                        <a style="color:#00AA00" href="">Global moderators</a>,
                        <span style="color:#9E8DA7">Bots</span>,
                        <a href=".">Registered users</a>
                    </p>
                </div>


                <div class="grid-3">
                    <h5>About us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br /><br />Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
                        No birthdays today									</div>
                </div>

            </div>

            <div class="chunk">

                <div class="statistics-list">
                    <h3>Statistics</h3>
                    <div>
                        <div><span>Total posts <strong>156</strong></span></div>
                        <div><span>Total topics <strong>26</strong></span></div>
                        <div><span>Total members <strong>2393</strong></span></div>
                        <div><span>Our newest member <strong><a href="./memberlist.php?style=5&amp;mode=viewprofile&amp;u=2461" class="username">MichaelEnall</a></strong></span></div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection