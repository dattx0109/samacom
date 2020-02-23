(function($, window, document) {
    // Kinh nghiem lam viec
    const position = $('#position_exp');
    const company = $('#company_exp');
    const field_work = $('#field_work_exp');
    const start_time = $('#start_time_exp');
    const end_time = $('#end_time_exp');
    const description_Exp = $('#description_exp');
    const btnExpAccount = $('#btnExpAccount');
    const listAccountExp = $('.list-account-exp ');

    //thong tin hoc van
    const school = $('#school');
    const filed_study = $('#filed_study');
    const degree = $('#degree');
    const description_edu = $('#description_edu');
    const btnEduAccount = $('#btnEduAccount');
    const start_time_edu = $('#start_time_edu');
    const end_time_edu = $('#end_time_edu');
    //skill
    const btnSkill = $('#btnSkill')
    const point1 = $('#point');
    const skill = $('#skill');
    const listAccountSkill = $('.list-account-skill ');
    let provinceIdAccountDetail = $('select[name="province_id"]');
    let province_id_wish = $('#province_id_wish');


    $(function () {
        let District = (function ($, window, document) {
            let dataRequest = {};
            dataRequest.province_id = $('select[name="province_id"]');
            dataRequest.district_id = $('select[name="district_id"]');
            dataRequest.getDistrict = function ($districtId) {
                let district = $.get('/list-district-by-province?province_id=' +$districtId );
                let districtHtml = '<option value="">Chọn quận huyện</option>';
                district.done(function (data) {
                    let countDistrict = data.length;
                    for(let i = 0;i<countDistrict;i++ ){
                        districtHtml = districtHtml+'<option value="'+data[i].district_id+'">'+data[i].prefix +' ' + data[i].district_name +'</option>';
                    }
                    $('#district_id').html(districtHtml);
                    $(".chosen-select").trigger("chosen:updated");
                });
                district.fail(function(data){
                    $('#district_id').html(districtHtml);
                    $(".chosen-select").trigger("chosen:updated");
                });
            };
            dataRequest.getDistrictWish = function($province){
                let district = $.get('/workplace/list-district-by-province?province_id=' + $province);
                let districtHtmlWish = '<option value="">Chọn quận huyện</option>';
                district.done(function (data) {
                    let countDistrict = data.length;
                    for(let i = 0;i<countDistrict;i++ ){
                        districtHtmlWish = districtHtmlWish+'<option value="'+data[i].id+'">'+data[i].name +'</option>';
                    }
                    $('#district_id_wish').html(districtHtmlWish);
                    $(".chosen-select").trigger("chosen:updated");
                });
                district.fail(function(data){
                    $('#district_id_wish').html(districtHtmlWish);
                    $(".chosen-select").trigger("chosen:updated");
                });
            };
            return dataRequest;
        }(window.jQuery, window, document));
        if($('input[name="old_province_id"]').val()!=''){
            District.getDistrict(provinceIdAccountDetail.val());
        }
        if($('input[name="old_province_id_wish"]').val()!=''){
            District.getDistrictWish(province_id_wish.val());
        }


        District.province_id.on('change', function(){
            District.getDistrictWish($(this).val());
        });

        provinceIdAccountDetail.on('change', function () {
            District.getDistrict(provinceIdAccountDetail.val());
        });
        btnSkill.on('click', function () {
            let Id = $(this).attr('data-id');
            let pointSkill = point1.val();
            let skillAcc = skill.val();
            let error_point_acc =$('.error_point');
            let error_skill_acc =$('.error_skill');


            let dataInsertSkill ={
                account_id : Id,
                skill_id : skillAcc,
                point : pointSkill,
            };
            let accountSkill = $.post('/account/add-account-skill',dataInsertSkill )
            accountSkill.done(function(){
                location.reload();
                // listAccountSkill.append('<div style="display: flex ; justify-content: space-between">\n' +
                //     '                                        <div > ' + pointSkill +'</div>\n' +
                //     '                                        <div >'+ skillAcc +'</div>\n' +
                //     '                                        <div ><button class="btn btn-danger">delete</button></div>\n' +
                //     '                                    </div>');
            });
            accountSkill.fail(function(data){
                var errors = data.responseJSON.errors;
                 //console.log(data.responseJSON.errors);
                // $('.error-create-skill').html();

                if (typeof errors.point != 'undefined') {
                    error_point_acc.append('<span class="help-block m-b-none alert alert-danger">' + errors.point[0] + '</span>');
                }
                if (typeof errors.skill_id != 'undefined') {
                    error_skill_acc.append('<span class="help-block m-b-none alert alert-danger">' + errors.skill_id[0] + '</span>');
                }
                });

        });
    });
    $(function () {
        $('#data_1 .input-group.date').datepicker({
            format:'dd-mm-yyyy',
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('.chosen-select').chosen({width: "100%"});

            $('#avatar').on('change', function () {

                 readURL(this);
                $("#btnAvatar").show();
            });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatar_show').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#still_in_role").click(function(){
            $(".div_date_end").toggle();
        });
        // $("#still_in_role").click(function(){
        //     $(".div_date_end").show();
        // });
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        btnExpAccount.on('click', function () {
            let Id = $(this).attr('data-id');
            let positionExp = position.val();
            let companyExp = company.val();
            let fieldWorkExp = field_work.val();
            let startTimeExp = start_time.val();
            let endTimeExp = end_time.val();
            let descriptionExp = description_Exp.val();

            let error_position =$('.error_position');
            let error_company =$('.error_company');
            let error_field_work =$('.error_field_work');
            let error_start_time =$('.error_start_time');
            let error_end_time =$('.error_end_time');
            let error_description_exp =$('.error_description_exp');

            let dataInsertExp ={
                account_id  : Id,
                start_time  : startTimeExp,
                end_time    : endTimeExp,
                position    : positionExp,
                company     : companyExp,
                field_work  : fieldWorkExp,
                description : descriptionExp,
                reference   : referenceExp
            };
            console.log(dataInsertExp);
            let accountExp = $.post('/account/add-exp',dataInsertExp);
            accountExp.done(function(data){
                console.log(data[0].company);
                console.log(data[1]);
                location.reload();
            });
            accountExp.fail(function(data){
                let errors = data.responseJSON.error;
                $('.error-create-account-exp').html('');

                if (typeof errors.position != 'undefined') {
                    error_position.append('<span class="help-block m-b-none alert alert-danger">' + errors.position[0] + '</span>');
                }
                if (typeof errors.company != 'undefined') {
                    error_company.append('<span class="help-block m-b-none alert alert-danger">' + errors.company[0] + '</span>');
                }
                if (typeof errors.field_work != 'undefined') {
                    error_field_work.append('<span class="help-block m-b-none alert alert-danger">' + errors.field_work[0] + '</span>');
                }
                if (typeof errors.start_time != 'undefined') {
                    error_start_time.append('<span class="help-block m-b-none alert alert-danger">' + errors.start_time[0] + '</span>');
                }
                if (typeof errors.end_time != 'undefined') {
                    error_end_time.append('<span class="help-block m-b-none alert alert-danger">' + errors.end_time[0] + '</span>');
                }
                if (typeof errors.description != 'undefined') {
                    error_description_exp.append('<span class="help-block m-b-none alert alert-danger">' + errors.description[0] + '</span>');
                }

            });
        });
//create education
        btnEduAccount.on('click', function () {
            let Id = $(this).attr('data-id');
            let schoolEdu = school.val();
            let filedStudyEdu = filed_study.val();
            let degreeEdu = degree.val();
            let descriptionEdu = description_edu.val();
            let endTimeEdu = end_time_edu.val();
            let startTimeEdu = start_time_edu.val();

            let error_school =$('.error_school');
            let error_filed_study =$('.error_filed_study');
            let error_degree =$('.error_degree');
            let error_description_edu =$('.error_description_edu');
            let error_start_time_edu =$('.error_start_time_edu');
            let error_end_time_edu =$('.error_end_time_edu');

            let dataInsertEdu = {
                account_id      : Id,
                school          : schoolEdu,
                filed_study     : filedStudyEdu,
                degree          : degreeEdu,
                description     : descriptionEdu,
                start_time : startTimeEdu,
                end_time : endTimeEdu,
            };
            console.log(dataInsertEdu);
            let accountEdu = $.post('/account/add-account-education',dataInsertEdu);
            accountEdu.done(function() {

            });

            accountEdu.fail(function(data) {
                let errors = data.responseJSON.error;
                $('.error-create-account-edu').html('');
                if (typeof errors.school != 'undefined') {
                    error_school.append('<span class="help-block m-b-none alert alert-danger">' + errors.school[0] + '</span>');
                }
                if (typeof errors.filed_study != 'undefined') {
                    error_filed_study.append('<span class="help-block m-b-none alert alert-danger">' + errors.filed_study[0] + '</span>');
                }
                if (typeof errors.degree != 'undefined') {
                    error_degree.append('<span class="help-block m-b-none alert alert-danger">' + errors.degree[0] + '</span>');
                }
                 if (typeof errors.description != 'undefined') {
                     error_description_edu.append('<span class="help-block m-b-none alert alert-danger">' + errors.description[0] + '</span>');
                }
                 if (typeof errors.start_time != 'undefined') {
                     error_start_time_edu.append('<span class="help-block m-b-none alert alert-danger">' + errors.start_time[0] + '</span>');
                }
                 if (typeof errors.end_time != 'undefined') {
                     error_end_time_edu.append('<span class="help-block m-b-none alert alert-danger">' + errors.end_time[0] + '</span>');
                }

            });
        });
        $('#job_search_status').on('change', function(){
            $('input[name="job_search_status"]').val($(this).val());
        });

    });
}(window.jQuery, window, document));
// delete account exp
function deleteAccountExp(id) {
    console.log(id);
    let DeleteAccountExp = $.post('/account/delete-exp/' + id);
    DeleteAccountExp.then(function (data) {
        console.log(data);
    });
    $('#account_exp_'+id).remove();
}
// update account exp
function updateAccountExp(id) {
    let getDataAccountExp = $.get("/account/get-exp/" + id);
    getDataAccountExp.then(function (data) {
        $('#modal-form-upadte-account-exp').modal().show();
        console.log(data.position);
        $('#position_update_exp').val(data.position).trigger("chosen:updated");
        $('#company_update_exp').val(data.company);
        $('#field_work_update_exp').val(data.field_work).trigger("chosen:updated");
        $('#start_time_update_exp').val(data.start_time);
        $('#end_time_update_exp').val(data.end_time);
        $('#description_Exp_update_exp').val(data.description);
        $('#Account_Exp_Id').val(data.id);
        console.log(data);
    });
    $('#btnExpAccount_update_exp').on('click', function () {
        let fieldWorkExp = $('#field_work_update_exp option:selected').text();
        let positionExp = $('#position_update_exp option:selected').text();
        let Id = $(this).attr('data-id');
        let dataUpdate = {
            account_id: Id,
            company: $('#company_update_exp').val(),
            description: $('#description_Exp_update_exp').val(),
            end_time: $('#end_time_update_exp').val(),
            field_work: $('#field_work_update_exp').val(),
            id: $('#Account_Exp_Id').val(),
            position: $('#position_update_exp').val(),
            start_time: $('#start_time_update_exp').val(),
        };
        let updateAccountExp = $.post('/account/update-exp/'+ Id, dataUpdate);

        $('#list_account_exp').append(
            '<div class="item-box item-box--has-tool" id="account_exp_' + Id + '">\n' +
            '                                            <div class="item-box__inner">\n' +
            '                                                <div class="item-box__head m-b-15">\n' +
            '                                                    <span class="item-box__title s-text7 m-r-20">'+ $('#company_update_exp').val() +'</span>\n' +
            '                                                    <span class="item-box__date s-text8">'+$('#start_time_update_exp').val()+' - '+$('#end_time_update_exp').val()+'</span>\n' +
            '                                                </div>\n' +
            '                                                <div class="item-box__label s-text11 m-b-5">'+ positionExp +' - '+ fieldWorkExp +'</div>\n' +
            '                                                <div class="item-box__desc">'+$('#description_Exp_update_exp').val()+'</div>\n' +
            '                                            </div>\n' +
            '                                            <div class="box-tool">\n' +
            '                                                <div class="box-tool__item" onclick="updateAccountExp('+Id+')">\n' +
            '                                                    <i class="icon-edit"></i>\n' +
            '                                                </div>\n' +
            '                                                <div class="box-tool__item" onclick="deleteAccountExp(' + Id + ')">\n' +
            '                                                    <i class="icon-trash"></i>\n' +
            '                                                </div>\n' +
            '                                            </div>\n' +
            '                                        </div>'
        );
        console.log(dataUpdate);
    })
}
