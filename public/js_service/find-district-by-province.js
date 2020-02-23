(function ($) {
    let District = (function ($, window, document) {
        let dataRequest = {};
        dataRequest.province_id = $('select[name="province_id"]');
        dataRequest.district_id = $('select[name="district_id"]');
        return dataRequest;
    }(window.jQuery, window, document));
    District.province_id.on('change', function(){
        let district = $.get('/workplace/list-district-by-province?province_id=' + $(this).val());
        let districtHtml = '<option value="">Chọn quận huyện</option>';
        district.done(function (data) {
            let countDistrict = data.length;
            for(let i = 0;i<countDistrict;i++ ){
                districtHtml = districtHtml+'<option value="'+data[i].id+'">'+data[i].name +'</option>';
            }
            $('#district_id_wish').html(districtHtml);
            $(".chosen-select").trigger("chosen:updated");
        });
        district.fail(function(data){
            $('#district_id_wish').html(districtHtml);
            $(".chosen-select").trigger("chosen:updated");
        });
    });
})(window.jQuery);
