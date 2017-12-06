@extends('layouts.master')

@section('content')

    <div id="site-nav" role="navigation">
        <div class="chunk">
            <ul class="site-nav" role="menubar">

                <li class="breadcrumbs">
                    <span class="crumb"><a href="{{ route('home') }}">Board index</a></span>
                    <span class="crumb"><a href="">NAMA TOPIC</a></span>
                    <span class="crumb"><a href="">NAMA THREAD</a></span>
                </li>

                @include('partials.burger-menu')

            </ul>
        </div>
    </div>

    <a id="start_here" class="anchor"></a>

    <div id="wrap-subhead">
        <div class="chunk">

            <div id="subhead-title">
                <h2 class="topic-title"><a href="./viewtopic.php?style=5&amp;f=7&amp;t=17">Sample</a></h2>


            </div>

            <div class="search-box">
                <form method="get" id="topic-search" action="./search.php?style=5">
                    <fieldset>
                        <input class="inputbox search"  type="search" name="keywords" id="search_keywords" size="20" placeholder="Search this topic…" />
                        <button class="button" type="submit" title="Search"><i class="fa fa-search"></i></button>
                        <input type="hidden" name="t" value="17" />
                        <input type="hidden" name="sf" value="msgonly" />
                        <input type="hidden" name="style" value="5" />

                    </fieldset>
                </form>
            </div>

        </div>
    </div>

    <div id="wrap-body">
        <div class="chunk-main">


            <div class="action-bar top">

                <div class="buttons">

                    <a href="" class="button font-icon" title="Post a reply">
                        <i class="fa fa-reply"></i>Closed?				</a>

                </div>

                <div class="dropdown-container dropdown-button-control topic-tools">
                    <span title="Topic tools" class="button icon-button tools-icon dropdown-trigger dropdown-select"><i class="fa fa-wrench"></i></span>
                    <div class="dropdown hidden">
                        <div class="pointer"><div class="pointer-inner"></div></div>
                        <ul class="dropdown-contents">
                            <li class="font-icon icon-subscribe">
                                <a href="./viewtopic.php?style=5&amp;uid=2500&amp;f=7&amp;t=17&amp;watch=topic&amp;start=0&amp;hash=18f0f5a8" class="watch-topic-link" title="Subscribe topic" data-ajax="toggle_link" data-toggle-class="font-icon icon-unsubscribe" data-toggle-text="Unsubscribe topic" data-toggle-url="./viewtopic.php?style=5&amp;uid=2500&amp;f=7&amp;t=17&amp;unwatch=topic&amp;start=0&amp;hash=18f0f5a8" data-update-all=".watch-topic-link"><i class="fa fa-eye"></i>Subscribe topic</a>
                            </li>
                            <li class="font-icon icon-bookmark">
                                <a href="./viewtopic.php?style=5&amp;f=7&amp;t=17&amp;bookmark=1&amp;hash=18f0f5a8" class="bookmark-link" title="Bookmark topic" data-ajax="alt_text" data-alt-text="Remove from bookmarks" data-update-all=".bookmark-link"><i class="fa fa-bookmark"></i>Bookmark topic</a>
                            </li>
                            <li class="font-icon icon-sendemail"><a href="./memberlist.php?style=5&amp;mode=email&amp;t=17" title="Email topic"><i class="fa fa-envelope"></i>Email topic</a></li>				<li class="font-icon icon-print"><a href="./viewtopic.php?style=5&amp;f=7&amp;t=17&amp;view=print" title="Print view" accesskey="p"><i class="fa fa-print"></i>Print view</a></li>							</ul>
                    </div>
                </div>


                <div class="pagination">
                    2 posts
                    &bull; Page <strong>1</strong> of <strong>1</strong>
                </div>


            </div>




            <div id="p56" class="post has-profile bg2">
                <div class="inner">

                    <dl class="postprofile" id="profile56">
                        <dt class="has-profile-rank has-avatar">
                        <div class="avatar-container">
                            <a href="./memberlist.php?style=5&amp;mode=viewprofile&amp;u=2" class="avatar"><img class="avatar" src="./download/file.php?avatar=2_1424820906.png" width="80" height="80" alt="User avatar" /></a>																				</div>


                        <a href="./memberlist.php?style=5&amp;mode=viewprofile&amp;u=2" style="color: #AA0000;" class="username-coloured">Gramziu</a>

                        </dt>


                        <dd class="profile-rank">Site Admin</dd>

                        <dd class="profile-posts"><strong>Posts:</strong> <a href="./search.php?style=5&amp;author_id=2&amp;sr=posts">60</a></dd>				<dd class="profile-joined"><strong>Joined:</strong> 25 Feb 2015, 03:20</dd>


                        <dd class="profile-contact">
                            <strong>Contact:</strong>
                            <a class="contact-icon contact-icon-pm" href="./ucp.php?style=5&amp;i=pm&amp;mode=compose&amp;action=quotepost&amp;p=56" title="Send private message">Send private message
                            </a>
                        </dd>

                    </dl>

                    <div class="postbody">
                        <div id="post_content56">


                            <h3 class="first"><a href="#p56">Sample</a></h3>



                            <ul class="posts-buttons">
                                <li>
                                    <a href="./report.php?style=5&amp;f=7&amp;p=56" title="Report this post"><i class="fa fa-flag"></i><span>Report this post</span></a>
                                </li>
                                <li>
                                    <a href="./posting.php?style=5&amp;mode=quote&amp;f=7&amp;p=56" title="Reply with quote"><i class="fa fa-quote-left"></i><span>Quote</span></a>
                                </li>
                            </ul>



                            <p class="author"><a href="./viewtopic.php?style=5&amp;p=56#p56">02 Oct 2015, 00:36</a> </p>




                            <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>



                            <div id="sig56" class="signature">Do you remember the userbar thing?</div>
                        </div>

                    </div>
                </div>
            </div>

            <hr class="divider" />
            <div id="p70" class="post has-profile bg1">
                <div class="inner">

                    <dl class="postprofile" id="profile70">
                        <dt class="no-profile-rank has-avatar">
                        <div class="avatar-container">
                            <a href="./memberlist.php?style=5&amp;mode=viewprofile&amp;u=51" class="avatar"><img class="avatar" src="./download/file.php?avatar=51_1449519549.jpg" width="80" height="80" alt="User avatar" /></a>																				</div>


                        <a href="./memberlist.php?style=5&amp;mode=viewprofile&amp;u=51" class="username">Zamziu</a>

                        </dt>




                        <dd class="profile-posts"><strong>Posts:</strong> <a href="./search.php?style=5&amp;author_id=51&amp;sr=posts">1</a></dd>				<dd class="profile-joined"><strong>Joined:</strong> 08 Dec 2015, 02:58</dd>


                        <dd class="profile-contact">
                            <strong>Contact:</strong>
                            <a class="contact-icon contact-icon-pm" href="./ucp.php?style=5&amp;i=pm&amp;mode=compose&amp;action=quotepost&amp;p=70" title="Send private message">Send private message
                            </a>
                        </dd>

                    </dl>

                    <div class="postbody">
                        <div id="post_content70">


                            <h3 ><a href="#p70">Re: Sample</a></h3>



                            <ul class="posts-buttons">
                                <li>
                                    <a href="./report.php?style=5&amp;f=7&amp;p=70" title="Report this post"><i class="fa fa-flag"></i><span>Report this post</span></a>
                                </li>
                                <li>
                                    <a href="./posting.php?style=5&amp;mode=quote&amp;f=7&amp;p=70" title="Reply with quote"><i class="fa fa-quote-left"></i><span>Quote</span></a>
                                </li>
                            </ul>



                            <p class="author"><a href="./viewtopic.php?style=5&amp;p=70#p70">08 Dec 2015, 03:20</a> </p>




                            <div class="content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>




                        </div>

                    </div>
                </div>
            </div>

            <hr class="divider" />

        </div>
        <div class="chunk">
            <form method="post" action="./posting.php?style=5&amp;mode=reply&amp;f=7&amp;t=17" id="qr_postform">
                <div class="panel">
                    <div class="inner">
                        <fieldset class="fields1">
                            <div class="qr-subject">
                                <input type="text" name="subject" id="subject" size="45" maxlength="124" tabindex="2" value="Re: Sample" class="inputbox autowidth" placeholder="Subject" />
                            </div>
                            <div id="message-box">
                                <textarea style="height: 9em;" name="message" rows="7" cols="76" tabindex="3" class="inputbox" placeholder="Message"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="submit-buttons">
                            <input type="submit" accesskey="s" tabindex="7" name="post" value="Submit" class="button1" />
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
        <div class="chunk-main">

            <form id="viewtopic" method="post" action="./viewtopic.php?style=5&amp;f=7&amp;t=17">
                <fieldset class="display-options" style="margin-top: 0; ">
                    <label>Sort by
                        <select name="sk" id="sk">
                            <option value="a">Author</option>
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

            <p class="jumpbox-return"><a href="./viewforum.php?style=5&amp;f=7" class="left-box arrow-left" accesskey="r">Return to “NAMA DEPARTMENT/TOPICCCCCCCCCCCCCCCCCCCCCC”</a></p>

        </div>

        <div id="site-footer-area" class="site-footer-forum">
            <div class="chunk">

            </div>
        </div>

    </div>

@endsection