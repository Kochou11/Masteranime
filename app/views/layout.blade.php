<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Masteranime - {{ $title or 'Stream anime in HD'}}</title>
    <link rel="icon" type="image/ico" href={{ asset
    ('favicon.icon') }}/>
    <meta name="description" content=<?php if (isset($description)) {
        echo '"' . $description . '"';
    } else {
        echo '"Masteranime allows you to stream anime at high quality for desktop, tablet and mobile users! We also offer cool features like auto-updating your own MyAnimeList!"';
    } ?>>
    <meta name="keywords"
          content="masteranime, watch, anime, online, hd, high quality, stream, mobile, tablet, 720p, anime videos, watch subbed anime, english subs, animelist, ongoing, completed">

    <!-- for Facebook -->
    <meta property="og:image" content={{
    $social_image or asset('img/masteranime_logo.png') }}/>
    <meta property="og:title" content=<?php if (isset($title)) {
        echo '"' . $title . '"';
    } else {
        '"MasterAnime - Stream anime in HD"';
    } ?>/>
    <meta property="og:description" content=<?php if (isset($description)) {
        echo '"' . $description . '"';
    } else {
        echo '"Masteranime allows you to stream anime at high quality for desktop, tablet and mobile users! We also offer cool features like auto-updating your own MyAnimeList!"';
    } ?>/>
    <meta property="og:url" content=<?php echo '"' . URL::current() . '"' ?>/>
    <meta property="og:site_name" content="Masteranime"/>
    <meta property="og:type" content="website"/>

    <!-- for Twitter -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content=<?php if (isset($title)) {
        echo '"' . $title . '"';
    } else {
        '"MasterAnime - Stream anime in HD"';
    } ?>/>
    <meta name="twitter:description" content=<?php if (isset($description)) {
        echo '"' . $description . '"';
    } else {
        echo '"Masteranime allows you to stream anime at high quality for desktop, tablet and mobile users! We also offer cool features like auto-updating your own MyAnimeList!"';
    } ?>/>
    <meta name="twitter:image" content={{
    $social_image or asset('img/masteranime_logo.png') }} />

    <!-- CSS -->
    @section('custom-css')
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300|Roboto+Condensed|Roboto' rel='stylesheet'
          type='text/css'>
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    <!--[if IE 7]>
    {{ HTML::style('css/font-awesome-ie7.min.css') }}
    <![endif]-->
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/animate.css') }}
    {{ HTML::style('css/prettyPhoto.css') }}
    {{ HTML::style('css/photoswipe.css') }}
    {{ HTML::style('css/dl-menu.css') }}
    {{ HTML::style('css/custom.css') }}
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300"/>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto"/>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed"/>
    {{ HTML::style('css/lte-ie8.css') }}
    <![endif]-->
    @show


    <!-- Scripts-->
    @section('custom-js')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{ HTML::script('js/modernizr.custom.65274.js') }}
    {{ HTML::script('js/jquery.migrate.js') }}
    <!--[if (gte IE 6)&(lte IE 8)]>
    {{ HTML::script('js/selectivizr-min.js') }}
    <![endif]-->
    {{ HTML::script('js/min/bootstrap.js') }}
    {{ HTML::script('js/retina.js') }}
    {{ HTML::script('js/masonry2108.js') }}
    {{ HTML::script('js/mobile_detector.js') }}
    {{ HTML::script('js/jquery.prettyPhoto.js') }}
    {{ HTML::script('js/klass.min.js') }}
    {{ HTML::script('js/photoswipe.js') }}
    {{ HTML::script('js/reveal.js') }}
    {{ HTML::script('js/min/jquery.dlmenu.js') }}
    {{ HTML::script('js/fullscreenr.js') }}
    {{ HTML::script('js/jquery.easyticker.js') }}
    <!--[if lte IE 10]>
    {{ HTML::script('js/jquery.color.js') }}
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function () {
            $("[data-toggle=popover]").popover();
            $("[data-toggle=tooltip]").tooltip({ placement: 'top'});
            $("[data-toggle=tooltip-bottom]").tooltip({ placement: 'bottom'});
        });
    </script>
    @show
</head>
<body>
<div class="met_page_wrapper met_fixed_header clearfix">
    <header class="clearfix">
        <div class="met_header_head">
            <div class="met_content">
                <div class="row-fluid">
                    <div class="span12">
                        <a target="_blank" href="https://www.facebook.com/masteranidotme" data-toggle="tooltip-bottom"
                           title="Like us" class="pull-left met_color_transition met_header_head_link"><i
                                class="icon-facebook"></i></a>
                        <a target="_blank" href="https://twitter.com/masteranidotme" data-toggle="tooltip-bottom"
                           title="Follow us" class="pull-left met_color_transition met_header_head_link"><i
                                class="icon-twitter"></i></a>
                        <a href="#" data-toggle="tooltip-bottom" title="MyAnime"
                           class="pull-left met_color_transition met_header_head_link"><i
                                style="font-size: 18px; margin-left: -0.1em;" class="icon-heart"></i></a>

                        <div id="dl-menu" class="dl-menuwrapper">
                            <button>Open Menu</button>
                            <ul class="dl-menu">
                                {{ HTML::menu_link (array( array("route" => "/", "text" => "HOME") ) ) }}
                                {{ HTML::menu_link(array(array("route" => "anime/latest", "text" => "LATEST ANIME"))) }}
                                {{ HTML::menu_link(array(array("route" => "anime", "text" => "ANIME LIST"))) }}
                                <?php
                                if (Sentry::check()) {
                                    $user = Sentry::getUser();
                                    echo HTML::menu_link(array(array("route" => 'account', "text" => 'account - ' . $user->username), array("route" => 'account', "text" => 'settings'), array("route" => 'account/logout', "text" => 'LOG OUT')));
                                } else {
                                    echo HTML::menu_link(array(array("route" => 'account', "text" => 'SIGN IN'), array("route" => 'account/register', "text" => 'SIGN UP')));
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /dl-menuwrapper -->
                    </div>
                </div>
            </div>
        </div>
        <div class="met_content">
            <div class="row-fluid">
                <div class="span12">
                    <a href="{{ URL::to('/') }}" class="met_logo_container pull-left scrolled">{{
                        HTML::image('img/masteranime_logo.png', 'masteranime Logo') }}</a>

                    <div class="met_header_search_box"></div>
                    <ul class="met_main_menu pull-right scrolled">
                        {{ HTML::menu_link (array( array("route" => "/", "text" => "HOME") ) ) }}
                        {{ HTML::menu_link(array(array("route" => "anime/latest", "text" => "LATEST ANIME"))) }}
                        {{ HTML::menu_link(array(array("route" => "anime", "text" => "ANIME LIST"))) }}
                        <?php
                        if (Sentry::check()) {
                            $user = Sentry::getUser();
                            echo HTML::menu_link(array(array("route" => 'account', "text" => 'account - ' . $user->username), array("route" => 'account', "text" => 'settings'), array("route" => 'account/logout', "text" => 'LOG OUT')));
                        } else {
                            echo HTML::menu_link(array(array("route" => 'account', "text" => 'SIGN IN'), array("route" => 'account/register', "text" => 'SIGN UP')));
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    @yield('anime-header')
    <section class="met_content clearfix" style="margin-top: 30px;">
        @yield('content')
    </section>
</div>

@if ((isset($footer) && $footer) || !isset($footer))
<footer class="clearfix">
    <div class="met_footer_footer clearfix">
        <div class="met_content">
            <a href="{{ URL::to('/') }}" class="pull-left">{{ HTML::image('img/masteranime_logo.png', 'masteranime
                Logo') }}</a>

            <p class="pull-left">© 2014 MASTERANIME by Nex. All Rights Reserved.</p>
            <ul class="met_footer_menu pull-right">
                {{ HTML::menu_link (array( array("route" => "/", "text" => "HOME") ) ) }}
                {{ HTML::menu_link(array(array("route" => "anime", "text" => "ANIME LIST"))) }}
            </ul>
        </div>
    </div>
</footer>
@endif
<div id="back-to-top" class="off back-to-top-off"></div>
</body>
</html>
