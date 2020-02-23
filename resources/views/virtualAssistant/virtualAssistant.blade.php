@extends('layouts.base')
@section('content')
    <div class="va-container animated fadeInDown">
        <div class="container">
            <div class="va-progress p-t-35 p-b-20">
                <ul class="progress-list">
                    <li class="progress-list__point progress-list__point--active p1">
                        <div class="progress-list__number m-b-8">1</div>
                        <div class="progress-list__title">Mô tả bản thân</div>
                        <div class="progress-list__line">
                            <div class="progress-list__line-inner"></div>
                        </div>
                    </li>
                    <li class="progress-list__point p2">
                        <div class="progress-list__number m-b-8">2</div>
                        <div class="progress-list__title">Yêu cầu</div>
                        <div class="progress-list__line">
                            <div class="progress-list__line-inner"></div>
                        </div>
                    </li>
                    <li class="progress-list__point p3">
                        <div class="progress-list__number m-b-8">3</div>
                        <div class="progress-list__title">Liên hệ</div>
                        <div class="progress-list__line">
                            <div class="progress-list__line-inner"></div>
                        </div>
                    </li>
                    <li class="progress-list__point p4">
                        <div class="progress-list__number m-b-8">4</div>
                        <div class="progress-list__title">Hoàn thành</div>
                        <div class="progress-list__line">
                            <div class="progress-list__line-inner"></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="va-inner">
                <div class="va-step va-step-1 animated fadeInDown">
                    <div class="page-block m-b-30 p-b-20">
                        <div class="choose-tags" id="va_step_workfield">
                            <div class="s-text2 m-b-6">Lĩnh vực mà bạn quan tâm?</div>
                            <div class="s-text8 m-b-20">(Tối đa 3 lĩnh vực)</div>
                            <div class="choose-tags__block">
                                @foreach($listField as $key => $item)
                                    <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                        <input type="checkbox" class="custom-control-input" id="{{'d21-'.$key}}"
                                               value="{{$key}}" name="field_id">
                                        <label class="custom-control-label" for="{{'d21-'.$key}}"
                                               alt="{{$item}}">{{$item}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="page-block m-b-30 p-b-10">
                        <div class="s-text2 m-b-20">Bạn ở khu vực nào?</div>
                        <div class="grid-form">
                            <div class="grid-form__item">
                                <label>Tỉnh/Thành phố <sup class="text-danger">*</sup></label>
                                <div class="select-wrapper">
                                    <select name="province" data-placeholder="Tỉnh/Thành Phố" class="primary-select" id="provinceValue">
                                        <option value="-1">Tỉnh/Thành Phố</option>
                                        @foreach($listProvince[0] as $item)
                                            <option value="{{$item->id}}">{{$item->provinceName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid-form__item">
                                <label>Quận/Huyện</label>
                                <div class="select-wrapper">
                                    <select name="districts" data-placeholder="Quận/Huyện" class="primary-select">
                                        <option value="-1">Quận/Huyện</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-block m-b-40">
                        <div class="choose-tags" id="va_step_salefield">
                            <div class="s-text2 m-b-6">Vị trí mà bạn thấy phù hợp?</div>
                            <div class="s-text8 m-b-20">(Tối đa 2 vị trí)</div>
                            <div class="choose-tags__block">
                                @foreach($listSaleType as $key => $item)
                                    <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                        <input type="checkbox" class="custom-control-input" id="{{'d22-'.$key}}"
                                               value="{{$key}}" name="tag_id">
                                        <label class="custom-control-label" for="{{'d22-'.$key}}">{{$item}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="button-container tar">
                                <div class="button-primary btn-step-1 m-t-20 tac">Tiếp tục</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="va-step va-step-2 animated fadeInDown hidden-step">
                    <div class="page-block m-b-30 p-b-20">
                        <div class="choose-tags" id="va_step_concern">
                            <div class="s-text2 m-b-20">Hiện tại bạn quan tâm đến điều gì nhất?</div>
                            <div class="choose-tags__block">
                                @foreach($envCompany as $key => $item)
                                    <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                        <input type="checkbox" class="custom-control-input" id="{{'d31-'.$key}}"
                                               value="{{$key}}" name="env">
                                        <label class="custom-control-label" for="{{'d31-'.$key}}">{{$item}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="page-block m-b-30">
                        <div class="choose-tags">
                            <div class="s-text2 m-b-20">Bạn đã có kinh nghiệm chưa?</div>
                            <div class="m-checkbox-container">
                                <div class="m-checkbox__item">
                                    <label class="m-checkbox m-b-18">
                                        <input type="radio" name="exp" value="1" id="exp_1" checked="checked" class="radio-select-input">Đã có<span class="checkmark"></span>
                                    </label>
                                    <div class="grid-form">
                                        <div class="grid-form__item select-wrapper">
                                            <select name="exp_sale" data-placeholder="Telesale" class="primary-select">
                                                <option value="1">Telesale</option>
                                                <option value="2">Sale trực tiếp</option>
                                                <option value="3">Sale tư vấn</option>
                                                <option value="4">Sale phân phối</option>
                                                <option value="5">Sale online</option>
                                                <option value="6">Sale admin</option>
                                            </select>
                                        </div>
                                        <div class="grid-form__item select-wrapper">
                                            <select name="exp_field" data-placeholder="Bất động sản" class="primary-select">
                                                <option value="1">Bất động sản</option>
                                                <option value="2">Công nghệ</option>
                                                <option value="3">Y tế</option>
                                                <option value="4">Đào tạo</option>
                                                <option value="5">Dịch vụ</option>
                                                <option value="6">Du lịch</option>
                                            </select>
                                        </div>
                                        <div class="grid-form__item select-wrapper">
                                            <select name="exp_year" data-placeholder="2 năm" class="primary-select">
                                                <option value="1">1 năm</option>
                                                <option value="2">2 năm</option>
                                                <option value="3">3 năm</option>
                                                <option value="4">Trên 3 năm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-checkbox__item">
                                    <label class="m-checkbox">
                                        <input type="radio" name="exp" value="2" id="exp_2">Chưa có<span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-block m-b-30 p-b-20">
                        <div class="choose-tags" id="va_step_skill">
                            <div class="s-text2 m-b-6">Bạn có những kĩ năng nào sau đây?</div>
                            <div class="s-text8 m-b-20">Được chọn tối đa 5 kĩ năng</div>
                            <div class="choose-tags__block">
                                @foreach($listSkill as $key => $item)
                                    <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                        <input type="checkbox" class="custom-control-input" id="{{'d32-'.$key}}"
                                               value="{{$key}}" name="skill_id">
                                        <label class="custom-control-label" for="{{'d32-'.$key}}">{{$item}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="page-block m-b-30 p-b-20">
                        <div class="choose-tags" id="va_step_character">
                            <div class="s-text2 m-b-6">Bạn thấy mình là người thế nào?</div>
                            <div class="s-text8 m-b-20">Được chọn tối đa 5 tính cách</div>
                            <div class="choose-tags__block">
                                @foreach($listCharacter as $key => $item)
                                    <div class="custom-control custom-radio custom-control-inline choose-tags__item">
                                        <input type="checkbox" class="custom-control-input" id="{{'d33-'.$key}}"
                                               value="{{$key}}" name="character_id">
                                        <label class="custom-control-label" for="{{'d33-'.$key}}">{{$item}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="page-block m-b-30 p-b-20">
                        <div class="s-text2 m-b-20">Thu nhập</div>
                        <div class="grid-form">
                            <div class="grid-form__item">
                                <label>Lương cứng</label>
                                <input type="text" name="base_salary_min" class="form-control" placeholder="Tối thiểu">
                            </div>
                            <div class="grid-form__item">
                                <label>Lương cứng</label>
                                <input type="text" name="base_salary_max" class="form-control" placeholder="Tối đa">
                            </div>
                            <div class="grid-form__item">
                                <label>Thu nhập</label>
                                <input type="text" name="income_min" class="form-control" placeholder="Tối thiểu">
                            </div>
                            <div class="grid-form__item">
                                <label>Thu nhập</label>
                                <input type="text" name="income_max" class="form-control" placeholder="Tối đa">
                            </div>
                        </div>
                        <div class="button-container tar">
                            <div class="button-primary btn-step-2 m-t-20 tac">Tiếp tục</div>
                        </div>
                    </div>
                </div>
                <div class="va-step va-step-3 animated fadeInDown hidden-step">
                    <div class="page-block m-b-40 size1">
                        <div class="s-text2 m-b-20">Thông tin cơ bản<sup>*</sup></div>
                        <div class="form-group m-b-20">
                            <label for="full_name">Họ và tên<sup>*</sup></label>
                            <div class="form-group__input">
                                <input {{isset($user->name) ? 'readonly' : ''}} value="{{ isset($user->name) ? $user->name : '' }}"
                                       placeholder="Họ và tên" type="text" class="form-control" name="full_name">
                                <span class="text-danger notification_name pull-right text-under-input"></span>
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="number_phone">Số điện thoại<sup>*</sup></label>
                            <div class="form-group__input">
                                <input type="number"
                                       {{isset($user->phone) ? 'readonly' : ''}} value="{{ isset($user->phone) ? $user->phone : '' }}"
                                       placeholder="Số điện thoại" class="form-control" name="number_phone">
                                <span class="text-danger notification_phone pull-right text-under-input"></span>
                            </div>
                        </div>
                        <div class="form-group m-b-30">
                            <label for="email">Email<sup>*</sup></label>
                            <div class="form-group__input">
                                <input type="email"
                                       {{isset($user->email) ? 'readonly' : ''}} value="{{ isset($user->email) ? $user->email : '' }}"
                                       placeholder="Email" class="form-control" name="email">
                                <span class="text-danger notification_email pull-right text-under-input"></span>
                            </div>
                        </div>
                        <div class="form-group m-b-30" id="va_step_dob">
                            <label for="date_of_birth">Ngày sinh</label>
                            <div class="form-group__input date input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control"
                                       {{isset($user->date_of_birth) ? 'readonly' : ''}} value="{{ isset($user->date_of_birth) ? $user->date_of_birth : '' }}"
                                       placeholder="dd/mm/yyyy" class="form-control" name="date_of_birth">
                                <span class="text-danger notification_email pull-right text-under-input"></span>
                            </div>
                        </div>
                        <button class="button-primary w100 btn-step-3">
                            Tiếp tục
                        </button>
                    </div>
                </div>
                <div class="va-step va-step-4 animated fadeInDown hidden-step">
                    <div class="page-block m-b-30 size1 tac">
                            <div class="s-text2 m-b-6">Xem kết quả</div>
                            <div class="s-text8 m-b-20">Mã xác thực đã được gửi đến điện thoại của bạn, hãy vui lòng nhập mã xác thực để xem kết quả * Mật khẩu mới dùng để đăng ký tài khoản trong hệ thống</div>
                            <input type="password" name="password-new" class="form-control m-b-10" placeholder="Nhập mật khẩu mới">
                            <input type="text" class="form-control m-b-10" name="code-verify" placeholder="Nhập mã xác thực">
                            <p class="p-code-verify text text-danger pull-right"></p>
{{--                            <div class="form-countdown m-b-20" id="countdownTime">10:00</div>--}}
                            <button class="button-primary pull-left sms-btn" type="submit">Tiếp tục</button>
                            <br/>
                    </div>
                </div>
                <div class="va-step va-step-4-1 animated fadeInDown hidden-step">
                    <div class="page-block m-b-30 size1 tac">
                        <div class="s-text2 m-b-6">Login</div>
                        <div class="s-text8 m-b-20">Tài khoản đã có trong hệ thống vui lòng đăng nhập để tiếp tục</div>
                        <input type="text" name="phone-verify" class="form-control m-b-10" readonly>
                        <input type="password" name="password-verify" class="form-control m-b-10" placeholder="Nhập mật khẩu">
                        <p class="pull-right text text-danger login-password"></p>
                        <button class="button-primary login-btn" type="submit">Tiếp tục</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="masa animated fadeInDown">
        <div id="popup" class="masa-popup popup-active m-b-10">
            <div class="masa-popup__title">
                Masa - trợ lý ảo của bạn
            </div>
            <div class="masa-popup__text popup-inner">
                Để hỗ trợ tối đa trong việc tìm kiếm công việc phù hợp cho bạn, trước tiên hãy chia sẻ cho tôi những thông tin cơ bản nhé
            </div>
        </div>
        <div class="masa-visual tar">
            <img src="{{asset('img/masa/masa.png')}}">
        </div>
    </div>
    <div class="matching-job-result animated fadeInDown" style="display: none;">
        <div class="container">
            <div class="matching-job p-t-40 p-b-40" id="root-job">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="matching-job__item m-b-30" id="job-detail-1">
                        <div class="matching-job__img">
                            <img src="{{asset('img/demo/logo-kfc.png')}}">
                        </div>
                        <div class="matching-job__info">
                            <div class="matching-job__text">
                                <div class="s-text5 dJobTitle">Merchandiser (Nhân Viên Theo Dõi Đơn Hàng) rchandiser (Nhân Viên Theo Dõi Đơn Hàng) rchandiser (Nhân Viên Theo Dõi Đơn Hàng)</div>
                            </div>
                            <div class="matching-job__text">
                                <div class="page-tag page-tag--red">Toàn thời gian</div>
                            </div>
                            <div class="matching-job__text">
                                <div class="s-text12 dCompanyName">Apple</div>
                            </div>
                            <div class="matching-job__text dSalaryDetail">8.000.000 - 15.000.000 VNĐ</div>
                            <div class="matching-job__text">Không yêu cầu bằng cấp</div>
                            <div class="matching-job__text">Nam</div>
                            <div class="matching-job__text dProvince">Hà Nội</div>
                            <div class="matching-job__text dDistrict">Đống Đa</div>
                        </div>
                        <div class="matching-job__link">
                            <a href="" class="button-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12" id="job-detail-2">
                    <div class="matching-job__item">
                        <div class="matching-job__img">
                            <img src="{{asset('img/demo/logo-kfc.png')}}">
                        </div>
                        <div class="matching-job__info">
                            <div class="matching-job__text">
                                <div class="s-text5 dJobTitle">Nhân viên bưng bê cho quán</div>
                            </div>
                            <div class="matching-job__text">
                                <div class="page-tag page-tag--yellow">Bán thời gian</div>
                            </div>
                            <div class="matching-job__text">
                                <div class="s-text12 dCompanyName">Apple</div>
                            </div>
                            <div class="matching-job__text dSalaryDetail">8.000.000 - 15.000.000 VNĐ</div>
                            <div class="matching-job__text">Không yêu cầu bằng cấp</div>
                            <div class="matching-job__text">Nam</div>
                            <div class="matching-job__text dProvince">Hà Nội</div>
                            <div class="matching-job__text dDistrict">Đống Đa</div>
                        </div>
                        <div class="matching-job__link">
                            <a href="" class="button-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12" id="job-detail-3">
                    <div class="matching-job__item">
                        <div class="matching-job__img">
                            <img src="{{asset('img/demo/logo-kfc.png')}}">
                        </div>
                        <div class="matching-job__info">
                            <div class="matching-job__text">
                                <div class="s-text5 dJobTitle">Nhân viên bưng bê cho quán</div>
                            </div>
                            <div class="matching-job__text">
                                <div class="page-tag page-tag--red">Toàn thời gian</div>
                            </div>
                            <div class="matching-job__text">
                                <div class="s-text12 dCompanyName">Apple</div>
                            </div>
                            <div class="matching-job__text dSalaryDetail">8.000.000 - 15.000.000 VNĐ</div>
                            <div class="matching-job__text">Không yêu cầu bằng cấp</div>
                            <div class="matching-job__text">Nam</div>
                            <div class="matching-job__text dProvince">Hà Nội</div>
                            <div class="matching-job__text dDistrict">Đống Đa</div>
                        </div>
                        <div class="matching-job__link">
                            <a href="" class="button-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('CSS')

    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/popper/popper.css')}}" rel="stylesheet">
    <style>
        .matching-job__company{
            margin-top: 10px;
        }
        .landing-page .navbar-wrapper .navbar {
            background: #3c3a3a;
        }

        .border-input {
            border: 2px solid red !important;
        }
        .error-input {
            border: 2px solid #ed5565 !important;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        }
    </style>

@endsection

@section('javascript')
    <script src="{{asset('js/plugins/popper/popper.js')}}"></script>
    <script>

        $(document).ready(function () {

            // step 1 date picker
            $('#va_step_dob .input-group.date').datepicker({
                todayBtn: "linked",
                dateFormat: "dd/mm/yy",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            // $(window).scroll(function() {
            //
            //     if ($('#footer').scrollTop() <= 600){
            //         $('.va-visual').addClass("va-absolute");
            //     }
            //     else{
            //         $('#va-visual').removeClass("va-absolute");
            //     }
            // });

            var dataDistricts = {!! json_encode($listProvince[1]) !!};
            window.dataDistricts = dataDistricts;

            var virtual = $('.va-visual');
            var popup = $('#popup');
            var va_checkbox_btn = $('.choose-tags__item label');

            va_checkbox_btn.on('click', function () {
                $(this).toggleClass('is-checked');
            });

            // Step 2 check workfield
            var $step2Workfield = $('#va_step_workfield input[type="checkbox"]');

            var $inputProvince = $('input[name=province]');


            $step2Workfield.change(function () {
                var step2WorkfieldCountChecked = $step2Workfield.filter(':checked').length;
                $('.va-form-label-count').text(step2WorkfieldCountChecked);

                if (step2WorkfieldCountChecked == 0) {
                    // $('.btn-step-2').toggleClass('va-step-btn--disabled');
                    return;
                }
                else if (step2WorkfieldCountChecked == 3) {
                    // $('.btn-step-2').removeClass('va-step-btn--disabled');
                    $step2Workfield.not(':checked').parent().addClass('disable-form-block');
                    $step2Workfield.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 3 LĨNH VỰC!</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    // $('.btn-step-2').removeClass('va-step-btn--disabled');
                    $step2Workfield.not(':checked').parent().removeClass('disable-form-block');
                    $step2Workfield.not(':checked').removeAttr('disabled');
                    return;
                }
            });
            $inputProvince.on('change', function () {
                return;
            });

            // Step 2 check salefield
            var $step2Salefield = $('#va_step_salefield input[type="checkbox"]');
            $step2Salefield.change(function () {
                var step2SalefieldCountChecked = $step2Salefield.filter(':checked').length;

                if (step2SalefieldCountChecked == 2) {
                    $step2Salefield.not(':checked').parent().addClass('disable-form-block');
                    $step2Salefield.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 2 VỊ TRÍ!</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    $step2Salefield.not(':checked').parent().removeClass('disable-form-block');
                    $step2Salefield.not(':checked').removeAttr('disabled');
                    return;
                }
                ;
            });
            // Step 3 check concern
            var $step3Concern = $('#va_step_concern input[type="checkbox"]');
            $step3Concern.change(function () {
                var step3ConcernCountChecked = $step3Concern.filter(':checked').length;
                console.log(step3ConcernCountChecked);

                if (step3ConcernCountChecked == 1) {
                    // $('.btn-step-3').removeClass('va-step-btn--disabled');
                    $step3Concern.not(':checked').parent().addClass('disable-form-block');
                    $step3Concern.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 1 VỊ TRÍ!</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    // $('.btn-step-3').removeClass('va-step-btn--disabled');
                    $step3Concern.not(':checked').parent().removeClass('disable-form-block');
                    $step3Concern.not(':checked').removeAttr('disabled');
                    return;
                };
            });
            // Step 3 check skill
            var $step3Skill = $('#va_step_skill input[type="checkbox"]');
            $step3Skill.change(function () {
                var step3SkillCountChecked = $step3Skill.filter(':checked').length;

                if (step3SkillCountChecked == 5) {
                    $step3Skill.not(':checked').parent().addClass('disable-form-block');
                    $step3Skill.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 5 KĨ NĂNG</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    $step3Skill.not(':checked').parent().removeClass('disable-form-block');
                    $step3Skill.not(':checked').removeAttr('disabled');
                    return;
                }
                ;
            });
            // Step 3 check character
            var $step3Character = $('#va_step_character input[type="checkbox"]');
            $step3Character.change(function () {
                var step3CharacterCountChecked = $step3Character.filter(':checked').length;

                if (step3CharacterCountChecked == 5) {
                    $step3Character.not(':checked').parent().addClass('disable-form-block');
                    $step3Character.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 5 TÍNH CÁCH</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    $step3Character.not(':checked').parent().removeClass('disable-form-block');
                    $step3Character.not(':checked').removeAttr('disabled');
                    return;
                }
                ;
            });
            // Step 3 check radio checked
            // if ($("#exp_1").is("not(:checked)")) {
            //     $("#exp_1").parent().addClass("checked-radio-select");
            // }
            // else {
            //     $("#exp_1").parent().removeClass("checked-radio-select");
            // }
            // if ($("#exp_2").is("not(:checked)")) {
            //     $("#exp_2").parent().addClass("checked-radio-select");
            // }
            // else {
            //     $("#exp_2").parent().removeClass("checked-radio-select");
            // }
            // Step 4 check benefit
            var $step4Benefit = $('#va_step_benefit input[type="checkbox"]');
            $step4Benefit.change(function () {
                var step4BenefitCountChecked = $step4Benefit.filter(':checked').length;

                if (step4BenefitCountChecked == 0) {
                    $('.btn-step-4').toggleClass('va-step-btn--disabled');
                    return;
                }
                else if (step4BenefitCountChecked == 5) {
                    $('.btn-step-4').removeClass('va-step-btn--disabled');
                    $step4Benefit.not(':checked').parent().addClass('disable-form-block');
                    $step4Benefit.not(':checked').attr('disabled', 'disabled');
                    popup.addClass('popup-active');
                    $('.popup-inner').html('Chỉ được chọn tối đa 5 QUYỀN LỢI</br>Click vào từng mục để Chọn/Hủy.</br>Những mục được tô mờ sẽ không thể chọn khi quá số lượng');
                    return;
                } else {
                    $('.btn-step-4').removeClass('va-step-btn--disabled');
                    $step4Benefit.not(':checked').parent().removeClass('disable-form-block');
                    $step4Benefit.not(':checked').removeAttr('disabled');
                    return;
                }
                ;
            });

            // add popper bubble text js
            // var popper = new Popper(virtual, popup, {
            //     placement: 'top-end',
            //     onCreate: function (data) {
            //         console.log(data);
            //     },
            //     modifiers: {
            //         flip: {
            //             behavior: ['left', 'right', 'top', 'bottom']
            //         },
            //         offset: {
            //             enabled: true,
            //             offset: '0,10'
            //         }
            //     }
            // });

            popup.toggleClass('popup-active');
        });
    </script>
    <script>
        // Format curency
        function format_curency(a) {
            a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        }

        function currencyFormat(fld, milSep, decSep, e) {
            var sep = 0;
            var key = '';
            var i = j = 0;
            var len = len2 = 0;
            var strCheck = '0123456789';
            var aux = aux2 = '';
            var whichCode = (window.Event) ? e.which : e.keyCode;
            if (whichCode == 13) return true;  // Enter
            key = String.fromCharCode(whichCode);  // Get key value from key code
            if (strCheck.indexOf(key) == -1) return false;  // Not a valid key
            len = fld.value.length;
            for (i = 0; i < len; i++)
                if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;
            aux = '';
            for (; i < len; i++)
                if (strCheck.indexOf(fld.value.charAt(i)) != -1) aux += fld.value.charAt(i);
            aux += key;
            len = aux.length;
            if (len == 0) fld.value = '';
            if (len == 1) fld.value = '0' + decSep + '0' + aux;
            if (len == 2) fld.value = '0' + decSep + aux;
            if (len > 2) {
                aux2 = '';
                for (j = 0, i = len - 3; i >= 0; i--) {
                    if (j == 3) {
                        aux2 += milSep;
                        j = 0;
                    }
                    aux2 += aux.charAt(i);
                    j++;
                }
                fld.value = '';
                len2 = aux2.length;
                for (i = len2 - 1; i >= 0; i--)
                    fld.value += aux2.charAt(i);
                fld.value += decSep + aux.substr(len - 2, len);
            }
            return false;
        }
    </script>
    <script src="{{asset('js_service/virtual_assistant.js')}}"></script>

@endsection

