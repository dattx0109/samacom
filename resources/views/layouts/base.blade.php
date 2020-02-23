<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    {!! SEOTools::generate() !!}

    <link rel="shortcut icon" type="image/png" href="{{asset('img/favicon.png')}}"/>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/fontawesome-pro.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style1.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Date picker 3 -->
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <!-- swiper js css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">

    <!-- Sass main CSS -->
    <style>
        .hove1{
            color: #8392a5;;
        }
         .hove1:hover {
            color: white;
        }
    </style>
    <link href="{{asset('css/sass/dist/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/partials.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/multi-select/bootstrap-multiselect.css')}}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129690324-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129690324-6');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KJHVQ85');</script>
    <!-- End Google Tag Manager -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(56018761, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/56018761" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    @yield('CSS')

</head>
<body id="page-top" class="no-skin-config">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJHVQ85"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top header-navbar" role="navigation">
        <a class="navbar-brand" href="/" data-toggle="tooltip" data-placement="bottom" title="Về trang chủ"><img src="{{asset('img/home/logo.png')}}"></a>
        <div id="navbar" class="mobile-hidden">
            <ul class="nav navbar-nav">
                <li class="{{ Request::routeIs('home') ? 'active' : '' }}"><a class="page-scroll" href="/"><i class="icon-home"></i>Trang Chủ </a></li>
                <li class="{{ Request::routeIs('list-job*') ? 'active' : '' }}"><a class="page-scroll" href="{{url('/danh-sach-cong-viec')}}"><i class="icon-briefcase"></i>Danh sách công việc</a></li>
                                <li class="{{ Request::routeIs('tla*') ? 'active' : '' }}"><a class="page-scroll" href="{{url('/tro-ly-ao')}}"><i class="fa fa-android"></i>Trợ lý ảo</a></li>
                <li class="{{ Request::routeIs('test*') ? 'active' : '' }}"><a class="page-scroll" href="{{url('/download-tai-lieu')}}"><i class="icon-folder"></i>Tài liệu </a></li>
            </ul>
        </div>
        <div class="header-tool mobile-hidden">
            {{--            <ul class="header-tool-list">--}}
{{--                <li>--}}
{{--                    <i class="fa fa-search"></i>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <i class="fa fa-bell"></i>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <i class="fa fa-archive"></i>--}}
{{--                </li>--}}
{{--            </ul>--}}
            @if(session()->has('user'))
                <div class="user-login">
                    <div class="dropdown">
                        @if(empty(session('user')->avatar))
                            <div class="user-avatar" style="background-image:url('{{asset('img/avatar_default.png')}}');">
                            </div>
                        @else
                            <div class="user-avatar" style="background-image:url('{{session('user')->avatar}}');"></div>
                        @endif
{{--                        <a href="#"><i class="fa fa-user"></i>&nbsp; {{session('user')->name}}</a>--}}
                        <div class="dropdown-content">
                            <div class="dropdown-inner dropdown-inner--max">
                                <a href="{{url('/account/update-detail')}}" class="dropdown-top">
                                    @if(empty(session('user')->avatar))
                                        <div class="dropdown__img m-r-15">
                                            <div class="dropdown__avatar" style="background-image:url('{{asset('img/avatar_default.png')}}');"></div>
                                        </div>
                                    @else
                                        <div class="dropdown__img m-r-15">
                                            <div class="dropdown__avatar" style="background-image:url('{{session('user')->avatar}}');"></div>
                                        </div>
                                    @endif
                                    <div class="dropdown__text">
                                        <div class="s-text4 m-b-4">{{session('user')->name}}</div>
                                        <div class="s-text8">{{session('user')->phone}}</div>
                                    </div>
                                </a>
                                <div class="dropdown-bottom">
                                    <a href="{{url('/account/update-detail')}}"><i class="icon-user-2"></i>Hồ sơ cá nhân</a>
                                    <a href="{{url('/change-password')}}"><i class="icon-unlock"></i> Thay đổi mật khẩu</a>
                                    <a href="{{url('/logout')}}"><i class="icon-logout"></i>Đăng xuất</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <ul class="menu-pc-auth display-flex-wrap aic">
                <li class="m-r-20">
                    <a href="{{url('/register')}}">Đăng ký</a>
                </li>
                <li>
                    <a href="{{url('/login')}}" class="button-primary">Đăng nhập</a>
                </li>
            </ul>
            @endif
        </div>
    </nav>
    <nav class="sub-menu">
        <ul id="profile-menu">
            <li class="active">
                <a data-toggle="tab" href="#profile_overview">Tổng quan</a>
            </li>
            <li>
                <a data-toggle="tab" href="#profile_detail">Thông tin chi tiết</a>
            </li>
        </ul>
    </nav>
</div>
<!-- Menu mobile -->
<div class="button-menu-mobile">
    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-menu" aria-expanded="false" aria-controls="navbar">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
    </button>
</div>
<div class="mobile-menu mobile-show collapse" id="mobile-menu">
    <div class="mobile-menu-inner">
        @if(session()->has('user'))
            <div class="mobile-profile has-chevron">
                @if(empty(session('user')->avatar))
                    <div class="mobile-profile__logo" style="background-image:url('{{asset('img/avatar_default.png')}}');">

                    </div>
                @else
                    <div class="mobile-profile__logo" style="background-image:url('{{session('user')->avatar}}');">

                    </div>
                @endif
                <div class="mobile-profile__text">
                    <div class="mobile-profile__name s-text19">{{session('user')->name}}</div>
                    <div class="mobile-profile__contact s-text8">{{session('user')->phone}}</div>
                </div>
                <i class="fal fa-chevron-right"></i>
            </div>
        @endif
        <div class="mobile-list">
            <ul class="m-list s-text16">
                <li class="has-chevron {{ Request::routeIs('home') ? 'active' : '' }}">
                    <a href="/">
                        <i class="icon-home m-r-10"></i>Trang chủ
                    </a>
                    <i class="fal fa-chevron-right"></i>
                </li>
                <li class="has-chevron {{ Request::routeIs('list-job*') ? 'active' : '' }}">
                    <a href="{{url('/danh-sach-cong-viec')}}">
                        <i class="icon-briefcase m-r-10"></i>Danh sách công việc
                    </a>
                    <i class="fal fa-chevron-right"></i>
                </li>
                <li class="has-chevron {{ Request::routeIs('test*') ? 'active' : '' }}">
                    <a href="{{url('/download-tai-lieu')}}">
                        <i class="icon-folder m-r-10"></i>Tài liệu
                    </a>
                    <i class="fal fa-chevron-right"></i>
                </li>
            </ul>
        </div>
        <div class="mobile-access">
            <ul class="m-list s-text16">
                @if(session()->has('user'))
                    <li class="has-chevron">
                        <a href="{{url('/account/update-detail')}}">
                            <i class="icon-user-2 m-r-10"></i>Hồ sơ cá nhân</a>
                        <i class="fal fa-chevron-right"></i>
                    </li>
                    <li class="has-chevron">
                        <a href="{{url('/change-password')}}">
                            <i class="icon-unlock m-r-10"></i>Đổi mật khẩu</a>
                        <i class="fal fa-chevron-right"></i>
                    </li>
                    <li class="has-chevron">
                        <a href="{{url('/logout')}}">
                            <i class="icon-logout m-r-10"></i>Đăng xuất</a>
                        <i class="fal fa-chevron-right"></i>
                    </li>
                @else
                    <li class="has-chevron">
                        <a href="{{url('/login')}}">
                            <i class="icon-user-2 m-r-10"></i>Đăng nhập</a>
                        <i class="fal fa-chevron-right"></i>
                    </li>
                    <li class="has-chevron">
                        <a href="{{url('/register')}}">
                            <i class="icon-user-1 m-r-10"></i>Đăng ký</a>
                        <i class="fal fa-chevron-right"></i>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

<div class="body-inner">
    @yield('content')
</div>

<div class="overlay-block"></div>

<footer>
    <div class="footer-page">
        <div class="footer-top">
            <ul class="footer-link">
                <li>
                    <a href="{{url('/dieu-khoan-chinh-sach')}}">Điều khoản sử dụng</a>
                </li>
{{--                <li>--}}
{{--                    <a href="">Chính sách bảo mật</a>--}}
{{--                </li>--}}
            </ul>
{{--            <div class="footer-expand"><i class="icon-add-2"></i>Mở rộng</div>--}}
        </div>
        <div class="footer-bottom">
            <div class="footer-copy">
                <img src="{{asset('img/home/footer.png')}}">
                <ul class="footer-social mobile-show m-t-10 w100">
                    <li>
                        <a  href="https://www.facebook.com/samacomvietnam/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a  href="https://www.linkedin.com/company/samacomvn/" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
{{--                    <li>--}}
{{--                        <a href=""><i class="fa fa-youtube-play"></i></a>--}}
{{--                    </li>--}}
                </ul>
                Copyright © 2019 Samacom. &nbsp; <a class="hove1" href="tel:02462663232" style="font-size: 14px;" >Hotline:(024).6266.3232. </a> <a class="hove1" href="tel:0981005858" style="font-size: 14px;"> &nbsp;Hotline cho Ứng viên/Doanh nghiệp: (+84)98.100.5858. </a> <a class="hove1" style="font-size: 14px;" target="_blank" rel="noopener noreferrer" href="mailto:info@samacom.com.vn"> &nbsp;Email: info@samacom.com.vn</a>
            </div>
            <ul class="footer-social mobile-hidden">
                <li>
                    <a  href="https://www.facebook.com/samacomvietnam/" target="_blank"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/company/samacomvn/" target="_blank"><i class="fa fa-linkedin"></i></a>
                </li>
{{--                <li>--}}
{{--                    <a href=""><i class="fa fa-youtube-play"></i></a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</footer>


<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
{{--<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>--}}
<script src="{{asset('js/plugins/wow/wow.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('js/plugins/toastr/toastr.min.js')}}"></script>

<!-- Data picker -->
<script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

<!-- login javascript -->
<script src="{{asset('js_service/login.js')}}"></script>
<script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>
@yield('javascript-vue')
<script src="{{asset('js/plugins/multi-select/bootstrap-multiselect.min.js')}}"></script>

<script>
    $(document).ready(function () {

        // Check scroll top when scrolling
        var previousScroll = 0;
        $(window).scroll(function(){
            var currentScroll = $(this).scrollTop();

            if (previousScroll > currentScroll && currentScroll > 0){
                $('.header-navbar').removeClass('header-navbar--hidden');
                $('.sub-menu').removeClass('sub-menu--top0');
                $('.page-menu').removeClass('page-menu--top0');
            }
            else if(currentScroll == 0){
                $('.header-navbar').removeClass('header-navbar--hidden');
                $('.sub-menu').removeClass('sub-menu--top0');
                $('.page-menu').removeClass('page-menu--top0');
            }
            else{
                $('.header-navbar').addClass('header-navbar--hidden');
                $('.sub-menu').addClass('sub-menu--top0');
                $('.page-menu').addClass('page-menu--top0');
            }

            previousScroll = currentScroll;

        });

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
            header = document.querySelector( '.navbar-default' ),
            didScroll = false,
            changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // mobile menu active
    $('.navbar-toggle--solid').on('click', function () {
        $('.overlay-block').addClass('is-show');
        $('.mobile-menu').addClass('is-active');
    });
    $('.overlay-block, .navbar-toggle--cross').on('click', function () {
        $('.overlay-block').removeClass('is-show');
        $('.mobile-menu').removeClass('is-active');
    });

    // menu hamburger
    $('.navbar-toggle').on('click', function () {
       $(this).toggleClass('navbar-toggle--solid')
        $(this).toggleClass('navbar-toggle--cross')
    });

    $('.multi-select-block').multiselect();

    // ​$(".multiselect-selected-text").text(function () {
    //     return $(this).text().replace("None selected", "Lựa chọn");
    // });​​​​​

    // $('.chosen-select').chosen({
    //     width: "100%",
    //     "disable_search": true
    // });
    $('[data-toggle="tooltip"]').tooltip()

</script>


@yield('javascript')
@yield('javascript-fillter-job')
</body>
</html>
