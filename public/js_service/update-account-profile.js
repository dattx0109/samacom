$(function () {
// dateTimePicker
    $('#data_1 .input-group.date').datepicker({
        format:'dd-mm-yyyy',
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
// CSRF token
    $.ajaxSetup({
        headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
    });

    //todo khai bao object Profile
    let Profile = (function ($, window, document) {
        let dataRequest = {};
        //todo khai bao thuoc tinh
        dataRequest.name = $('input[name="name"]');
        dataRequest.province_id = $('input[name="province_id"]')
        //education
        dataRequest.school = $('#school');
        dataRequest.filed_study = $('#filed_study');
        dataRequest.degree = $('#degree');
        dataRequest.description_edu = $('#description_edu');
        dataRequest.btnEduAccount = $('#btnEduAccount');
        dataRequest.start_time_edu = $('#start_time_edu');
        dataRequest.end_time_edu = $('#end_time_edu');

        dataRequest.error_school =$('.error_school');
        dataRequest.error_filed_study =$('.error_filed_study');
        dataRequest.error_degree =$('.error_degree');
        dataRequest.error_description_edu =$('.error_description_edu');
        dataRequest.error_start_time_edu =$('.error_start_time_edu');
        dataRequest.error_end_time_edu =$('.error_end_time_edu');
        // kinh nghiem
        dataRequest.position_exp        = $('#position_exp');
        dataRequest.company_exp         = $('#company_exp');
        dataRequest.field_work_exp      = $('#field_work_exp');
        dataRequest.start_time_exp      = $('#start_time_exp');
        dataRequest.end_time_exp        = $('#end_time_exp');
        dataRequest.description_exp     = $('#description_exp');
        dataRequest.btnExpAccount       = $('#btnExpAccount');
        dataRequest.status_work         = $('#still_in_role');
        dataRequest.appendDataExp       = $('#list_account_exp');

        dataRequest.error_position      =$('.error_position');
        dataRequest.error_company       =$('.error_company');
        dataRequest.error_field_work    =$('.error_field_work');
        dataRequest.error_start_time    =$('.error_start_time');
        dataRequest.error_end_time      =$('.error_end_time');
        dataRequest.error_description_exp =$('.error_description_exp');

        // ky nang
        dataRequest.btnSkill        = $('#btnSkill');
        dataRequest.pointSkill      = $('#point');
        dataRequest.skill           = $('#skill');
        dataRequest.appendDataSkill = $('#list_account_skill');

        dataRequest.error_point_skill         =$('.error_point');
        dataRequest.error_skill_skill         =$('.error_skill');

        //todo khai bao phuong thuc
        dataRequest.getDistrict = function () {
        };
        return dataRequest;
    }(window.jQuery, window, document));
   //todo su dung.

    // creat education
    Profile.btnEduAccount.on('click', function () {
        let Id = $(this).attr('data-id');
        let school              = Profile.school.val() ;
        let filed_study         = Profile.filed_study.val();
        let degree              = Profile.degree.val();
        let description_edu     = Profile.description_edu.val();
        let start_time_edu      = Profile.start_time_edu.val();
        let end_time_edu        = Profile.end_time_edu.val();

        let dataInsertEdu = {
            account_id      : Id,
            school          : school,
            filed_study     : filed_study,
            degree          : degree,
            description     : description_edu,
            start_time      : start_time_edu,
            end_time        : end_time_edu,
        };
        // console.log(dataInsertEdu);
        let accountEdu = $.post('/account/add-account-education',dataInsertEdu);
        accountEdu.done(function(data) {
            console.log(data);
            $('.listAccountEdu').append(
                '<div class="item-box item-box--has-tool" id="education'+ data[0].id +'">\n'+
                '                                            <div class="item-box__inner">\n' +
                '                                                <div class="item-box__head m-b-15">\n' +
                '                                                    <span class="item-box__title s-text7 m-r-20">'+school+'</span>\n' +
                '                                                    <span class="item-box__date s-text8">'+ start_time_edu+' '+ end_time_edu+'</span>\n' +
                '                                                </div>\n' +
                '                                                <div class="item-box__label s-text11 m-b-5">'+ filed_study+'</div>\n' +
                '                                                <div class="item-box__desc">'+description_edu +'</div>\n' +
                '                                            </div>\n' +
                '                                            <div class="box-tool">\n' +
                '                                                <div class="box-tool__item"\n' +
                '                                                     onclick="getEducation('+data[0].id +')">\n' +
                '                                                    <i class="fa fa-edit"></i>\n' +
                '                                                </div>\n' +
                '                                                <div class="box-tool__item"\n' +
                '                                                     onclick="deleteEducation('+ data[0].id +')">\n' +
                '                                                    <i class="fa fa-trash"></i>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>'

            );
            $('#modal-form1').modal('hide');
            // $('#formEducation').trigger("reset")

        });
        accountEdu.fail(function(data) {
            let errors = data.responseJSON.error;
            $('.error-create-account-edu').html('');
            if (typeof errors.school != 'undefined') {
                Profile.error_school.append('<span class="help-block m-b-none alert alert-danger">' + errors.school[0] + '</span>');
            }
            if (typeof errors.filed_study != 'undefined') {
                Profile.error_filed_study.append('<span class="help-block m-b-none alert alert-danger">' + errors.filed_study[0] + '</span>');
            }
            if (typeof errors.degree != 'undefined') {
                Profile.error_degree.append('<span class="help-block m-b-none alert alert-danger">' + errors.degree[0] + '</span>');
            }
            if (typeof errors.description != 'undefined') {
                Profile.error_description_edu.append('<span class="help-block m-b-none alert alert-danger">' + errors.description[0] + '</span>');
            }
            if (typeof errors.start_time != 'undefined') {
                Profile.error_start_time_edu.append('<span class="help-block m-b-none alert alert-danger">' + errors.start_time[0] + '</span>');
            }
            if (typeof errors.end_time != 'undefined') {
                Profile.error_end_time_edu.append('<span class="help-block m-b-none alert alert-danger">' + errors.end_time[0] + '</span>');
            }


    // kinh nghiem
    Profile.status_work.on('change', function () {
        $(".div_date_end").toggle();
        let day     = new Date().getDate();
        let month   = new Date().getMonth()+1;
        let year    = new Date().getFullYear();
        let statusWork = day + '-' + month + '-' + year ;
        Profile.end_time_exp.val(statusWork);
    });
    Profile.btnExpAccount.on('click', function () {
        let Id = $(this).attr('data-id');
        let positionExp     = Profile.position_exp.val();
        let companyExp      = Profile.company_exp.val();
        let fieldWorkExp    = Profile.field_work_exp.val();
        let startTimeExp    = Profile.start_time_exp.val();
        let endTimeExp      = Profile.end_time_exp.val();
        let descriptionExp  = Profile.description_exp.val();

        let dataInsertExp ={
            account_id  : Id,
            start_time  : startTimeExp,
            end_time    : endTimeExp,
            position    : positionExp,
            company     : companyExp,
            field_work  : fieldWorkExp,
            description : descriptionExp
        };
        console.log(dataInsertExp);
        let accountExp = $.post('/account/add-exp',dataInsertExp);

        accountExp.done(function(data){
            let dataPercentage = Math.round(data[1]);
            console.log(data[0]);
            console.log(dataPercentage);
            // console.log(data[1].toFixed(0));
            $('#list_account_exp').append(
                '<div class="item-box item-box--has-tool" id="account_exp_' + data[0].id + '">\n' +
                '                                            <div class="item-box__inner">\n' +
                '                                                <div class="item-box__head m-b-15">\n' +
                '                                                    <span class="item-box__title s-text7 m-r-20">'+ data[0].company +'</span>\n' +
                '                                                    <span class="item-box__date s-text8">'+data[0].start_time+' - '+data[0].end_time+'</span>\n' +
                '                                                </div>\n' +
                '                                                <div class="item-box__label s-text11 m-b-5">'+ data[0].position +' - '+ data[0].field_work +'</div>\n' +
                '                                                <div class="item-box__desc">'+data[0].description+'</div>\n' +
                '                                            </div>\n' +
                '                                            <div class="box-tool">\n' +
                '                                                <div class="box-tool__item" onclick="updateAccountExp('+data[0].id+')">\n' +
                '                                                    <i class="icon-edit"></i>\n' +
                '                                                </div>\n' +
                '                                                <div class="box-tool__item" onclick="deleteAccountExp(' + data[0].id + ')">\n' +
                '                                                    <i class="icon-trash"></i>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>'
            );

            // setTimeout(function(){
                $('#modal-form').modal('hide');
                $('#form_creat_exp').trigger("reset");
             // }, 2000);

            $('#percentage_profile').remove().html();

            $('#percentage_profile_all').append(
                ' <div class="page-point__item" id="percentage_profile">\n' +
                '                                                <div class="page-point__title m-b-7">Mức độ hoàn thành CV</div>\n' +
                '                                                <div class="page-point__point">'+ dataPercentage +''+'%'+'</div>\n' +
                '                                                <div class="page-point__block">\n' +
                '                                                    <div class="page-point__progress" style="width: '+dataPercentage+''+'%'+';"></div>\n' +
                '                                                </div>\n' +
                '                                            </div>'
            );

            // location.reload();
        });

        });
    });

});
    // creat kinh nghiem
    Profile.status_work.on('change', function () {
        $(".div_date_end").toggle();
        let day         = new Date().getDate();
        let month       = new Date().getMonth()+1;
        let year        = new Date().getFullYear();
        let statusWork  = day + '-' + month + '-' + year ;
        Profile.end_time_exp.val(statusWork);
    });
    Profile.btnExpAccount.on('click', function () {
        let Id = $(this).attr('data-id');
        let positionExp     = Profile.position_exp.val();
        let companyExp      = Profile.company_exp.val();
        let fieldWorkExp    = Profile.field_work_exp.val();
        let startTimeExp    = Profile.start_time_exp.val();
        let endTimeExp      = Profile.end_time_exp.val();
        let descriptionExp  = Profile.description_exp.val();

        let dataInsertExp ={
            account_id  : Id,
            start_time  : startTimeExp,
            end_time    : endTimeExp,
            position    : positionExp,
            company     : companyExp,
            field_work  : fieldWorkExp,
            description : descriptionExp
        };
        console.log(dataInsertExp);
        let accountExp = $.post('/account/add-exp',dataInsertExp);

        accountExp.done(function(data){
            let dataPercentage = Math.round(data[1]);
            console.log(data[0]);
            console.log(dataPercentage);
            // console.log(data[1].toFixed(0));
            Profile.appendDataExp.append(
                '<div class="item-box item-box--has-tool" id="account_exp_' + data[0].id + '">\n' +
                '                                            <div class="item-box__inner">\n' +
                '                                                <div class="item-box__head m-b-15">\n' +
                '                                                    <span class="item-box__title s-text7 m-r-20">'+ data[0].company +'</span>\n' +
                '                                                    <span class="item-box__date s-text8">'+data[0].start_time+' - '+data[0].end_time+'</span>\n' +
                '                                                </div>\n' +
                '                                                <div class="item-box__label s-text11 m-b-5">'+ data[0].position +' - '+ data[0].field_work +'</div>\n' +
                '                                                <div class="item-box__desc">'+data[0].description+'</div>\n' +
                '                                            </div>\n' +
                '                                            <div class="box-tool">\n' +
                '                                                <div class="box-tool__item" onclick="updateAccountExp('+data[0].id+')">\n' +
                '                                                    <i class="icon-edit"></i>\n' +
                '                                                </div>\n' +
                '                                                <div class="box-tool__item" onclick="deleteAccountExp(' + data[0].id + ')">\n' +
                '                                                    <i class="icon-trash"></i>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>'
            );

            // setTimeout(function(){
            $('#modal-form').modal('hide');
            $('#form_creat_exp').trigger("reset");
            // }, 2000);

            $('#percentage_profile').remove().html();
            $('#percentage_profile_all').append(
                ' <div class="page-point__item" id="percentage_profile">\n' +
                '                                                <div class="page-point__title m-b-7">Mức độ hoàn thành CV</div>\n' +
                '                                                <div class="page-point__point">'+ dataPercentage +''+'%'+'</div>\n' +
                '                                                <div class="page-point__block">\n' +
                '                                                    <div class="page-point__progress" style="width: '+dataPercentage+''+'%'+';"></div>\n' +
                '                                                </div>\n' +
                '                                            </div>'
            );

            // location.reload();
        });

        accountExp.fail(function(data){
            let errors = data.responseJSON.error;
            $('.error-create-account-exp').html('');

            if (typeof errors.position != 'undefined') {
                Profile.error_position.append('<span class="help-block m-b-none alert alert-danger">' + errors.position[0] + '</span>');
            }
            if (typeof errors.company != 'undefined') {
                Profile.error_company.append('<span class="help-block m-b-none alert alert-danger">' + errors.company[0] + '</span>');
            }
            if (typeof errors.field_work != 'undefined') {
                Profile.error_field_work.append('<span class="help-block m-b-none alert alert-danger">' + errors.field_work[0] + '</span>');
            }
            if (typeof errors.start_time != 'undefined') {
                Profile.error_start_time.append('<span class="help-block m-b-none alert alert-danger">' + errors.start_time[0] + '</span>');
            }
            if (typeof errors.end_time != 'undefined') {
                Profile.error_end_time.append('<span class="help-block m-b-none alert alert-danger">' + errors.end_time[0] + '</span>');
            }
            if (typeof errors.description != 'undefined') {
                Profile.error_description_exp.append('<span class="help-block m-b-none alert alert-danger">' + errors.description[0] + '</span>');
            }

        });
    });
    // creat ky nang
    Profile.btnSkill.on('click', function () {
        let Id = $(this).attr('data-id');
        let pointSkill = Profile.pointSkill.val();
        let skillAcc = Profile.skill.val();

        let dataInsertSkill ={
            account_id  : Id,
            skill_id    : skillAcc,
            point       : pointSkill,
        };
        let accountSkill = $.post('/account/add-account-skill',dataInsertSkill )
        accountSkill.done(function(data){
            console.log(data);
            Profile.appendDataSkill.append(
                '<div class="page-point__item page-point__item--delete m-b-12" id="account_skill_' + data.id + '">\n' +
                '                                                <div class="page-point__title s-text9 m-b-7">' + data.name_skill + '</div>\n' +
                '                                                <div class="page-point__point s-text9">' + data.point + '\n' +
                '                                                    %\n' +
                '                                                </div>\n' +
                '                                                <div class="page-point__block">\n' +
                '                                                    <div class="page-point__progress"\n' +
                '                                                         style="width: ' + data.point + '%;"></div>\n' +
                '                                                </div>\n' +
                '                                                <div class="page-point__delete--hover" \n' +
                '                                                     onclick="deleteAccountExp(' + data.id + ')">\n' +
                '                                                    <div class="page-point__delete"><i class="icon-trash"></i></div>\n' +
                '                                                </div>\n' +
                '                                            </div>'
            )

            $('#modal-form_ky_nang').modal('hide');
            $('.help-block').remove();
            $('#skill option:first').prop('selected',true);
            $('#form_create_skill').trigger("reset");
        });
        accountSkill.fail(function(data){
            var errors = data.responseJSON.errors;
            $('.error-create-skill').html();

            if (typeof errors.point != 'undefined') {
                Profile.error_point_skill.append('<span class="help-block m-b-none alert alert-danger">' + errors.point[0] + '</span>');
            }
            if (typeof errors.skill_id != 'undefined') {
                Profile.error_skill_skill.append('<span class="help-block m-b-none alert alert-danger">' + errors.skill_id[0] + '</span>');
            }
        });
    })

});


// delete kinh nghiem
function deleteAccountExp(id) {
    console.log(id);
    let deleteAccountExp = $.post('/account/delete-exp/' + id);
    deleteAccountExp.then(function (data) {
        console.log(Math.round(data));
    });
    $('#account_exp_'+id).remove();
}
// edit kinh nghiem
$('#modal-form-update-account-exp').on('hidden.bs.modal', function () {
    $('#form_update_exp').trigger("reset");
});
$('#still_in_role_update').on('change', function () {
    $(".div_date_end_update").toggle();
    let date         = new Date().getDate();
    let month       = new Date().getMonth()+1;
    let year        = new Date().getFullYear();
    let statusWork  = date + '-' + month + '-' + year ;
    $('#end_time_update_exp').val(statusWork);
    console.log(statusWork);
});
function updateAccountExp(id) {
    function formatDateTime(selecter){
        let dateUpdate = new Date(selecter).getDate().toString().padStart(2, '0');
        let monthUpdate = (new Date(selecter).getMonth()+1).toString().padStart(2, '0');
        let yearUpdate = new Date(selecter).getFullYear();
        let dataTime = dateUpdate + '-' + monthUpdate + '-' + yearUpdate ;
        return dataTime;
    }
    let getDataAccountExp = $.get("/account/get-exp/" + id);

    getDataAccountExp.then(function (data) {
        let startTimeUpdate = formatDateTime(data.start_time);
        let endTimeUpdate   = formatDateTime(data.end_time);
        console.log(data, startTimeUpdate, endTimeUpdate);

        $('#modal-form-update-account-exp').modal().show();
        $('#position_update_exp').val(data.position).trigger("chosen:updated");
        $('#company_update_exp').val(data.company);
        $('#field_work_update_exp').val(data.field_work).trigger("chosen:updated");
        $('#start_time_update_exp').val(startTimeUpdate);
        $('#end_time_update_exp').val(endTimeUpdate);
        $('#description_update_exp').val(data.description);
        $('#account_exp_id').val(data.id);
    });

    $('#btnExpAccount_update_exp').on('click', function () {
        let fieldWorkExp = $('#field_work_update_exp option:selected').text();
        let positionExp = $('#position_update_exp option:selected').text();
        let Id = $(this).attr('data-id');

        var error_position_update          =$('.error_position_update');
        var error_company_update           =$('.error_company_update');
        var error_field_work_update        =$('.error_field_work_update');
        var error_start_time_update        =$('.error_start_time_update');
        var error_end_time_update          =$('.error_end_time_update');
        var error_description_exp_update   =$('.error_description_exp_update');

        let dataUpdate = {
            account_id      : Id,
            company         : $('#company_update_exp').val(),
            description     : $('#description_update_exp').val(),
            end_time        : $('#end_time_update_exp').val(),
            field_work      : $('#field_work_update_exp').val(),
            id              : $('#account_exp_id').val(),
            position        : $('#position_update_exp').val(),
            start_time      : $('#start_time_update_exp').val(),
        };
        console.log(dataUpdate);
        let updateAccountExp = $.post('/account/update-exp/'+ Id, dataUpdate);

        updateAccountExp.done(function (data) {
            console.log('success', 'Haaaaaaaaa');
            $('#account_exp_'+id).remove();

            $('#list_account_exp').append(
                '<div class="item-box item-box--has-tool" id="account_exp_' + data.id + '">\n' +
                '                                            <div class="item-box__inner">\n' +
                '                                                <div class="item-box__head m-b-15">\n' +
                '                                                    <span class="item-box__title s-text7 m-r-20">'+ data.company +'</span>\n' +
                '                                                    <span class="item-box__date s-text8">'+data.start_time+' - '+data.end_time+'</span>\n' +
                '                                                </div>\n' +
                '                                                <div class="item-box__label s-text11 m-b-5">'+ data.position +' - '+ data.field_work +'</div>\n' +
                '                                                <div class="item-box__desc">'+data.description+'</div>\n' +
                '                                            </div>\n' +
                '                                            <div class="box-tool">\n' +
                '                                                <div class="box-tool__item" onclick="updateAccountExp('+data.id+')">\n' +
                '                                                    <i class="icon-edit"></i>\n' +
                '                                                </div>\n' +
                '                                                <div class="box-tool__item" onclick="deleteAccountExp(' + data.id + ')">\n' +
                '                                                    <i class="icon-trash"></i>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>'
            );
            $('#modal-form-update-account-exp').modal('hide');
        });
        updateAccountExp.fail(function(data){
            console.log(data.responseJSON.error);
            let errors = data.responseJSON.error;
            $('.error-create-account-exp-update').html('');

            if (typeof errors.position != 'undefined') {
                error_position_update.append('<span class="help-block m-b-none alert alert-danger">' + errors.position[0] + '</span>');
            }
            if (typeof errors.company != 'undefined') {
                error_company_update.append('<span class="help-block m-b-none alert alert-danger">' + errors.company[0] + '</span>');
            }
            if (typeof errors.field_work != 'undefined') {
                error_field_work_update.append('<span class="help-block m-b-none alert alert-danger">' + errors.field_work[0] + '</span>');
            }
            if (typeof errors.start_time != 'undefined') {
                error_start_time_update.append('<span class="help-block m-b-none alert alert-danger">' + errors.start_time[0] + '</span>');
            }
            if (typeof errors.end_time != 'undefined') {
                error_end_time_update.append('<span class="help-block m-b-none alert alert-danger">' + errors.end_time[0] + '</span>');
            }
            if (typeof errors.description != 'undefined') {
                error_description_exp_update.append('<span class="help-block m-b-none alert alert-danger">' + errors.description[0] + '</span>');
            }
        });

    })
}

// delete education
function deleteEducation(id) {
    let url = $.post("/account/delete-account-education/" + id);
    $('#education' + id).remove();
}
//edit education
function getEducation(id) {
    let url = $.get("/account/get-account-education/" + id);
    url.then(function (data1) {
        console.log(data1);
        $('#edit_education').modal('show');
        $('#idEductionCount').val(data1.account_id)
        $('#edit_school').val(data1.school);
        $('#edit_filed_study').val(data1.filed_study);
        $('#edit_degree').val(data1.degree).trigger('chosen:updated');
        $('#edit_description_edu').val(data1.description);
        $('#edit_start_time_edu').val(data1.start_time);
        $('#edit_end_time_edu').val(data1.end_time);
    });
    $('#btnEditEduAccount').on('click',function () {
        // let id = $(this).attr('data-id');
        console.log(id)
        let dataEditEduCation = {
            id : id,
            account_id:$('#idEductionCount').val(),
            degree : $('#edit_degree option:selected').val(),
            description :         $('#edit_description_edu').val(),
            end_time :         $('#edit_end_time_edu').val(),
            filed_study :         $('#edit_filed_study').val(),
            start_time :        $('#edit_start_time_edu').val(),
            school :         $('#edit_school').val(),

        };
        let url1 = $.post("/account/update-account-education/" + id , dataEditEduCation);
        console.log(url1)
        url1.done(function (data) {
            console.log(data)
            $('.listAccountEdu').append(
                '<div class="item-box"  id="education'+id+'" >\n' +
                '                                <div class="item-box__inner">\n' +
                '                                    <div class="item-box__head m-b-15">\n' +
                '                                        <span class="item-box__title s-text7 m-r-20">' + dataEditEduCation.school +'</span>\n' +
                '                                        <span class="item-box__date s-text8">'+dataEditEduCation.start_time +''+dataEditEduCation.end_time +'</span>\n' +
                '                                    </div>\n' +
                '                                    <div class="item-box__label s-text11 m-b-5">'+dataEditEduCation.filed_study +'</div>\n' +
                '                                    <div class="item-box__desc">'+dataEditEduCation.description+'</div>\n' +
                '                                </div>\n' +
                '                                <div class="box-tool">\n' +
                '                                    <div class="box-tool__item" onclick="getEducation('+ dataEditEduCation.id+')" >\n' +
                '                                        <i class="fa fa-edit"></i>\n' +
                '                                    </div>\n' +
                '                                    <div id="delete_education" onclick="deleteEducation('+ dataEditEduCation.id +')" class="box-tool__item" >\n' +
                '                                        <i class="fa fa-trash"></i>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>'

            );
            $('#edit_education').modal('hide');
            $("#education"+ id ).remove();
        })
    })

}

// delete skill
function deleteAccountSkill(id) {
    let deleteAccountSkill = $.post("/account/delete-account-skill/" + id);
    $('#account_skill_'+id).remove();
}
