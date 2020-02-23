(function($, window, document) {

    // The $ is now locally scoped

    // Listen for the jQuery ready event on the document
    $(function() {
      var timeouts =   $('input[name="timeout"]').val();
      var btn_confirm = $('#btn-confirm');
      var newCode = $('#btn-new-code');
      let count = parseInt((new Date(timeouts) -new Date())*0.001);
        //console.log(count);
        //console.log(timeouts);
        if(count<0){
            $('.confirm_code').html('<span class="text-danger text-under-input">Thời gian nhập mã đã hết. Hãy tạo mã mới </span>');
        }
        // if(timeouts !=='undefined')
        // {
        //     var interval = setInterval(function() {
        //         --count;
        //         if (count <= 0) {
        //             clearInterval(interval);
        //             //location.reload();
        //             return;
        //         }else{
        //             $('#time').text(count);
        //
        //         }
        //     }, 1000);
        // }

        newCode.on('click',function(){
            var data = {
                "_token": $('#token').val()
            };
          let newCode =  $.post('/confirm/new-code-active',data);
            newCode.done(function () {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('Tạo mã mới thành công');

                }, 1300);
                //location.reload();
            });
            newCode.fail(function (data) {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error(data.responseJSON.count);

                }, 1300);

            });
        });
    });



}(window.jQuery, window, document));
