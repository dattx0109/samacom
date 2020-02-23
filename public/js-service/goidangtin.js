function getval(sel) {
    console.log(sel.value);
    $('.divPage').hide();
    $('.page' + sel.value).show();
    $('#goithongtin').val(sel.value);
}

$('.click').on('click', function () {
    $('.click').removeClass('main');
    $(this).addClass("main");
    var id = $(this).find('input').val();
    console.log(id);
    $('#goithongtin').val(id);
});
$('#camket').on('click',function () {
    $('.control1').hide();
    $('#sp1').show();
})
$('#camket1').on('click',function () {
    $('.control1').hide();
    $('#sp2').show();
})
$('#camket2').on('click',function () {
    $('.control1').hide();
    $('#sp3').show();
})
$('#camket3').on('click',function () {
    $('.control1').hide();
    $('#sp4').show();
})
$('#camket4').on('click',function () {
    $('.control1').hide();
    $('#sp5').show();
})
