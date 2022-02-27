<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width,&#32;initial-scale=1.0" />

    @yield('title')

    <meta http-equiv=”content-language” content=”vi” />
    <meta name="keywords" content="{{ $_meta_keywords ?? 'cửa kính cường lực' }}" />
    <meta name=’revisit-after’ content=’1 days’ />

    <link href=”favicon.ico” rel=”shortcut icon” type=”image/x-icon” />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="{{ asset('') }}">

    <link rel="icon" type="image/png" href="/favicon.ico" />

    <link href="/lib/Content/cssc852.css?v=RK23pIWKolpaTcMpIexJZaNffU1BZ_m0pnGWDeAZtBo1" rel="stylesheet" />

    <?php if(isset($sliders[0]->img_path)) {?>

    <meta property=”og:image” content="{{ $_meta_image ?? $sliders[0]->img_path }}"" />

    <meta itemprop=”image” content=”{{ $sliders[0]->img_path }}“>

    <?php }?>
    <meta property=" fb:admins" content="${{ $_meta_facebook_admin_id??''}}" />
    <meta property="fb:app_id" content="{{ $_meta_facebook_app_id ?? '' }}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="vi_VN" />
    <meta property=”og:title” content="{{ $_meta_title ?? '' }}" />
    <meta property=”og:description” content="{{ $_meta_description ?? '' }}" />
    <meta property="og:url" content="{{ $_meta_url??''}}" />
    <meta property="article:section" content="{{ $_meta_article_section ?? '' }}" />
    <meta property="article:tag" content="{{ $_meta_article_tag ?? '' }}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RNH06C3YR5"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());



        gtag('config', 'G-RNH06C3YR5');
    </script>

    @yield('css')

</head>

<body>

    <div id="wrapper">

        <div id="wrapper-in">

            @include('inc.header')

            <div class="clr"></div>

            <div id="main-content">

                @yield('content')

            </div>

            <div class="clr"></div>

            @include('inc.footer')

        </div>

    </div>

			<a href="#" class="scroll-to-top"><i class="fa fa-angle-up"></i></a>
			<script src="/lib/bundles/modernizr8fce?v=wBEWDufH_8Md-Pbioxomt90vm6tJN2Pyy9u9zHtWsPo1"></script><script src="/lib/bundles/topJS25b8?v=Ws8Syh5_ltoiPSznW-zwN98mBnzmqE3Li1MQxQKfviA1"></script><script src="/lib/assets/js/jquery.lazyload.min.js"></script>
			<script src="/lib/bundles/mainJS6eb1?v=qhSC3X9pRh1c750IrQJb4LetvRbI2jTFQRRxMM5OyL81"></script>
			@yield('js')

    <!-- Load Facebook SDK for JavaScript -->

    {{-- <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v8.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';

            fjs.parentNode.insertBefore(js, fjs);

        }(document, 'script', 'facebook-jssdk'));
    </script> --}}



    <!-- Your Chat Plugin code -->

    <div class="fb-customerchat" attribution=setup_tool page_id="1504028633166318" theme_color="#0A7CFF"
        logged_in_greeting="Hi! How can we help you?" logged_out_greeting="Hi! How can we help you?">

    </div>

</body>

</html>
