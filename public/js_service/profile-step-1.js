(function($) {
    $(function() {
        const btnStep1 = $('.btn-submit-step1');


        btnStep1.on('click', function () {

            let rawDataInsert = {
                'name' : $("input[name='name']").val(),
                'date_of_birth' : $("input[name='date_of_birth']").val(),
                'email' : $("input[name='email']").val(),
                'link_fb' : $("input[name='link_fb']").val(),
                'full_address' : $("input[name='full_address']").val(),
                'gender' : $('input[name=gender]:checked').val(),
                'marital_status' : $('input[name=marital_status]:checked').val(),
                'province_id' : $('#province_id').val(),
                'district_id' : $('#district_id').val()
            };

            var postingUpdateAccountDetail = $.post('/api/update-account-detail', rawDataInsert);

            postingUpdateAccountDetail.then(function (rawData) {
                console.log(rawData);
            });
            console.log(rawDataInsert);
            console.log('==========');
        });


        // muc tieu nghe nghiep
        const btnStep2 = $('.btn-submit-step2');

        btnStep2.on('click', function(){

            let rawDataInsert = {
                'career_goals'                  : $("textarea[name='career_goals']").val(),
                'strengths_weaknesses'          : $("textarea[name='strengths_weaknesses']").val(),
                'extracurricular_activities'    : $("textarea[name='extracurricular_activities']").val(),
            };
            let postingUpdateAccountGoal = $.post('/api/update-account-detail-goal', rawDataInsert);

            postingUpdateAccountGoal.then(function (data) {
                console.log(data);
            });
            console.log(rawDataInsert);
        });

        var buildTimeNow = function () {
            let date         = new Date().getDate();
            let month       = new Date().getMonth()+1;
            let year        = new Date().getFullYear();
            return year + '-' + month + '-' + date ;
        };

        var formatDate = function (date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');
        };

        const updateExpAccount = $('.updateExpAccount');
        const btnUpdateAccountExp = $('#btnExpAccount_update_exp');
        updateExpAccount.on('click', function (data) {
            let rawData = $(this).attr('data-value');
            rawData = $.parseJSON(rawData);

            $("#position_update_exp").val(rawData['position']).trigger("chosen:updated");
            $('#company_update_exp').val(rawData['company']);
            $('#field_work_update_exp').val(rawData['field_work_id']).trigger("chosen:updated");
            $('#start_time_update_exp').val(formatDate(rawData['start_time']));
            $('#end_time_update_exp').val(formatDate(rawData['end_time']));
            $('#description_update_exp').val(rawData['description']);
            $('#account_exp_id').val(rawData['id']);

            if(buildTimeNow() == rawData['end_time']){
                $(".div_date_end_update").hide();
                $("#still_in_role_update").prop( "checked", true );

            }

            $('#modal-form-update-account-exp').modal('show');
            btnUpdateAccountExp.on('click', function () {
                let rawDataInsert = {
                    company         : $('#company_update_exp').val(),
                    description     : $('#description_update_exp').val(),
                    end_time        : $('#end_time_update_exp').val(),
                    field_work      : $('#field_work_update_exp').val(),
                    id              : $('#account_exp_id').val(),
                    position        : $('#position_update_exp').val(),
                    start_time      : $('#start_time_update_exp').val(),
                };

                let postingUpdateAccountExp = $.post('/account/update-exp/', rawDataInsert);
                postingUpdateAccountExp.then(function () {
                    $('#modal-form-update-account-exp').modal('hide');
                });
            });

        })

    });

}(window.jQuery));