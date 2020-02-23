(function($, window, document) {

    $(function() {
     let check_apply =  $('input[name="check_apply"]');

     if(check_apply.val()==1){
         $('#myModal').modal('show');
     }

        $( "td:contains('Không có dữ liệu')" ).addClass('null-info-block');
        if($('#wasApplySuccess').length > 0){
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 1000
            };
            toastr.success($('#wasApplySuccess').val());

        };
        if($('#applySuccess').length > 0){

            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 1000
            };
            toastr.success($('#applySuccess').val());

        };
        if($('#applyError').length > 0){

            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 1000
            };
            toastr.error($('#applyError').val());

        };

    });

}(window.jQuery, window, document));
