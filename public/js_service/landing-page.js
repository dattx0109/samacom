(function($, window, document) {

    $(function() {
    const name = $('#name');
    const phone = $('#phone');
    const email = $('#email');
    const name_company = $('#name_company');
    const btnSubmit = $('#btn_submit');

    btnSubmit.on('click', function () {
       let nameAdvisory         = name.val();
       let phoneAdvisory        = phone.val();
       let emailAdvisory        = email.val();
       let nameCompanyAdvisory  = name_company.val();

        let error_name          =$('.error_name');
        let error_phone         =$('.error_phone');
        let error_email         =$('.error_email');
        let error_name_company  =$('.error_name_company');

        let data = {
          name          : nameAdvisory,
          email         : emailAdvisory,
          phone         : phoneAdvisory,
          name_company  : nameCompanyAdvisory
        };
        console.log(data);

        let advisory = $.post('/landing-advisory', data)

        advisory.fail(function (data) {
            let errors = data.responseJSON.error;
            $('.error-create-advisory').html('');
            console.log(errors);
            if (typeof errors.name != 'undefined') {
                error_name.append('<span class="help-block m-b-none alert alert-danger">' + errors.name[0] + '</span>');
            }
            if (typeof errors.email != 'undefined') {
                error_email.append('<span class="help-block m-b-none alert alert-danger">' + errors.email[0] + '</span>');
            }
            if (typeof errors.phone != 'undefined') {
                error_phone.append('<span class="help-block m-b-none alert alert-danger">' + errors.phone[0] + '</span>');
            }
            if (typeof errors.name_company != 'undefined') {
                error_name_company.append('<span class="help-block m-b-none alert alert-danger">' + errors.name_company[0] + '</span>');
            }
        });
        advisory.done(function(data){
            $('#smcModalRegister').modal('hide');
            $('#form-advisory').trigger("reset");
            $('.help-block ').remove();
        });
    });
        // $('#close_modal').on('click', function(){
        //     $('#form-advisory').trigger("reset");
        //     $('.help-block ').remove();
        // });

        $('.smc-landing-page').on('click', function(){
            $('#smcModalRegister').modal('hide');
            $('#form-advisory').trigger("reset");
            $('.help-block ').remove();
        });

    });


}(window.jQuery, window, document));
