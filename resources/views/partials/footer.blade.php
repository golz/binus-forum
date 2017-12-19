<div id="wrap-footer">
    <div id="site-footer">
        <div class="chunk">

            <div id="foot-left">
                <ul class="site-footer-nav" role="menubar">
                    <li><a href="{{ url('/') }}" data-navbar-reference="index">Board index</a></li>
                    <li class="icon-delete-cookies"><a href="{{ url('clear-cache') }}">Clear caches</a></li>
                    <li class="icon-team" data-last-responsive="true"><a href="" role="menuitem">The team</a></li>
                    <li class="icon-contact" data-last-responsive="true"><a href="" role="menuitem">Contact us</a></li>
                </ul>

                <ul id="foot-social">
                    <li>
                        <a href="#">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-github"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="foot-center">
                <a href="#bifor">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>

            <div id="foot-right">
                <ul>
                    <li>All times are <abbr title="{{Config::get('app.timezone')}}">{{Config::get('app.timezone')}}</abbr></li>
                    <li>It is currently {{ date('d M Y H:i') }}</li>
                </ul>
            </div>

            <div id="foot-copyright">
                Powered by BIFOR&reg;
                <br />Forum by <a href="http://github.com/golz">Goldwin</a>
            </div>
        </div>
    </div>

    <div id="darkenwrapper" data-ajax-error-title="AJAX error" data-ajax-error-text="Something went wrong when processing your request." data-ajax-error-text-abort="User aborted request." data-ajax-error-text-timeout="Your request timed out; please try again." data-ajax-error-text-parsererror="Something went wrong with the request and the server returned an invalid reply.">
        <div id="darken">&nbsp;</div>
    </div>

    <div id="phpbb_alert" class="phpbb_alert" data-l-err="Error" data-l-timeout-processing-req="Request timed out.">
        <a href="#" class="alert_close"></a>
        <h3 class="alert_title">&nbsp;</h3><p class="alert_text"></p>
    </div>
    <div id="phpbb_confirm" class="phpbb_alert">
        <a href="#" class="alert_close"></a>
        <div class="alert_text"></div>
    </div>

    <div style="display: none;">
        <a id="bottom" class="anchor" accesskey="z"></a>
    </div>
</div>