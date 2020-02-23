(function ($) {
    $(function () {
        let $btnDownloadFile = $('.download-file');
        let $btnCloseFile = $('.document-cls');
        let $popupForm = $('.popup-form');

        $btnDownloadFile.on('click', function () {
            let linkHref =  $(this).attr("data-dowload");
            return window.location.href = linkHref;

            let classDivOpen = $(this).attr("data-id");
            let $inputClass = $('.input-'+$(this).attr("data-id"));
            let $btnClass = $('.btn-'+$(this).attr("data-id"));
            $('.'+classDivOpen).removeAttr('hidden');
            $('.overlay-block').addClass('is-show');


            $inputClass.on('keyup', function (e) {
                if(this.value === 'samacom'){
                    $btnClass.removeAttr('disabled');
                }else{
                    $btnClass.attr('disabled', true);
                }
            });
            $btnClass.on('click', function () {
                let linkHref =  $(this).attr("data-dowload");
                return window.location.href = linkHref;
                $popupForm.attr('hidden', true);
            });
        });
        $btnCloseFile.on('click', function () {
             $popupForm.attr('hidden', true);
            $('.overlay-block').removeClass('is-show');
        });
        $('.overlay-block, .popup-form-cls').on('click', function () {
            $('.overlay-block').removeClass('is-show');
            $popupForm.attr('hidden', true);
        });
    });
})(window.jQuery);
