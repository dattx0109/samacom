(function ($, window, document) {
    $(function () {
        let selectSalary = $('select[name = "salary"]');
        let selectDateUpdate = $('select[name = "date_update"]');
        let selectGroupSale = $('select[name = "group_sale[]"]');
        let selectField = $('select[name = "field"]');
        let selectRank = $('select[name = "rank"]');
        let selectProvinceId = $('select[name = "province_id"]');
        let selectDistrictId = $('select[name = "district_id"]');
        let selectIncome = $('select[name = "income"]');
        let selectJobType = $('select[name = "job_type"]');
        let selectSex = $('select[name = "sex"]');
        let listJob='';
        $(document).ready(function() {
            $('.multi-select-sale').multiselect();
        });
        selectSalary.on('change', function () {
            let valSalary = selectSalary.val();
            let valDateUpdate = selectDateUpdate.val();
            var valGroupSale = selectGroupSale.val();
            let valField = selectField.val();
            let valRank = selectRank.val();
            let valProvinceId = selectProvinceId.val();
            let valDistrictId = selectDistrictId.val();
            let valIncome = selectIncome.val();
            let valJobType = selectJobType.val();
            let valSex = selectSex.val();
             listJob += '/danh-sach-cong-viec?salary=' + valSalary + '&date_update=' + valDateUpdate;
           let countGroupSale = valGroupSale.length;
           for(let i=0; i<countGroupSale;i++){
                listJob +='&group_sale%5B%5D='+valGroupSale[i];
            }

            listJob += '&field=' + valField
                + '&rank=' + valRank + '&province_id=' + valProvinceId + '&district_id=' + valDistrictId
                + '&income=' + valIncome + '&job_type=' + valJobType + '&sex=' + valSex;

             window.location.href = listJob;
        });

        selectDateUpdate.on('change', function () {
            let valSalary = selectSalary.val();
            let valDateUpdate = selectDateUpdate.val();
            var valGroupSale = selectGroupSale.val();
            let valField = selectField.val();
            let valRank = selectRank.val();
            let valProvinceId = selectProvinceId.val();
            let valDistrictId = selectDistrictId.val();
            let valIncome = selectIncome.val();
            let valJobType = selectJobType.val();
            let valSex = selectSex.val();
             listJob += '/danh-sach-cong-viec?salary=' + valSalary + '&date_update=' + valDateUpdate;
            let countGroupSale = valGroupSale.length;
            for(let i=0; i<countGroupSale;i++){
                listJob +='&group_sale%5B%5D='+valGroupSale[i];
            }
            listJob +='&field=' + valField
                + '&rank=' + valRank + '&province_id=' + valProvinceId + '&district_id=' + valDistrictId
                + '&income=' + valIncome + '&job_type=' + valJobType + '&sex=' + valSex;

             window.location.href = listJob;
        });

        //select province and show district

        let provinceId = $('select[name="province_id"]');
        provinceId.on('change', function () {
            let district = $.get('/list-district-by-province?province_id=' + provinceId.val());
            let districtHtml = '<option value="">Chọn quận huyện</option>';
            district.done(function (data) {
                let countDistrict = data.length;
                for (let i = 0; i < countDistrict; i++) {
                    districtHtml = districtHtml + '<option value="' + data[i].district_id + '">' + data[i].prefix + ' ' + data[i].district_name + '</option>';
                }
                $('#district_id').html(districtHtml);
                $(".chosen-select").trigger("chosen:updated");
                return data;
            });
            district.fail(function (data) {
                $('#district_id').html(districtHtml);
                $(".chosen-select").trigger("chosen:updated");
            });
        });
        $('#reset_fillter').click(function(){
            $('select[name = "group_sale[]"]').val([]).multiselect('refresh')
            $('#salary').prop('selectedIndex',0);
            $('#date_update').prop('selectedIndex',0);
            $('#field').prop('selectedIndex',0);
            $('#rank').prop('selectedIndex',0);
            $('#province').prop('selectedIndex',0);
            $('#district_id').prop('selectedIndex',0);
            $('#income').prop('selectedIndex',0);
            $('#job_type').prop('selectedIndex',0);
            $('#sex').prop('selectedIndex',0);

        });
    });
}(window.jQuery, window, document));
