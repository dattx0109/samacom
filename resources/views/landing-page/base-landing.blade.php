<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Samacom</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('img/favicon.png')}}"/>
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
    <link href="{{asset('css/sass/dist/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/partials.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/multi-select/bootstrap-multiselect.css')}}" rel="stylesheet">
    @yield('CSS')

</head>
<body id="page-top" class="no-skin-config">
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top header-navbar" role="navigation">
        <a class="navbar-brand" href="/"><img src="{{asset('img/home/logo.png')}}"></a>
        <div id="navbar" class="mobile-hidden">
            <ul class="nav navbar-nav">
                <li class="{{ Request::routeIs('/') ? 'active' : '' }}"><a class="page-scroll" href="#">Tổng quan </a></li>
                <li class="{{ Request::routeIs('list-job*') ? 'active' : '' }}"><a class="page-scroll" href="#">Dịch vụ của chúng tôi</a></li>
                <li class="{{ Request::routeIs('test*') ? 'active' : '' }}"><a class="page-scroll" href="#">Trải nghiệm khách hàng </a></li>
            </ul>
        </div>
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-menu" aria-expanded="false" aria-controls="navbar">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
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
<div class="mobile-menu mobile-show collapse" id="mobile-menu">
    <div class="mobile-list">
        <ul class="m-list s-text16">
            <li class="has-chevron {{ Request::routeIs('/') ? 'active' : '' }}">
                <a href="#">Tổng quan</a>
            </li>
            <li class="has-chevron {{ Request::routeIs('list-job*') ? 'active' : '' }}">
                <a href="#">Dịch vụ của chúng tôi
                </a>
            </li>
            <li class="has-chevron {{ Request::routeIs('test*') ? 'active' : '' }}">
                <a href="#">Trải nghiệm khách hàng</a>
            </li>
        </ul>
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
                        <a target="_blank" href="https://www.facebook.com/samacomvietnam/"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.linkedin.com/company/samacomvn/"><i class="fa fa-linkedin"></i></a>
                    </li>
{{--                    <li>--}}
{{--                        <a href=""><i class="fa fa-youtube-play"></i></a>--}}
{{--                    </li>--}}
                </ul>
                Copyright © 2019 Samacom. All rights reserved.
            </div>
            <ul class="footer-social mobile-hidden">
                <li>
                    <a target="_blank" href="https://www.facebook.com/samacomvietnam/"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a target="_blank" href="https://www.linkedin.com/company/samacomvn/"><i class="fa fa-linkedin"></i></a>
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

</script>
@yield('javascript')
@yield('javascript-fillter-job')
</body>
</html>

