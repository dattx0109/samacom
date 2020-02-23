<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog--freesize">
        <div class="modal-content">
            <div class="modal-body modal-body--no-padding">
                <div class="popup-container p-b-25">
                    <div class="popup-title m-text3 m-b-20 m-m-b-0">Thông báo</div>
                    <div class="display-flex-wrap modal-block-list">
                        <div class="modal-block tac m-r-30 m-m-r-0">
                            <div class="s-text18 m-b-6">Bạn chưa hoàn thành CV</div>
                            <div class="s-text15 m-b-20">Nhấn nút hoàn thành để hoàn thành CV của bạn</div>
                            <div class="l-text1 m-b-4">{{isset($percentageProfile->percentage_profile)?$percentageProfile->percentage_profile:''}}%</div>
                            <div class="s-text14 m-b-30">Hoàn thành thông tin CV</div>
                            <a href="{{route('update-detail')}}?redirect={{url()->full()}}&jobId={{$jobDetail->job_id}}&uid={{app('request')->input('uid')}}" class="button-primary" target="_blank" data-toggle="tooltip" data-placement="top" title="Tới trang hồ sơ cá nhân">Hoàn thành ngay</a>
                        </div>
                        <div class="modal-block tac">
                            <div class="list-tag list-tag--red">Sắp ra mắt</div>
                            <div class="s-text18 m-b-6">Tải lên CV</div>
                            <div class="s-text15 m-b-20">Dùng cho việc ứng tuyển nhanh với hồ sơ có sẵn</div>
                            <img src="{{asset('img/job/popup.png')}}">
                            <a href="" class="button-primary" disabled>Tải CV lên</a>
                        </div>
                    </div>
                    <div class="popup-form-cls" data-dismiss="modal" data-toggle="tooltip" data-placement="top" title="Đóng popup">
                        <div class="popup-form-cls-inner">
                            <i class="icon-close-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
