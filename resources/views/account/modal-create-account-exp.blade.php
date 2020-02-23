<div id="modal-form" class="modal fade modal-no-padding" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup-container p-b-25">
                    <div class="m-text3 m-b-20">Kinh nghiệm làm việc</div>
                    <form method="post" action="" id="form_creat_exp">
                        <div class="form-group m-b-20">
                            <label class="m-b-6">Chức vụ<sup>*</sup></label>
                            <div class="select-wrapper">
                                <select id="position_exp" name="position" data-placeholder="Chọn chức vụ ..." class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn chức vụ </option>
                                    @foreach(getRank() as $key => $rank)
                                        <option  value="{{$key}}">{{$rank}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="error-create-account-exp error_position"></div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="m-b-6">Công ty<sup>*</sup></label>
                            <input type="text" placeholder="Công ty" class="form-control" name="company"
                                   id="company_exp">
                            <div class="error-create-account-exp error_company"></div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="m-b-6">Ngành nghề<sup>*</sup></label>
                            <div class="select-wrapper">
                                <select id="field_work_exp" name="field_work" data-placeholder="Chọn ngành nghề ..." class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn ngành nghề </option>
                                    @foreach($fieldJobs as $key => $fieldJob)
                                        <option value="{{$key}}">{{$fieldJob}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="error-create-account-exp error_field_work"></div>
                        </div>
                        <div class="form-group m-b-20" id="data_1">
                            <label class="m-b-6">Thời gian bắt đầu<sup>*</sup></label>
                            <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="form-control" name="start_time" id="start_time_exp">
                            </div>
                            <div class="error-create-account-exp error_start_time"></div>
                        </div>
                        <div class="form-group div_date_end m-b-20" id="data_1" >
                            <label class="m-b-6">Thời gian kết thúc<sup>*</sup></label>
                            <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="form-control" name="end_time" id="end_time_exp">
                            </div>
                            <div class="error-create-account-exp error_end_time"></div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="m-b-6 w100">Trạng thái làm việc</label>
                            <label class="s-text8" for="still_in_role">
                                <input type="checkbox" name="still_in_role" class="checkbox-input" id="still_in_role" value="">
                                Đang làm việc
                            </label>
                        </div>
                        <div class="form-group m-b-25">
                            <label class="m-b-6">Mô tả công việc trước đây<sup>*</sup></label>
                            <textarea type="text" placeholder="Mô tả công việc trước đây" class="form-control"
                                      name="description_exp" id="description_exp"></textarea>
                            <span class="text-danger notificaiton_phone pull-right text-under-input"></span>
                            <div class="error-create-account-exp error_description_exp"></div>
                        </div>
                        <div class="popup-btn-container tar">
                            <div data-id="{{$account->id}}" class="button-primary" id="btnExpAccount">Lưu lại</div>
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
