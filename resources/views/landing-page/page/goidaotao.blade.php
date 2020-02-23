@extends('landing-page.base-landing')
@section('content')
    <section class="page-banner" style="background-image: url('{{asset('img/job/BackgroundHeader.png')}}')">

    </section>
    <section class="page-detail p-b-80">
        <div class="container">
            <div class="page-block display-flex-wrap detail-info-block m-b-30">
                <div class="col-md-6 m-b-20">
                    <img src="{{asset('img/page/Group1.png')}}">
                </div>
                <div class="col-md-6">
                    <h6 class="page-block__title m-text1 m-b-0 m-b-15 m-r-20">
                        GÓI ĐÀO TẠO
                    </h6>
                    <br>
                    <div class="social-list">
                        <div class="list-item__m-title s-text1 m-b-20" style="font-size: 30px;">
                            1,2 <span class="s-text1">tr &nbsp;<img style="margin-top: -8px;" src="{{asset('img/landing-page/muiten.png')}}" alt="">  &nbsp; </span>
                            8,5 <span class="s-text1">tr</span>
                        </div>
                        <span>
                            Phù hợp với các Doanh nghiệp luôn trong tình trạng thiếu nhân sự Sales, giúp gia tăng hiệu quả tuyển dụng, đồng thời giúp quảng bá thương hiệu của Doanh nghiệp đến đông đảo các Ứng viên của Samacom
                        </span>
                    </div>
                    <br>
{{--                    <div class="list-item__link">--}}
{{--                        <a href="#" class="button-primary">Xem chi tiết</a>--}}
{{--                    </div>--}}
                </div>
            </div>
            <form action="{{url('/advisory-package-6')}}" method="post">
            <div class="page-block m-b-30">
                <div class="s-text2 m-b-20">Danh sách gói sản phẩm</div>
                <div class="mobile-block">
                    <div class="page-filter-item1 select-wrapper ">
                        <select onchange="getval(this);" name="date_update" id="date_update" class="chosen-select chosen-select-no-search primary-select1 mw170">
                            <option selected>Chọn loại gói</option>
                            <option value="14">Gói Spro gia tốc (2 ngày)</option>
                            <option value="15">Gói SPro Inhouse</option>
                            {{--                            <option value="2">Đăng tin cam kết sale thị trường</option>--}}
                            {{--                            <option value="3">Đăng tin Sale leader/Giám sát</option>--}}
                            {{--                            <option value="4">Đăng tin ưu tiên</option>--}}
                        </select>
                    </div>
                    <div class="divPage page14"
                         style="margin-top: 10px;border: 1px solid #D3DBE5;">
                        <div class="click main" >
                            <input type="radio" value="14" hidden>
                            <img src="{{asset('img/page/Group 466.png')}}" style="width: 25%;margin-bottom: 10px;margin-left: 35%;margin-top: 15px" alt="">
                            <span style="display: block;text-align: center">Gói Spro gia tốc (2 ngày)</span>
                            <span style="display: block;text-align: center" class="o-label">  699.000/học viên</span>

                        </div>
                    </div>
                    <div class="divPage page15"
                         style="margin-top: 10px;border: 1px solid #D3DBE5;">
                        <div class="click ">
                            <input type="radio" value="15" hidden>
                            <img src="{{asset('img/page/Group 468.png')}}" style="width: 25%;margin-bottom: 10px;margin-left: 35%;margin-top: 15px" alt="">
                            <span style="display: block;text-align: center">Gói SPro Inhouse</span>
                            <span style="display: block;text-align: center" class="o-label"> 7.500.000 - 90.000.000 (tuỳ thuộc vào nhu cầu và tình trạng doanh nghiệp). Với gói này chúng tôi sẽ nghiên cứu cụ thể, chi tiết vấn đề tại doanh nghiệp của bạn. Tìm ra nguyên nhân và giải pháp phù hợp nhất cho doanh nghiệp.</span>
                        </div>
                    </div>

                </div>
                <div class="page-display-none" style="">
                    <div class=" click " id="camket" style="width: 30%;margin-right: 15%;padding: 10px">
                        <input type="radio" value="14" hidden>
                        <img src="{{asset('img/page/Group 466.png')}}" style="float: left;width: 20%;">
                        <div class="" style="margin-left: 30%;line-height: 30px">
                            <span class="s-text18"
                                  style="display: block;">Gói Spro gia tốc (2 ngày)</span>
                            <span class="o-label s-text16"> 699.000/học viên </span>

                        </div>
                    </div>
                    <div class=" click " id="camket1" style="width: 30%;padding: 10px">
                        <input type="radio" value="15" hidden>
                        <img src="{{asset('img/page/Group 468.png')}}" style="float: left;width: 20%;">
                        <div class="" style="margin-left: 30%;line-height: 30px">
                            <span class="s-text18" style="display: block;">Gói SPro Inhouse </span>
                            <span class="o-label s-text16"> 7.500.000 - 90.000.000 .</span>
                        </div>
                    </div>
                    {{--                    <div class=" click with33">--}}
                    {{--                        <input type="radio" value="" hidden>--}}
                    {{--                        <img src="{{asset('img/page/Group 467.png')}}" style="float: left;width: 25%;">--}}
                    {{--                        <div class="" style="margin-left: 30%;line-height: 30px">--}}
                    {{--                            <span class="s-text18" style="display: block;">Đăng tin cam kết sale thị trường</span>--}}
                    {{--                            <span class="o-label s-text16"> Hạn 20 ngày - 8 Apply</span>--}}
                    {{--                            <span class="o-label s-text16"> Chi phí 8.000.000đ</span>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class=" click with33">--}}
                    {{--                        <input type="radio" value="" hidden>--}}
                    {{--                        <img src="{{asset('img/page/Group 469.png')}}" style="float: left;width: 25%;">--}}
                    {{--                        <div class="" style="margin-left: 30%;line-height: 30px">--}}
                    {{--                            <span class="s-text18" style="display: block;">Đăng tin Sale leader/Giám sát</span>--}}
                    {{--                            <span class="o-label s-text16"> 8 apply trong 20 ngày</span>--}}
                    {{--                            <span class="o-label s-text16"> Chi phí 5.000.000đ</span>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class=" click with33">--}}
                    {{--                        <input type="radio" value="" hidden>--}}
                    {{--                        <img src="{{asset('img/page/Group 470.png')}}" style="float: left;width: 25%;">--}}
                    {{--                        <div class="" style="margin-left: 30%;line-height: 30px">--}}
                    {{--                            <span class="s-text18" style="display: block;">Đăng tin ưu tiên</span>--}}
                    {{--                            <span class="o-label s-text16"> 2 tuần trên Trang chủ 8 slot</span>--}}
                    {{--                            <span class="o-label s-text16"> Chi phí 2.500.000đ</span>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>

            </div>
            <div class="page-block m-b-30">
                <div class="page-text-box">
                    <div class="row">
                        <div class="col-md-6 detail-package">
                            <div class="s-text2 m-b-7">GÓI ĐÀO TẠO</div>
{{--                            <span style="line-height: 30px;">- Được đăng 1 tin tuyển dụng trên nền tảng Samacom <br> - Thời hạn tin: Kéo dài 20 ngày <br> - Số lượng apply cam kết: 25 apply</span>--}}
{{--                            <br>--}}
{{--                            <div class="s-text4 m-b-7"></div>--}}
{{--                            <div class="s-text4 m-b-7">Chính sách hoàn tiền</div>--}}
{{--                            <span style="line-height: 30px;"><strong style="color: red">* </strong> Số lượng apply < 50%: Hoàn tiền 100% <br>--}}
{{--                                <strong style="color: red">* </strong>Số lượng apply 50% - 70%: Hoàn tiền 80% <br>--}}
{{--                                <strong style="color: red">* </strong>Số lượng apply 70% - 90%: Hoàn tiền 50%--}}
{{--                            </span>--}}
{{--                            <br>--}}
{{--                            <br>--}}
{{--                            <div class="s-text2 m-b-7">Ưu đãi của Samacom</div>--}}
{{--                            <div class="s-text4 m-b-7">Lợi ích</div>--}}
                            <span style="line-height: 30px;">
                                - Làm cách nào để đội ngũ sales luôn nhiệt huyết, không bị xuống tinh thần trong quá trình làm việc?
                                <br>- Vì sao đã đầu tư các khóa học cho sales nhưng hiệu quả doanh nghiệp nhận được vẫn không như ý?
                                <br>- Với những gói đào tạo nhân sự Sales tại Samacom, giáo án và chương tình đào tạo sẽ được nghiên cứu để phù hợp với chính Doanh nghiệp của bạn, giải quyết vấn đề của bộ phận Kinh doanh 1 cách gốc rễ
                                <br>- Gói Spro gia tốc (2 ngày): 699.000/học viên
                                <br>- Gói SPro Inhouse: 7.500.000 - 90.000.000 (tuỳ thuộc vào nhu cầu và tình trạng doanh nghiệp). Với gói này chúng tôi sẽ nghiên cứu cụ thể, chi tiết vấn đề tại doanh nghiệp của bạn. Tìm ra nguyên nhân và giải pháp phù hợp nhất cho doanh nghiệp.
                            </span>
{{--                            <br>--}}
{{--                            <div class="s-text4 m-b-7"></div>--}}
                        </div>
                        {{--                        <div class="col-md-6 detail-package">--}}
                        {{--                            <div class="s-text2 m-b-7">Đăng tin cam kết cơ bản</div>--}}
                        {{--                            <div class="s-text4 m-b-7">Chi tiết gói</div>--}}
                        {{--                            <span style="line-height: 30px;">- Được đăng 1 tin tuyển dụng trên nền tảng Samacom <br> - Thời hạn tin: Kéo dài 20 ngày <br> - Số lượng apply cam kết: 25 apply</span>--}}
                        {{--                            <br>--}}
                        {{--                            <div class="s-text4 m-b-7"></div>--}}
                        {{--                            <div class="s-text4 m-b-7">Chính sách hoàn tiền</div>--}}
                        {{--                            <span style="line-height: 30px;"><strong style="color: red">* </strong> Số lượng apply < 50%: Hoàn tiền 100% <br>--}}
                        {{--                                <strong style="color: red">* </strong>Số lượng apply 50% - 70%: Hoàn tiền 80% <br>--}}
                        {{--                                <strong style="color: red">* </strong>Số lượng apply 70% - 90%: Hoàn tiền 50% </span>--}}
                        {{--                        </div>--}}
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="s-text2 m-b-7">Thông tin liên hệ</div>
                            @if(isset($success))
                                <div class="alert alert-success">
                                    {{$success}}
                                </div>
                            @endif
                            <input type="hidden" id="goithongtin" value="" name="package" hidden>
                            <div class="form-group ">
                                <label data-v-11aaa1ce="" class="m-b-6">Họ và tên<sup data-v-11aaa1ce="">*</sup></label>
                                <input data-v-11aaa1ce="" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <p class="text-danger ">
                                        {{$errors->first('name')}}
                                    </p>
                            @endif
                            </div>
                            <div class="form-group ">
                                <label data-v-11aaa1ce="" class="m-b-6">Số điện thoại<sup
                                        data-v-11aaa1ce="">*</sup></label>
                                <input data-v-11aaa1ce="" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                @if($errors->has('phone'))
                                    <p class="text-danger ">
                                        {{$errors->first('phone')}}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label data-v-11aaa1ce="" class="m-b-6">Địa chỉ email<sup
                                        data-v-11aaa1ce="">*</sup></label>
                                <input data-v-11aaa1ce="" type="text" class="form-control" name="email" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <p class="text-danger ">
                                        {{$errors->first('email')}}
                                    </p>
                                @endif
                            </div>
                            <div class="page-display-none form-group ">
                                <label data-v-11aaa1ce="" class="m-b-6">Sản phẩm cần tư vấn<sup
                                        data-v-11aaa1ce="">*</sup></label>
                                <input data-v-11aaa1ce="" disabled="disabled"  id="hiden" type="text" placeholder="Liên hệ để tư vấn" class="form-control control1"> <!---->
                                <input data-v-11aaa1ce="" disabled="disabled" id="sp1" style="display: none" type="text" placeholder="Gói Spro gia tốc (2 ngày)" class="form-control control1"> <!---->
                                <input data-v-11aaa1ce="" disabled="disabled" id="sp2" style="display: none" type="text" placeholder="Gói SPro Inhouse" class="form-control control1"> <!---->

                            </div>
                            {{--                            <div  class="form-group ">--}}
                            {{--                                <label data-v-11aaa1ce="" class="m-b-6">Tên gói sản phẩm<sup data-v-11aaa1ce="">*</sup></label>--}}
                            {{--                                <input data-v-11aaa1ce="" type="text"  class="form-control"> <!---->--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label data-v-11aaa1ce="" class="m-b-6">Số lượng<sup data-v-11aaa1ce="">*</sup></label>
                                <div class=" select-wrapper">
                                    <select name="field" id="field" class="chosen-select primary-select1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="list-item__link" style="text-align: end;">
                                <button type="submit" class="button-primary btn-request">Gửi yêu cầu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            {{--            <div class="page-block m-b-30">--}}
            {{--                <div class="page-text-box">--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-md-6">--}}
            {{--                            <div class="s-text2 m-b-7">Mô tả chi tiết</div>--}}
            {{--                            <div class="s-text4 m-b-7">Lợi ích</div>--}}
            {{--                            <span style="line-height: 30px;">- Dễ dàng kết nối với ứng viên tiềm năng bằng Job được đăng lên Samacom và được tiếp cận bởi 50,000 nghìn lượt Sales truy cập hàng tháng.--}}
            {{--                                <br> - Tiếp cận kho dữ liệu 50,000 ứng viên Sales, lựa chọn các hồ sơ phù hợp dựa theo các bộ lọc khác nhau.--}}
            {{--                                <br> - Tiết kiệm 90% chi phí tuyển dụng, tìm kiếm nhân sự Sales chất lượng bằng mức phí dịch vụ cực kỳ ưu đãi.</span>--}}
            {{--                            <br>--}}
            {{--                            <div class="s-text4 m-b-7"></div>--}}
            {{--                            <div class="s-text4 m-b-7">Quyền lợi</div>--}}
            {{--                            <span style="line-height: 30px;">- Được đăng 01 tin trên trang chủ của Samacom.com.vn - Cổng thông tin việc làm chuyên biệt ngành Sales. <br>--}}
            {{--                                - Được xem hồ sơ của 100 ứng viên Sales tiềm năng <br>--}}
            {{--                                  - Được lọc hồ sơ theo thông tin cơ bản (địa điểm làm việc, giới tính, vị trí Sales, kinh nghiệm, lĩnh vực…)<br>--}}
            {{--                                <strong style="color: red">* </strong>Thời hạn 30 ngày kể từ ngày kích hoạt </span>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-6">--}}
            {{--                            <div>--}}
            {{--                                <div>--}}
            {{--                                    <span class="s-text2">--}}
            {{--                                        Thông tin liên hệ--}}
            {{--                                    </span>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </section>
    <script>
        function getval(sel) {
            console.log(sel.value);
            $('.divPage').hide();
            $('.page' + sel.value).show();
        }
    </script>
@endsection()
@section('CSS')
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">

@endsection
@section('javascript')
    <script src="{{asset('js-service/goidangtin.js')}}"></script>
    <script src="{{asset('js-service/detail-product-service.js')}}"></script>
    <script>
        $('#camket').on('click',function () {
            $('.control1').hide();
            $('#sp1').show();
        })
        $('#camket1').on('click',function () {
            $('.control1').hide();
            $('#sp2').show();
        })
        $('.click').on('click', function () {
            $('.click').removeClass('main');
            $(this).addClass("main");
            var id = $(this).find('input').val();
            $('#goithongtin').val(id);
        });
    </script>
@endsection



