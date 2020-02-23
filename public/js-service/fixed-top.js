jQuery(document).ready(function ($) {
    // Check scroll top when scrolling
    var previousScroll = 0;
    $(window).scroll(function(){
        var currentScroll = $(this).scrollTop();

        if (previousScroll > currentScroll && currentScroll > 0){
            $('.fixed-top').removeClass('fixed-top--active');
        }
        else if(currentScroll > 400){
            $('.fixed-top').addClass('fixed-top--active');
        }
        else{
            $('.fixed-top').removeClass('fixed-top--active');
        }

        previousScroll = currentScroll;

    });
    // Job Config tags input
    // $('.tagForm__Input').tagsinput();
});
