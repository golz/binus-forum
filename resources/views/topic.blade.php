@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="{{ route('home') }}">Board index</a></span>
                    <span class="crumb"><a href="">NAMA TOPIC</a></span>
                </li>

                @include('partials.burger-menu')

            </ul>
        </div>
    </div>

    <a id="start_here" class="anchor"></a>

    <div id="wrap-subhead">
        <div class="chunk">

            <div id="subhead-title">

                <h2 class="forum-title">Judul Topic</h2>

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

                        <div class="buttons">

                            <a href="./posting.php?style=5&amp;mode=post&amp;f=2" class="button font-icon" title="Post a new topic">
                                <i class="fa fa-pencil"></i>New Topic					</a>

                        </div>

                        <div class="pagination">
                            1 topic
                            &bull; Page <strong>1</strong> of <strong>1</strong>
                        </div>

                    </div>




                    <div class="forumbg announcement">
                        <div class="inner">
                            <ul class="topiclist">
                                <li class="header">
                                    <dl class="icon">
                                        <dt><div class="list-inner">Announcements</div></dt>
                                    </dl>
                                </li>
                            </ul>
                            <ul class="topiclist topics">


                                <li class="row bg1 global-announce">
                                    <dl class="icon global_read">
                                        <dt title="No unread posts">

                                            <span class="ico_global_read"></span>

                                        <div class="list-inner">
                                            <a href="" class="topictitle">Welcome</a><br />
                                            <span class="topic-ap"><i class="fa fa-floppy-o"></i></span>
                                            by
                                            <a href="" style="color: #AA0000;" class="username-coloured">Gramziu</a> &raquo; 24 Feb 2015, 21:50
                                            <div class="r-lastpost-container">
                                                <a href="" title="Go to last post" class="r-lastpost"><i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                        </dt>
                                        <dd class="posts">0 <dfn>Replies</dfn></dd>
                                        <dd class="views">46487 <dfn>Views</dfn></dd>
                                        <dd class="lastpost"><span><dfn>Last post </dfn>
                                            by
                                            <a href="" style="color: #AA0000;" class="username-coloured">Gramziu</a>
                                            <span class="lastpostavatar">
                                                <img class="avatar" src="" width="30" height="30" alt="User avatar" />
                                            </span>
                                            <a href="" title="Go to last post" class="lastpost-last"><i class="fa fa-arrow-right"></i></a>
                                            <br />24 Feb 2015, 21:50</span>
                                        </dd>
                                    </dl>
                                </li>
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

                                <li class="row bg2">
                                    <dl class="icon topic_read">
                                        <dt title="No unread posts">

                                            <span class="ico_topic_read"></span>

                                        <div class="list-inner">
                                            <a href="{{ url('thread/1999') }}" class="topictitle">TESTING YANG INI AJA</a><br />

                                            by <a href="" style="color: #AA0000;" class="username-coloured">Goldwin</a> &raquo; 24 Feb 2015, 20:20
                                            <div class="r-lastpost-container">
                                                <a href="" title="Go to last post" class="r-lastpost"><i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                        </dt>
                                        <dd class="posts">0 <dfn>Replies</dfn></dd>
                                        <dd class="views">20951 <dfn>Views</dfn></dd>
                                        <dd class="lastpost"><span><dfn>Last post </dfn>
                                            by
                                            <a href="" style="color: #AA0000;" class="username-coloured">Gramziu</a>
                                            <span class="lastpostavatar">
                                                <img class="avatar" src="" width="30" height="30" alt="User avatar" />
                                            </span>
                                            <a href="" title="Go to last post" class="lastpost-last">
                                                <i class="fa fa-arrow-right"></i>
                                            </a> <br />24 Feb 2015, 20:20</span>
                                        </dd>
                                    </dl>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <form method="post" action="">
                        {{ csrf_field() }}
                        <fieldset class="display-options">
                            <label>Sort by
                                <select name="sk" id="sk">
                                    <option value="a">Author</option>
                                    <option value="t" selected="selected">Post time</option>
                                    <option value="r">Replies</option><option value="s">Subject</option>
                                    <option value="v">Views</option>
                                </select>
                            </label>
                            <label>
                                <select name="sd" id="sd">
                                    <option value="a">Ascending</option>
                                    <option value="d" selected="selected">Descending</option>
                                </select>
                            </label>
                            <input type="submit" name="sort" value="Go" class="button2" />
                        </fieldset>
                    </form>

                    <div class="action-bar bottom">
                        <div class="buttons">

                            <a href="" class="button font-icon" title="Post a new topic">
                                <i class="fa fa-pencil"></i>
                                New Topic
                            </a>

                        </div>

                        <div class="pagination">
                            1 topic
                            &bull; Page <strong>1</strong> of <strong>1</strong>
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