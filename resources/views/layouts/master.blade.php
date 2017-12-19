<!DOCTYPE html>
<html dir="ltr" lang="en-gb">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BIFOR - Binus Forum</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/apple-touch-icon-precomposed.gif') }}">
    <link rel="icon" href="{{ asset('images/favicon.gif') }}" />
    <link rel="icon" sizes="16x16" href="{{ asset('favicon.ico') }}" />

    <link href="{{ asset('css/font.css') }}" rel="stylesheet" type="text/css" media="screen, projection" />

    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="screen, projection" />
    <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet" type="text/css" media="screen, projection" />
    <link href="{{ asset('css/colours.css') }}" rel="stylesheet" type="text/css" media="screen, projection" />

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('plugins/ckeditor/ckeditor.js')}}"></script>

</head>
<body id="bifor" class="nojs notouch section-index ltr ">

    <div id="overall-wrap">

        @include('partials.header')

        @yield('content')

        @include('partials.footer')

        <script>
            $(function() {
                $("#st, #sd, #sk, #ch").chosen({
                    disable_search: true,
                    width: "auto"
                });
            });
        </script>

        <script>
            $(function() {

                var sidebarRecentPostDiv = document.getElementById("sidebar-recent-posts");

//                $.get('http://gramziu.pl/phpBB/feed.php', function (data) {
//                    $(data).find("entry").each(function (i) {
//                        var el = $(this);
//                        var entryWrap = document.createElement("div");
//
//                        var entryTitle = document.createElement("a");
//                        var entryAuthor = document.createElement("span");
//                        var entryContent = document.createElement("span");
//
//                        entryTitle.className = ("sidebar-recent-title");
//                        entryAuthor.className = ("sidebar-recent-author");
//                        entryContent.className = ("sidebar-recent-content");
//
//                        function cutText(name) {
//                            var elementText = el.find(name).text();
//
//                            if (name == "title") {
//                                elementText = elementText.substring(elementText.indexOf("•") + 2);
//                            } else if (name == "content") {
//                                elementText = elementText.replace(/(<([^>]+)>)/ig,"");
//                            }
//
//                            if (elementText.length > 50) {
//                                return elementText.substr(0, 50);
//                            } else {
//                                return elementText;
//                            };
//                        };
//
//                        entryTitle.textContent = cutText("title");
//                        entryAuthor.textContent = "by " + cutText("author");
//                        entryContent.textContent = cutText("content");
//                        entryURL = el.find("id").text();
//
//                        $(entryTitle).attr("href", entryURL);
//
//                        entryWrap.appendChild(entryTitle);
//                        entryWrap.appendChild(entryAuthor);
//                        entryWrap.appendChild(entryContent);
//
//                        sidebarRecentPostDiv.appendChild(entryWrap);
//
//                        if (++i >= 5) {
//                            return false;
//                        }
//                    });
//                });

            });
        </script>

        <script type="text/javascript" src="{{ asset('js/forum_fn.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/chosen.jquery.min.js') }}"></script>

    </div>

</body>
</html>
