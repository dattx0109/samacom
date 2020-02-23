<div id="modal-form_ky_nang" class="modal fade modal-no-padding" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup-container p-b-25">
                    <div class="m-text3 m-b-20">Kỹ năng ứng viên</div>
                    <form method="post" action="" class="" id="form_create_skill">
                        <div class="form-group m-b-20">
                            <label>Kỹ năng<sup>*</sup></label>
                            <div class="select-wrapper">
                                <select id="skill" name="skill" data-placeholder="Chọn kỹ năng" class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn kỹ năng</option>
                                    @foreach($skill as $key => $item)
                                        <option  value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="error-create-skill error_skill"></div>
                        </div>
                        <div class="form-group m-b-25">
                            <label>Điểm kỹ năng<sup>*</sup></label>
                            <input type="number" min="0" max="100" placeholder="Điểm kỹ năng từ 1 đến 100" class="form-control" id="point" name="point">
                            <div class="error-create-skill error_point"></div>
                        </div>
                        <div class="popup-btn-container tar">
                            <div  data-id="{{$account->id}}" class="button-primary" id="btnSkill">Lưu lại</div>
                        </div>
                    </form>
                    <div class="popup-form-cls" data-dismiss="modal">
                        <div class="popup-form-cls-inner">
                            <i class="icon-close-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
