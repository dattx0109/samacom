@extends('layouts.base')

@section('content')
    <div id="vir">
        <div class="va-container animated fadeInDown">
            <div class="container">
                <div class="va-inner">
                    <p v-bind="virdata"></p>
                    <top-step :virdata="virdata"></top-step>
                    <step1 :virdata="virdata" @pass-data-to-paren="passDataToParent" v-if="virdata.step == 1"></step1>
                    <step2 :virdata="virdata" @pass-data-to-paren="passDataToParent" v-if="virdata.step == 2"></step2>
                    <step3 :virdata="virdata" @pass-data-to-paren="passDataToParent" v-if="virdata.step == 3"></step3>
                    <step4 :virdata="virdata" @pass-data-to-paren="passDataToParent" v-if="virdata.step == 4"></step4>
                    <step-last :virdata="virdata" @pass-data-to-paren="passDataToParent" v-if="virdata.step == 5"></step-last>
                </div>
            </div>
        </div>
{{--        <div class="masa animated fadeInDown mobile-hidden">--}}
{{--            <div id="popup" class="masa-popup popup-active m-b-10">--}}
{{--                <div class="masa-popup__title">--}}
{{--                    Masa - trợ lý ảo của bạn--}}
{{--                </div>--}}
{{--                <div class="masa-popup__text popup-inner" v-if="virdata.step == 1">--}}
{{--                    Chào bạn !</br>Tôi là <b>Masa</b>, trợ lý tư vấn công việc cho bạn.--}}
{{--                    </br>--}}
{{--                    Để hỗ trợ tối đa trong việc tìm kiếm công việc phù hợp, trước tiên hãy chia sẻ cho tôi những <b>Thông tin cơ bản</b> nhé.--}}
{{--                    </br></br>--}}
{{--                    <b>Click</b> vào từng mục để <b>Chọn/Hủy.</b>--}}
{{--                </div>--}}
{{--                <div class="masa-popup__text popup-inner" v-if="virdata.step == 2">--}}
{{--                    Tiếp theo, xin vui lòng hoàn thành những thông tin ở trên.</br>--}}
{{--                    Hãy mô tả cho tôi biết <b>Mong muốn</b> trong công việc của bạn nhé.--}}
{{--                    </br></br>--}}
{{--                    <b>Click</b> vào từng mục để <b>Chọn/Hủy.</b>--}}
{{--                </div>--}}
{{--                <div class="masa-popup__text popup-inner" v-if="virdata.step == 3">--}}
{{--                    Cuối cùng, xin vui lòng hoàn thành <b>Form liên hệ</b> ở trên để hoàn thiện các thông tin.--}}
{{--                </div>--}}
{{--                <div class="masa-popup__text popup-inner" v-if="virdata.step == 5">--}}
{{--                    Trên đây là <b>3 công việc phù hợp</b> với bạn</br>--}}
{{--                    Cảm ơn sự hợp tác của bạn, <b>Masa</b> chúc bạn tìm được công việc ưng ý nhất.--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="masa-visual tar">--}}
{{--                <img src="{{asset('img/masa/masa.png')}}">--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection

@section('CSS')
    <style>
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
@endsection

@section('javascript-vue')
    <script>
{{--        var baseUrlRichFile = {!! json_encode(env('RICH_FILE_URL_BASE') )!!};--}}

        $('input:checkbox').change(function(){
            if($(this).is(':checked'))
                $(this).parent().addClass('is-checked');
            else
                $(this).parent().removeClass('is-checked')
        });
        var userInfo = {!! json_encode(session('user')) !!};
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/vir/vir.js')}}"></script>
    <script src="{{asset('js-service/fixed-top.js')}}" ></script>
@endsection
