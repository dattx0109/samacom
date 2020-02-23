(function($, window, document) {
    $(function () {
        const emailLogin = $('#phone');
        const passwordLogin = $('#password');
        const $btnLogin = $('#btnLogin');
        const notificaitonErrorPhone = $('.notificaiton_phone');
        const notificaitonErrorPassword = $('.notificaiton_password');
        // const $loadingDom        = '<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>';
        const $loadingDom        = '<div class="sk-spinner sk-spinner-circle">' +
                                    '<div class="sk-circle1 sk-circle"></div>' +
                                    '<div class="sk-circle2 sk-circle"></div>' +
                                    '<div class="sk-circle3 sk-circle"></div>' +
                                    '<div class="sk-circle4 sk-circle"></div>' +
                                    '<div class="sk-circle5 sk-circle"></div>' +
                                    '<div class="sk-circle6 sk-circle"></div>' +
                                    '<div class="sk-circle7 sk-circle"></div>' +
                                    '<div class="sk-circle8 sk-circle"></div>' +
                                    '<div class="sk-circle9 sk-circle"></div>' +
                                    '<div class="sk-circle10 sk-circle"></div>' +
                                    '<div class="sk-circle11 sk-circle"></div>' +
                                    '<div class="sk-circle12 sk-circle"></div>' +
                                    '</div>';

        $btnLogin.on('click', function () {
            console.log(11111);
            let phone = emailLogin.val();
            let password = passwordLogin.val();

            let vnf_regex = /(084|\+84|09|0[1-9])+([0-9]{8})/gm;
            // var mobile = $('#mobile').val();

            if(phone !==''){
                if (vnf_regex.test(phone) === false) {
                    notificaitonErrorPhone.text('Số điện thoại của bạn không đúng định dạng!');
                }else{
                     notificaitonErrorPhone.text('');
                    let rawData = {
                        phone : phone,
                        password : password
                    };
                    checkNumberPhone(rawData);
                }
            }else{
                notificaitonErrorPhone.text('Bạn chưa điền số điện thoại!');
            }

            if(password.length === 0){
                notificaitonErrorPassword.text('Bạn chưa điền mật khẩu!');
                return;
            }

            function checkNumberPhone(rawData){
                let url = "/login";
                let login = $.post(url, rawData);
                login.then(function (data) {

                    if (data.code === 1) {
                        notificaitonErrorPhone.html(data.message);
                    }
                    if (data.code === 2) {
                        notificaitonErrorPassword.html(data.message);
                    }
                    if (data.code === 3) {
                        $btnLogin.html($loadingDom);
                        $btnLogin.attr("disabled", true);

                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                });
            }
        });
    });
}(window.jQuery, window, document));
