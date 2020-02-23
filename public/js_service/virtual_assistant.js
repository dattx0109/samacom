(function($, window, document) {
    $(function () {

        var dataDistricts = window.dataDistricts;

        const $fullName                  = $('#full_name');
        const $numberPhone               = $('#number_phone');
        const $email                     = $('#email');
        const $dateOfBirth               = $('#date_of_birth');
        const $btnSubmit                 = $('#btn_submit');
        var popup = $('#popup');
        const minLengthInput = 2;
        const maxLengthInput = 40;

        const vnf_regex = /(084|\+84|09|0[1-9])+([0-9]{8})/gm;
        const email_regex = /^(([^<>()\[\]\\\\.,;:\s    @"]+(\.[^<>()\[\]\\\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/gm;

        const $btnStep1 = $('.btn-step-1');
        const $btnStep2 = $('.btn-step-2');
        const $btnStep3 = $('.btn-step-3');
        const $btnStep4 = $('.btn-step-4');

        const processBar1 = $('.p1');
        const processBar2 = $('.p2');
        const processBar3 = $('.p3');
        const processBar4 = $('.p4');

        const $inputName = $('input[name=full_name]');
        const $phoneName = $('input[name=number_phone]');
        const $inputEmail = $('input[name=email]');

        const $inputBaseSalaryMin = $('input[name=base_salary_min]');
        const $inputBaseSalaryMax = $('input[name=base_salary_max]');
        const $inputIncomeMin = $('input[name=income_min]');
        const $inputIncomeMax = $('input[name=income_max]');

        const $inputDate =  $('input[name=date_of_birth]');
        const $selectDistricts =  $('select[name=districts]');
        const $selectProvince = $('select[name=province]');

        const $divStep1 = $('.va-step-1');
        // const $divStep2 = $('.va-step-2');
        const $divStep2 = $('.va-step-2');
        const $divStep3 = $('.va-step-3');
        const $divStep4 = $('.va-step-4');
        const $divStep5 = $('.va-step-5');

        // const $step2Workfield = $('#va_step_workfield input[type="checkbox"]');
        // const $step2Salefield = $('#va_step_salefield input[type="checkbox"]');
        // const $step3Concern = $('#va_step_concern input[type="checkbox"]');
        // const $step3Skill = $('#va_step_skill input[type="checkbox"]');
        // const $step3Character = $('#va_step_character input[type="checkbox"]');
        // const $step4Benefit = $('#va_step_benefit input[type="checkbox"]');

        var rawDataInsert = {};

        var checkRequiredPhoneNumber = function(value) {
            const regex = /(084|\+84|09|0[1-9])+([0-9]{8})/gm;
            return regex.exec(value);
        };

        var isEmail = function(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        };

        var isValidDate = function(dateString) {
            // First check for the pattern
            if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
                return false;

            // Parse the date parts to integers
            var parts = dateString.split("/");
            var day = parseInt(parts[0], 10);
            var month = parseInt(parts[1], 10);
            var year = parseInt(parts[2], 10);

            // Check the ranges of month and year
            if(year < 1000 || year > 3000 || month == 0 || month > 12)
                return false;

            var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

            // Adjust for leap years
            if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
                monthLength[1] = 29;

            // Check the range of the day
            return day > 0 && day <= monthLength[month - 1];
        };

        var buildDataDistrict = function(provinceId){
            let elementHtml = '<option value="-1">Quận/Huyện</option>';
            dataDistricts[provinceId].forEach(function (item) {
                elementHtml +=  '<option value="' + item.districtsId +'">'+ item.name +'</option>'
            });
            $selectDistricts.html(elementHtml);
        };

        $selectProvince.on('change', function () {
            $('.btn-step-2').removeClass('va-step-btn--disabled');

            let provinceId = $selectProvince.val();
            buildDataDistrict(provinceId);
        });

        var getAllJob = function(){
            if( ! $divStep4.hasClass('hidden-step')){
                $divStep4.addClass('hidden-step');
            }

            if( $divStep5.hasClass('hidden-step')){
                $divStep5.removeClass('hidden-step');
            }
            $('.va-container').fadeOut();
            $('.matching-job-result').fadeIn();

            var listSkill = [];
            $("input:checkbox[name=skill_id]:checked").each(function(){
                listSkill.push($(this).val());
            });

            var listTag = [];
            $("input:checkbox[name=tag_id]:checked").each(function(){
                listTag.push($(this).val());
            });

            var listCharacter = [];
            $("input:checkbox[name=character_id]:checked").each(function(){
                listTag.push($(this).val());
            });

            let rawDataForm = {
                'name' : $inputName.val(),
                'phone' : $phoneName.val(),
                'email' : $inputEmail.val(),
                'date_of_birth' : $inputDate.val(),
                'province_id' : $selectProvince.val(),
                'districts' : $selectDistricts.val(),
                'skill_id' : listSkill,
                'tag_id' : listTag,
                'character_id' : listCharacter,
                'base_salary_min' : $inputBaseSalaryMin.val(),
                'base_salary_max' : $inputBaseSalaryMax.val(),
                'income_min'      : $inputIncomeMin.val(),
                'income_max'      : $inputIncomeMax.val()
            };

            console.log(rawDataForm, '============');

            var formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
            });

            let postTingSearchJob = $.post('/api/virtual-assistant/get-job', {'data' : rawDataForm});
            postTingSearchJob.then(function (data) {
                console.log(data);
                if(data[0] !== undefined){
                    $('#job-detail-1 img').attr('src', 'https://samacom.s3-ap-southeast-1.amazonaws.com/' + data[0]['logo']);
                    $('#job-detail-1 .dCompanyName').html(data[0]['companyName']);

                    $('#job-detail-1 .dProvince').html(data[0]['provinceName']);
                    $('#job-detail-1 .dDistrict').html(data[0]['districtName']);

                    $('#job-detail-1 .matching-job__workplace').html('<i class="fa fa-map-marker"></i>' + data[0]['provinceName'] + '-' + data[0]['districtName']);
                    $('#job-detail-1 .dJobTitle').html(data[0]['title']);
                    $('#job-detail-1 .dSalaryDetail').html(formatter.format(data[0]['income_min']) + ' - ' + formatter.format(data[0]['income_max']) + ' VND');
                    $('#job-detail-1 .matching-job__date').html(data[0]['created_at']);
                    $('#job-detail-1 a').attr('href', '/cong-viec/' + data[0]['jobId']);
                }else {
                    $('#root-job').html('<b>Không có công việc phù hợp</b>');
                }
                if(data[1] !== undefined){
                    $('#job-detail-2 img').attr('src','https://samacom.s3-ap-southeast-1.amazonaws.com/' + data[1]['logo']);
                    $('#job-detail-2 .dCompanyName').html(data[1]['companyName']);

                    $('#job-detail-2 .dProvince').html(data[1]['provinceName']);
                    $('#job-detail-2 .dDistrict').html(data[1]['districtName']);

                    $('#job-detail-2 .matching-job__workplace').html('<i class="fa fa-map-marker"></i>' + data[1]['provinceName'] + '-' + data[1]['districtName']);
                    $('#job-detail-2 .dJobTitle').html(data[1]['title']);
                    $('#job-detail-2 .dSalaryDetail').html(formatter.format(data[1]['income_min']) + ' - ' + formatter.format(data[1]['income_max']) + ' VND');
                    $('#job-detail-2 .matching-job__date').html(data[1]['created_at']);
                    $('#job-detail-2 a').attr('href', '/cong-viec/' + data[1]['jobId']);
                }
                if(data[2] !== undefined){
                    $('#job-detail-3 img').attr('src','https://samacom.s3-ap-southeast-1.amazonaws.com/' + data[2]['logo']);
                    $('#job-detail-3 .dCompanyName').html(data[2]['companyName']);

                    $('#job-detail-3 .dProvince').html(data[2]['provinceName']);
                    $('#job-detail-3 .dDistrict').html(data[2]['districtName']);

                    $('#job-detail-3 .matching-job__workplace').html('<i class="fa fa-map-marker"></i>' + data[2]['provinceName'] + '-' + data[2]['districtName']);
                    $('#job-detail-3 .dJobTitle').html(data[2]['title']);
                    $('#job-detail-3 .dSalaryDetail').html(formatter.format(data[1]['income_min']) + ' - ' + formatter.format(data[1]['income_max']) + ' VND');
                    $('#job-detail-3 .matching-job__date').html(data[2]['created_at']);
                    $('#job-detail-3 a').attr('href', '/cong-viec/' + data[2]['jobId']);
                }

                // $('#job-detail-1 img').attr('src', data['logo'][0]);
                // $('#job-detail-1 img').attr('src', data['logo'][0]);
                // console.log(data);
                // console.log('pingggg');

                // let htmlll = '';
                // data.forEach(function (item) {
                //     htmlll = htmlll+JSON.stringify(item)+'</hr>';
                // });
                // $('#jobFilterParam').html(htmlll);
            });
        };
        $btnStep1.on('click', function () {
            // checkRequired($inputName.val(), $inputName);
            let valueProvince = $('#provinceValue option:selected').val();
            if(valueProvince == '-1'){
                $('#provinceValue').addClass('error-input');
                return;

            }
            // if ($inputName.val().length <= minLengthInput || $inputName.val().length >= maxLengthInput) {
            //     popup.addClass('popup-active');
            //     $('.popup-inner').html('Họ tên không được nhập ít hơn 2 ký tự và nhỏ hơn 40 ký tự');
            //     $inputName.addClass('error-input');
            //     return;
            // }else {
            //     popup.removeClass('popup-active');
            //     $inputName.removeClass("error-input");
            // }
            //
            // if( ! checkRequiredPhoneNumber($phoneName.val())){
            //     popup.addClass('popup-active');
            //     $('.popup-inner').html('Số điện thoại không đúng định dạng');
            //     $phoneName.addClass('error-input');
            //     return;
            // }else {
            //     popup.removeClass('popup-active');
            //     $inputName.removeClass("error-input");
            // };
            //
            // if( ! isEmail($inputEmail.val())){
            //     console.log('1111122');
            //     popup.addClass('popup-active');
            //     $('.popup-inner').html('Email không đúng định dạng');
            //     $inputEmail.addClass('error-input');
            //     return;
            // }else {
            //     popup.removeClass('popup-active');
            //     $inputEmail.removeClass("error-input");
            // }
            // if( ! isValidDate($inputDate.val())){
            //     popup.addClass('popup-active');
            //     $('.popup-inner').html('Email không đúng định dạng');
            //     $inputDate.addClass('border-input');
            //     return;
            // }else {
            //     popup.removeClass('popup-active');
            //     $inputDate.removeClass("border-input");
            // }

            if( ! $divStep1.hasClass('hidden-step')){
                $divStep1.addClass('hidden-step');
            }

            if( $divStep2.hasClass('hidden-step')){
                $divStep2.removeClass('hidden-step');
            }
            activeProcessBar(2);
        });
        var activeProcessBar = function(position){
            $('.progress-list__point').removeClass('progress-list__point--active');

            if(position === 2){
                processBar1.addClass('progress-list__point--active');
                processBar2.addClass('progress-list__point--active');
            }
            if(position === 3){
                processBar1.addClass('progress-list__point--active');
                processBar2.addClass('progress-list__point--active');
                processBar3.addClass('progress-list__point--active');
            }
            if(position === 4){
                processBar1.addClass('progress-list__point--active');
                processBar2.addClass('progress-list__point--active');
                processBar3.addClass('progress-list__point--active');
                processBar4.addClass('progress-list__point--active');
            }
        };
        $btnStep2.on('click', function () {
            console.log('pinggggg');

            // return;
            // if (step2WorkfieldCountChecked == 0) {
            //     popup.addClass('popup-active');
            //     $('.popup-inner').html('Bạn chưa chọn LĨNH VỰC!</br>Click vào từng mục để Chọn/Hủy');
            //     return;
            // }
            //
            // if (step2SalefieldCountChecked == 0) {
            //     popup.addClass('popup-active');
            //     $('.popup-inner').html('Bạn chưa chọn VỊ TRÍ!</br>Click vào từng mục để Chọn/Hủy');
            //     return;
            // }
            //
            if( ! $divStep2.hasClass('hidden-step')){
                $divStep2.addClass('hidden-step');
            }

            if( $divStep3.hasClass('hidden-step')){
                $divStep3.removeClass('hidden-step');
            }
            activeProcessBar(3);
        });

        $('.login-btn').on('click', function () {
            $('.login-btn').html('<i class="fa fa-spinner fa-spin"></i>');
            let postingLogin = $.post('/api/login', {
                'phone' : $('input[name=phone-verify]').val(),
                'password' : $('input[name=password-verify]').val()
            });
            postingLogin.then(function (data) {
                $('.login-btn').html('Tiếp tục');
                if(data.status){
                    getAllJob();
                }else {
                    $('.login-password').html('Mật khẩu không đúng');
                }
            });

        });
        // function startTimer(duration, display) {
        //     var timer = duration, minutes, seconds;
        //     setInterval(function () {
        //         minutes = parseInt(timer / 60, 10);
        //         seconds = parseInt(timer % 60, 10);
        //
        //         minutes = minutes < 10 ? "0" + minutes : minutes;
        //         seconds = seconds < 10 ? "0" + seconds : seconds;
        //
        //         display.textContent = minutes + ":" + seconds;
        //
        //         if (--timer < 0) {
        //             timer = duration;
        //         }
        //     }, 1000);
        // };

        $btnStep3.on('click', function () {

            if ($inputName.val().length <= minLengthInput || $inputName.val().length >= maxLengthInput) {
                popup.addClass('popup-active');
                $('.popup-inner').html('Họ tên không được nhập ít hơn 2 ký tự và nhỏ hơn 40 ký tự');
                $inputName.addClass('error-input');
                return;
            }else {
                popup.removeClass('popup-active');
                $inputName.removeClass("error-input");
            }
            if( ! checkRequiredPhoneNumber($phoneName.val())){
                popup.addClass('popup-active');
                $('.popup-inner').html('Số điện thoại không đúng định dạng');
                $phoneName.addClass('error-input');
                return;
            }else {
                popup.removeClass('popup-active');
                $phoneName.removeClass("error-input");
            };

            if( ! isEmail($inputEmail.val())){
                console.log('1111122');
                popup.addClass('popup-active');
                $('.popup-inner').html('Email không đúng định dạng');
                $inputEmail.addClass('error-input');
                return;
            }else {
                popup.removeClass('popup-active');
                $inputEmail.removeClass("error-input");
            }

            $btnStep3.html('<i class="fa fa-spinner fa-spin"></i>');
            let postingVerifyAccount = $.post('/api/virtual-register-user', {'phone' : $phoneName.val()});
            postingVerifyAccount.then(function (data) {
                $btnStep3.html('Tiếp tục');
                if(data.isLogin == 1){
                    getAllJob();
                }
                if(data.phone == 0){
                    return alert('Số điện thoại quý khách đang sử dụng vượt quá số lần đăng ký, vui lòng quay lại ngày mai');
                }
                if(data.isAccount == 1){
                    $('input[name=phone-verify]').val(data.phone);
                    if( ! $divStep3.hasClass('hidden-step')){
                        $divStep3.addClass('hidden-step');
                    }

                    if( $('.va-step-4-1').hasClass('hidden-step')){
                        $('.va-step-4-1').removeClass('hidden-step');
                    }
                }

                if(data.isAccount == 0){
                    if( ! $divStep3.hasClass('hidden-step')){
                        $divStep3.addClass('hidden-step');
                    }

                    if( $('.va-step-4').hasClass('hidden-step')){
                        $('.va-step-4').removeClass('hidden-step');
                    }
                }

            });


            // if( ! $divStep3.hasClass('hidden-step')){
            //     $divStep3.addClass('hidden-step');
            // }
            //
            // if( $divStep4.hasClass('hidden-step')){
            //     $divStep4.removeClass('hidden-step');
            // }
        });

        $('.sms-btn').on('click', function () {
            let rawDataPosting = {
                'code' : $('input[name=code-verify]').val(),
                'phone' : $('input[name=number_phone]').val(),
                'password' : $('input[name=password-new]').val(),
                'email' : $('input[name=email]').val(),
                'name' : $('input[name=name]').val(),
            };
            var $postingReviewEnd = $.post('/api/verify-code', rawDataPosting);
            $('.sms-btn').html('<i class="fa fa-spinner fa-spin"></i>');
            $postingReviewEnd.then(function (data) {
                $('.sms-btn').html('Tiếp tục');
                if( ! data.isVerify){
                    $('.p-code-verify').html('Code không chính xác');
                }else {
                    if( ! $divStep4.hasClass('hidden-step')){
                        $divStep4.addClass('hidden-step');
                    }
                    getAllJob();
                    $('.va-container').fadeOut();
                    $('.matching-job-result').fadeIn();
                }
            });
        });




        $btnStep4.on('click', function () {

            // if (step4BenefitCountChecked == 0) {
            //     popup.addClass('popup-active');
            //     $('.popup-inner').html('Bạn chưa chọn QUYỀN LỢI</br>Click vào từng mục để Chọn/Hủy');
            //     return;
            // }
            getAllJob();


            console.log(listCharacter, 'TIENVMMMMMMm');

            console.log('================');
        });


        // $btnSubmit.on('click', function () {
        //     console.log(1111);
        //     let fullName    = $fullName.val();
        //     let numberPhone = $numberPhone.val();
        //     let email       = $email.val();
        //     let dateOfBirth = $dateOfBirth.val();
        //     error = false;
        //
        //     checkRequired($fullName);
        //     checkRequiredPhoneNumber($numberPhone);
        //
        //     // if(numberPhone !==''){
        //     //     if (vnf_regex.test(numberPhone) === false) {
        //     //         $notificationPhone.text('Số điện thoại của bạn không đúng định dạng!');
        //     //     }else{
        //     //         $notificationPhone.text('');
        //     //     }
        //     // }else{
        //     //     $notificationPhone.text('Bạn chưa điền số điện thoại!');
        //     // }
        //     //
        //     // if(email !== ''){
        //     //     if(email_regex.test(email) === false){
        //     //         $notificationEmail.text('Email của bạn không đúng định dạng!');
        //     //     }else{
        //     //         $notificationEmail.text('');
        //     //     }
        //     // }else{
        //     //     $notificationEmail.text('Bạn chưa điền email');
        //     // }
        //
        // });




    });
}(window.jQuery, window, document));
