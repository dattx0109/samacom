<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Landing page SMC</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <!-- swiper js css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">

    <!-- Landing page -->
    <link href="{{asset('scss/landing-page.css')}}" rel="stylesheet">

</head>
<body>

  <div class="smc-landing-page">

    <div class="header">
        <a href="#" class="logo"><img src="{{ asset('img/landing-page/logo.png') }}" alt=""></a>
        <ul class="menu-desktop list-unstyled list-inline">
          <li>
            <a href="#tongquan" class="">Tổng quan</a>
          </li>
          <li>
            <a href="#dichvu" class="">Dịch vụ của chúng tôi</a>
          </li>
          <li>
            <a href="#trainghiem" class="">Trải nghiệm khách hàng</a>
          </li>
        </ul>

        <a href="javascript:;" class="menu-toggle-mobile">
          <span></span>
          <span></span>
          <span></span>
        </a>

        <div class="menu menu-mobile">
          <a href="javascript:;" class="close">
            <span></span>
            <span></span>
          </a>
          <ul class="list-unstyled list-inline">
            <li>
              <a href="#tongquan">Tổng quan</a>
            </li>
            <li>
              <a href="#dichvu">Dịch vụ của chúng tôi</a>
            </li>
            <li>
              <a href="#trainghiem">Trải nghiệm khách hàng</a>
            </li>
          </ul>
        </div>

        <div class="smc-header-mobile-backdrop"></div>
    </div>

    <div class="banner" id="tongquan">
      <a href="#" style="background-image: url('{{ asset('img/landing-page/banner.png') }}')">
        <img src="{{ asset('img/landing-page/banner.png') }}" />
      </a>
    </div>

    <div class="section section-one">
      <div class="container">
        <div class="row">
          <div class="col-md-4 item">
            <div class="image">
              <img src="{{ asset('img/landing-page/s1-image1.png') }}" />
            </div>
            <div class="counter"  data-count="500000">
              500,000+
            </div>
            <div class="text">
              Truy cập/tháng
            </div>
          </div>
          <div class="col-md-4 item">
            <div class="image">
              <img src="{{ asset('img/landing-page/s1-image2.png') }}" />
            </div>
            <div class="counter" data-count="11348">
              11,384+
            </div>
            <div class="text">
              Ứng viên
            </div>
          </div>
          <div class="col-md-4 item">
            <div class="image">
              <img src="{{ asset('img/landing-page/s1-image3.png') }}" />
            </div>
            <div class="counter" data-count="234">
              234+
            </div>
            <div class="text">
              Đối tác
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section section-two">
        <div class="container">
          <div class="row">
            <h4 class="title-small">Chúng tôi tự hào đã giúp 234 Doanh nghiệp</h4>
            <h3 class="title">Tìm được nhân sự Sale thành công</h3>
            <div class="list-item">
              <div class="col-md-4 item">
                <div class="image">
                  <img src="{{ asset('img/landing-page/s2-image1.png') }}" alt="">
                </div>
                <div class="text">
                  <h4 class="text-title-small">Ưu điểm</h4>
                  <h3 class="text-title">Nhanh chóng</h3>
                </div>
              </div>

              <div class="col-md-4 item">
                <div class="image">
                  <img src="{{ asset('img/landing-page/s2-image2.png') }}" alt="">
                </div>
                <div class="text">
                  <h4 class="text-title-small">Tính năng</h4>
                  <h3 class="text-title">Hiệu quả</h3>
                </div>
              </div>

              <div class="col-md-4 item">
                <div class="image">
                  <img src="{{ asset('img/landing-page/s2-image3.png') }}" alt="">
                </div>
                <div class="text">
                  <h4 class="text-title-small">Chi phí</h4>
                  <h3 class="text-title">Hợp lý</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="section section-three" id="dichvu">
      <div class="container">
        <div class="row">
          <h3 class="title text-center">Dịch vụ của chúng tôi</h3>
          <div class="list-item">
            <div class="item">
              <div class="col-md-6 image">
                <img src="{{ asset('img/landing-page/s3-image1.png') }}" alt="">
              </div>
              <div class="col-md-6 text">
                <h3 class="text-title">Gói đăng tin</h3>
                <div class="description">
                  Cam kết 25 apply trong 10 ngày. Đảm bảo hoàn tiền nếu không hoàn thành cam kết với Doanh nghiệp.
                </div>
                <a href="{{url('/goi-dang-tin')}}" class="read-more">Tìm hiểu thêm</a>
              </div>
            </div>

            <div class="item item-even">
              <div class="col-md-6 image">
                <img src="{{ asset('img/landing-page/s3-image2.png') }}" alt="">
              </div>
              <div class="col-md-6 text">
                <h3 class="text-title">Gói lọc CV</h3>
                <div class="description">
                  Đặc biệt phù hợp với các công ty cần đội ngũ Sales đông đảo như Bất động sản, Bảo hiểm,.. <br />
                  Tiết kiệm 90% chi phí tuyển dụng nhân sự
                </div>
                <a href="{{url('/goi-loc-cv')}}" class="read-more">Tìm hiểu thêm</a>
              </div>
            </div>

            <div class="item">
              <div class="col-md-6 image">
                <img src="{{ asset('img/landing-page/s3-image3.png') }}" alt="">
              </div>
              <div class="col-md-6 text">
                <h3 class="text-title">Gói combo</h3>
                <div class="description">
                  Dành cho các Doanh nghiệp đang trong tình trạng khan hiếm nhân lực Sales. <br />
                  Hỗ trợ Doanh nghiệp tăng hiệu quả tuyển dụng đồng thời giúp quảng bá thương hiệu.
                </div>
                <a href="{{url('/goi-combo')}}" class="read-more">Tìm hiểu thêm</a>
              </div>
            </div>

            <div class="item item-even">
              <div class="col-md-6 image">
                <img src="{{ asset('img/landing-page/s3-image4.png') }}" alt="">
              </div>
              <div class="col-md-6 text">
                <h3 class="text-title">Gói ứng viên tham dự phỏng vấn</h3>
                <div class="description">
                  Áp dụng với những Doanh nghiệp sử dụng gói đăng tin tại Samacom, tăng tỷ lệ Ứng viên tham dự phỏng vấn tới 90%
                </div>
                <a href="{{url('/goi-ung-vien')}}" class="read-more">Tìm hiểu thêm</a>
              </div>
            </div>

            <div class="item">
              <div class="col-md-6 image">
                <img src="{{ asset('img/landing-page/s3-image5.png') }}" alt="">
              </div>
              <div class="col-md-6 text">
                <h3 class="text-title">Gói nhân sự tiêu chuẩn</h3>
                <div class="description">
                  Cam kết 1 đổi 1 trong 10  ngày <br />
                  Cam kết đưa đến cho doanh nghiệp Ứng viên đúng với nhu cầu và mong muốn của Doanh nghiệp.
                </div>
                <a href="{{url('/goi-nhan-su-tc')}}" class="read-more">Tìm hiểu thêm</a>
              </div>
            </div>

            <div class="item item-even">
              <div class="col-md-6 image">
                <img src="{{ asset('img/landing-page/s3-image6.png') }}" alt="">
              </div>
              <div class="col-md-6 text">
                <h3 class="text-title">Gói đào tạo</h3>
                <div class="description">
                  Giúp doanh nghiệp nâng cao 200% doanh số trong thời gian ngắn nhất.<br />
                  Giáo án và chương trình đào tạo được thiết kế dành riêng cho từng Doanh nghiệp
                </div>
                <a href="{{url('/goi-dao-tao')}}" class="read-more">Tìm hiểu thêm</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section section-four"  style="background-image: url('{{ asset('img/landing-page/quote.png') }}'), url('{{ asset('img/landing-page/quote.png') }}');">
          <div class="container">
            <div class="row">
              <div class="box-top" style="background-image: url('{{ asset('img/landing-page/s4-bg.png') }}')">
                <div class="search">
                  <h2 class="title">Tìm kiếm hồ sơ</h2>
                  <div class="list-item">
                    <div class="item">
                      <div class="icon">
                        <img src="{{ asset('img/landing-page/icon-building.png') }}" alt="">
                      </div>
                      <div class="text">
                        Chọn tỉnh/thành phố
                      </div>
                    </div>

                     <div class="item">
                      <div class="icon">
                        <img src="{{ asset('img/landing-page/icon-building.png') }}" alt="">
                      </div>
                      <div class="text">
                        Chọn quận/huyện
                      </div>
                    </div>


                     <div class="item">
                      <div class="icon">
                        <img src="{{ asset('img/landing-page/icon-flag.png') }}" alt="">
                      </div>
                      <div class="text">
                        Phân nhóm sales
                      </div>
                    </div>

                     <div class="item">
                      <div class="icon">
                        <img src="{{ asset('img/landing-page/icon-date.png') }}" alt="">
                      </div>
                      <div class="text">
                        Năm sinh
                      </div>
                    </div>

                     <div class="item">
                      <div class="icon">
                        <img src="{{ asset('img/landing-page/icon-time.png') }}" alt="">
                      </div>
                      <div class="text">
                        Thời gian cập nhật
                      </div>
                    </div>

                    <div class="item">
                      <div class="icon">
                        <img src="{{ asset('img/landing-page/icon-sex.png') }}" alt="">
                      </div>
                      <div class="text">
                        Giới tính
                      </div>
                    </div>

                  </div>
                  <div class="action">
                    <a href="{{url('/goi-loc-cv')}}" class="filter">Lọc hồ sơ ngay</a>
                  </div>
                </div>
                <div class="image">
                  <img src="{{ asset('img/landing-page/s4-image.png') }}" alt="">
                </div>
              </div>

              <div class="customer-experience" id="trainghiem">
                <h3 class="title">Trải nghiệm khách hàng về Samacom</h3>
                <div class="swiper-container customer-experience-swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="item">
                        <div class="quote">
                          <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">
                        </div>
                        <div class="description">
                          Sản phẩm đào tạo của Samacom đã giúp lãnh đạo và nhân viên công ty hiểu nhau hơn, đoàn kết hơn. Năng lượng và hiệu quả làm việc toàn đội tăng 200% doanh số tăng gấp đôi sau 2 tháng đào tạo
                        </div>
                        <div class="user-info">
                          <div class="avatar" style="overflow: hidden">
                            <img src="{{ asset('img/landing-page/anh3.jpg') }}" style="height: 60px" alt="">
                          </div>
                          <div class="info">
                            <div class="name">Ms Linda</div>
                            <div class="company">Công ty NEVADA</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="item">
                        <div class="quote">
                          <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">
                        </div>
                        <div class="description">
                          Samacom mang lại một trải nghiệm dịch vụ rất khác biệt từ khâu xác định nhu cầu của doanh nghiệp đến thực thi tuyển dụng. Chúng tôi đã tuyển được những Sales thực chiến nhất từ đây
                        </div>
                        <div class="user-info">
                          <div class="avatar" style="overflow:hidden;">
                            <img src="{{ asset('img/landing-page/anh2.jpg') }}" alt="">
                          </div>
                          <div class="info">
                            <div class="name">Ms Vân Anh</div>
                            <div class="company">Công ty TNHH Sơn Hồng Kiều</div>
                          </div>
                        </div>
                      </div>
                    </div>
{{--                   <div class="swiper-slide">--}}
{{--                      <div class="item">--}}
{{--                        <div class="quote">--}}
{{--                          <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="description">--}}
{{--                          Sản phẩm đào tạo của Samacom đã giúp lãnh đạo và nhân viên công ty hiểu nhau hơn, đoàn kết hơn. Năng lượng và hiệu quả làm việc toàn đội tăng 200% doanh số tăng gấp đôi sau 2 tháng đào tạo--}}
{{--                        </div>--}}
{{--                        <div class="user-info">--}}
{{--                          <div class="avatar">--}}
{{--                            <img src="{{ asset('img/landing-page/avatar.png') }}" alt="">--}}
{{--                          </div>--}}
{{--                          <div class="info">--}}
{{--                            <div class="name">Ms Linda</div>--}}
{{--                            <div class="company">Công ty NEVADA</div>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                      <div class="item">--}}
{{--                        <div class="quote">--}}
{{--                          <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="description">--}}
{{--                          Samacom mang lại một trải nghiệm dịch vụ rất khác biệt từ khâu xác định nhu cầu của doanh nghiệp đến thực thi tuyển dụng. Chúng tôi đã tuyển được những Sales thực chiến nhất từ đây--}}
{{--                        </div>--}}
{{--                        <div class="user-info">--}}
{{--                          <div class="avatar" style="overflow: hidden">--}}
{{--                            <img src="{{ asset('img/landing-page/anh2.jpg') }}" alt="">--}}
{{--                          </div>--}}
{{--                          <div class="info">--}}
{{--                            <div class="name">Ms Vân Anh</div>--}}
{{--                            <div class="company">Công ty TNHH Sơn Hồng Kiều</div>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    </div>--}}
                    <div class="swiper-slide">
                      <div class="item">
                        <div class="quote">
                          <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">
                        </div>
                        <div class="description">
                          Sản phẩm đào tạo của Samacom đã giúp lãnh đạo và nhân viên công ty hiểu nhau hơn, đoàn kết hơn. Năng lượng và hiệu quả làm việc toàn đội tăng 200% doanh số tăng gấp đôi sau 2 tháng đào tạo
                        </div>
                        <div class="user-info">
                          <div class="avatar" style="overflow:hidden;">
                            <img src="{{ asset('img/landing-page/anh4.jpg') }}" alt="">
                          </div>
                          <div class="info">
                            <div class="name">Ms Linda</div>
                            <div class="company">Công ty NEVADA</div>
                          </div>
                        </div>
                      </div>
                    </div>
{{--                    <div class="swiper-slide">--}}
{{--                      <div class="item">--}}
{{--                        <div class="quote">--}}
{{--                          <img src="{{ asset('img/landing-page/quote-small.png') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="description">--}}
{{--                          Samacom mang lại một trải nghiệm dịch vụ rất khác biệt từ khâu xác định nhu cầu của doanh nghiệp đến thực thi tuyển dụng. Chúng tôi đã tuyển được những Sales thực chiến nhất từ đây--}}
{{--                        </div>--}}
{{--                        <div class="user-info">--}}
{{--                          <div class="avatar">--}}
{{--                            <img src="{{ asset('img/landing-page/avatar.png') }}" alt="">--}}
{{--                          </div>--}}
{{--                          <div class="info">--}}
{{--                            <div class="name">Ms Vân Anh</div>--}}
{{--                            <div class="company">Công ty TNHH Sơn Hồng Kiều</div>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    </div>--}}
                  </div>
                  <!-- Add Pagination -->
                  <div class="swiper-pagination"></div>
                </div>
              </div>
          </div>
        </div>

    </div>

    <div class="section-info">
      <ul class="list-inline list-unstyled left">
        <li><a href="{{url('/dieu-khoan-chinh-sach')}}">Điều khoản sử dụng</a></li>
      </ul>
    </div>


    <div class="footer">
      <div class="footer-left">
        <a href="#" class="logo">
           <img src="{{ asset('img/landing-page/logo-footer.png') }}" alt="">
        </a>
        <div class="copyright">
          Copyright © 2019 Samacom. All rights reserved.
        </div>
      </div>
      <ul class="list-unstyled list-inline footer-right">
        <li>
          <a target="_blank" href="https://www.facebook.com/samacomvietnam/"><i class="fa fa-facebook"></i></a>
        </li>
        <li>
          <a target="_blank" href="https://www.linkedin.com/company/samacomvn/"><i class="fa fa-linkedin"></i></a>
        </li>
{{--        <li>--}}
{{--          <a href="#"><i class="fa fa-youtube-play"></i></a>--}}
{{--        </li>--}}
      </ul>
    </div>

    <a href="javascript:;" class="back-to-top">
      <img src="{{ asset('img/landing-page/back-to-top.png') }}" alt="">
    </a>

     <ul class="list-unstyled social-fix-right">
        <li class="phone">
          <a href="javascript:;">
            <div class="image">
              <img src="{{ asset('img/landing-page/icon-phone.png') }}" alt="">
            </div>
            <div class="info">
              (024).6266.3232
            </div>
          </a>
        </li>
        <li class="register">
          <a href="javascript:;"  data-toggle="modal"
          data-target="#smcModalRegister">
            <div class="image">
              <img src="{{ asset('img/landing-page/icon-edit.png') }}" alt="">
            </div>
            <div class="info">
              Tư vấn ngay
            </div>
          </a>
        </li>
      </ul>


  </div>
  <div
      class="modal fade smc-modal-register"
{{--      data-backdrop="static"--}}
{{--      data-keyboard="false"--}}
      id="smcModalRegister"
      role="dialog"
  >
      <div class="modal-dialog">
          <div class="modal-content">

              <div class="modal-body">
                  <div class="smc-form">
                      <a href="#" data-dismiss="modal" class="close" id="close_modal">
                          <!-- <i class="fa fa-times"></i> -->
                          x
                      </a>
                      <div>
                          <div class="modal-title">
                              Đăng ký tư vấn
                          </div>
                      </div>
                      <form class="" action="" method="" id="form-advisory">
                          <div class="form-group">
                              <label for="name">Họ và tên</label>
                              <input type="text" class="form-control" id="name">
                              <div class="error-create-advisory error_name"></div>
                          </div>

                          <div class="form-group">
                              <label for="phone">Số điện thoại</label>
                              <input type="text" class="form-control" id="phone">
                              <div class="error-create-advisory error_phone"></div>
                          </div>

                          <div class="form-group">
                              <label for="email">Địa chỉ email</label>
                              <input type="text" class="form-control" id="email">
                              <div class="error-create-advisory error_email"></div>
                          </div>

                          <div class="form-group">
                              <label for="name_company">Tên doanh nghiệp</label>
                              <input type="text" class="form-control" id="name_company">
                              <div class="error-create-advisory error_name_company"></div>
                          </div>

                          <div class="text-right">
                              <button type="button" class="smc-button" id="btn_submit" >
                                  Gửi yêu cầu
                              </button>
                          </div>
                      </form>
                  </div>
              </div>

          </div>
      </div>
  </div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/plugins/wow/wow.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

<script type="text/javascript">
        jQuery(document).ready(function(){
            $(document).ready(function(){
                // Add scrollspy to <body>
                $('body').scrollspy({target: ".menu-desktop", offset: 50});
                console.log(111)
                // Add smooth scrolling on all links inside the navbar
                $("li a").on('click', function(event) {
                    console.log(1112222)
                    // Make sure this.hash has a value before overriding default behavior

                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 800, function(){
                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    }  // End if
                });
            });
    $('.header .menu-toggle-mobile').click(function(){
      $('.header .smc-header-mobile-backdrop').addClass('active');
      $('.header .menu-mobile').addClass('active');
    });

    $('.header .smc-header-mobile-backdrop, .header .menu-mobile .close').click(function(){
      $('.header .smc-header-mobile-backdrop').removeClass('active');
      $('.header .menu-mobile').removeClass('active');
    });

    $('.counter').each(function() {
      var $this = $(this),
      countTo = $this.attr('data-count');

      $({ countNum: $this.text()}).animate({
        countNum: countTo
      },

      {
        duration: 5000,
        easing:'linear',
        step: function() {
          $this.text(numberWithCommas(Math.floor(this.countNum)));
        },
        complete: function() {
          $this.text(numberWithCommas(this.countNum) + "+");
        }
      });
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $('.back-to-top').on('click', function () {
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });

    $(window).on('scroll', function () {
        var scrollTop = $(window).scrollTop();
        if(scrollTop > 600){
          $('.back-to-top').addClass('active');
        }else{
          $('.back-to-top').removeClass('active');
        }
    });

    var swiper = new Swiper('.customer-experience-swiper', {
      slidesPerView: 2,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        768: {
          slidesPerView: 1,
          spaceBetween: 40
        }
      }
    });

  });
</script>
<script src="{{asset('js_service/landing-page.js')}}"></script>
</body>
</html>
