<div id="edit_education" class="modal fade modal-no-padding" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup-container p-b-25">
                    <div class="m-text3 m-b-20">Sửa Học vấn/Bằng cấp</div>
                    <form method="post" action="">
                        <input type="text" id="idEductionCount" hidden name="nameEductionCount">
                        <div class="form-group m-b-20">
                            <label class="m-b-6">Trường học<sup>*</sup></label>
                            <input type="text" placeholder="Trường học" class="form-control" id="edit_school" name="school">
                            <div class="error-create-account-edu error_school"></div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="m-b-6">Ngành nghề học<sup>*</sup></label>
                            <input type="text" placeholder="Ngành nghề học" class="form-control" id="edit_filed_study" name="filed_study">
                            <div class="error-create-account-edu error_filed_study"></div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="m-b-6">Bằng cấp<sup>*</sup></label>
                            <div class="select-wrapper">
                                <select id="edit_degree" name="degree" data-placeholder="Chọn chức vụ ..." class="chosen-select primary-select" tabindex="2">
                                    <option value="">Chọn bằng cấp </option>
                                    @foreach(getDegreeEduction() as $key => $rank)
                                        <option  value="{{$key}}">{{$rank}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="error-create-account-edu error_degree"></div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="m-b-6">Thành tích trong quá trình học<sup>*</sup></label>
                            <textarea type="text" placeholder="Mô tả quá trình học" class="form-control" id="edit_description_edu"
                                      name="description"></textarea>
                            <div class="error-create-account-edu error_description_edu"></div>
                        </div>
                        <div class="form-group m-b-20" id="data_1">
                            <label class="m-b-6">Thời gian bắt đầu<sup>*</sup></label>
                            <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="form-control" name="start_time_edu" id="edit_start_time_edu">
                            </div>
                            <div class="error-create-account-edu error_start_time_edu"></div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group div_date_end m-b-25-+" id="data_1" >
                                <label class="m-b-6">Thời gian kết thúc<sup>*</sup></label>
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" name="end_time_edu" id="edit_end_time_edu">
                                </div>
                                <div class="error-create-account-edu error_end_time_edu"></div>
                            </div>
                        </div>

                        <div class="popup-btn-container tar">
                            <div class="button-primary" id="btnEditEduAccount" type="submit" style="width: 100%; text-align: center;">Lưu lại</div>
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