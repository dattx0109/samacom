@extends('layouts.home-base')

@section('content')
    <section class="home-container">
        <div class="home-block animated fadeInDown">
            <form class="" action="/danh-sach-cong-viec" method="get">
                <h1 class="m-text1 m-b-6">Tìm việc Sales</h1>
                <div class="o-label m-b-35">Bạn sẽ tự tìm kiếm công việc phù hợp theo nhu cầu của bản thân một cách thủ công</div>
                <img src="{{asset('img/home/left.png')}}" alt="Tìm việc" class="m-b-30">
                <div class="select-list display-flex home-select-list m-b-30">
                    <div class="m-r-30 m-m-r-0 m-m-b-20">
                        <div class="grid-form__label tal">Ngành nghề:</div>
                        <div class="select-wrapper">
                            <select name="field" id="field" class="chosen-select primary-select">
                                <option {{request()->field ==''?'selected':"" }} value="">Lựa chọn</option>
                                @foreach($fieldWorks as $fieldWork)
                                    <option {{request()->field ==$fieldWork->id?'selected':"" }} value="{{$fieldWork->id}}">{{$fieldWork->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="m-r-30 m-m-r-0 m-m-b-20">
                        <div class="grid-form__label tal">Vị trí sale:</div>
                        <div class="select-wrapper multi-select-wrapper">
                            <select multiple="multiple" name="group_sale[]" id="group_sale" class="primary-select multi-select-block" data-placeholder="Lựa chọn">
                                <option @if(isset(request()->group_sale)) @if(in_array(1, request()->group_sale)) selected @endif @endif value="1">Sale Admin</option>
                                <option @if(isset(request()->group_sale)) @if(in_array(2, request()->group_sale)) selected @endif @endif value="2">Telesale</option>
                                <option @if(isset(request()->group_sale)) @if(in_array(3, request()->group_sale)) selected @endif @endif value="3">Sale tư vấn</option>
                                <option @if(isset(request()->group_sale)) @if(in_array(4, request()->group_sale)) selected @endif @endif value="4">Sale thị trường</option>
                                <option @if(isset(request()->group_sale)) @if(in_array(5, request()->group_sale)) selected @endif @endif value="5">Sale bán hàng</option>
                                <option @if(isset(request()->group_sale)) @if(in_array(6, request()->group_sale)) selected @endif @endif value="6">Sale online</option>
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="grid-form__label tal">Cấp bậc:</div>
                        <div class="select-wrapper">
                            <select name="rank"  id="rank" class="chosen-select primary-select">
                                <option {{request()->rank ==''?'selected':"" }} value="">Lựa chọn</option>
                                <option {{request()->rank ==1?'selected':"" }}  value="1">Nhân viên</option>
                                <option {{request()->rank ==2?'selected':"" }} value="2">Trưởng nhóm</option>
                                <option {{request()->rank ==3?'selected':"" }} value="3">Phó phòng</option>
                                <option {{request()->rank ==4?'selected':"" }} value="4">Trưởng phòng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="button-primary" type="submit" data-toggle="tooltip" data-placement="top" title="Tìm kiếm công việc phù hợp">Tìm kiếm</button>
            </form>
        </div>
        <div class="home-block animated fadeInUp">
            <h1 class="m-text1 m-b-6">Tìm việc Sales thông minh</h1>
            <div class="o-label m-b-30">Trợ lý Masa sẽ hỗ trợ bạn trong việc tìm kiếm những công việc theo nhu cầu</div>
            <img src="{{asset('img/home/right.png')}}" alt="Tìm việc thông minh" class="m-b-30">
            <div class="home-block-text m-b-30">Xin chào! Tôi là Masa, trợ lý ảo của bạn. Tôi là một cô gái dễ thương, thông minh,</br>nhanh nhẹn và vẫn đang tự phát triển bản thân. Hãy để tôi giúp bạn</div>
            @if(session('user'))
                <a href="/tro-ly-ao" class="button-primary" data-toggle="tooltip" data-placement="top" title="Tới trang Masa - trợ lý ảo">Bắt đầu ngay</a>
            @else
                <a href="/login" class="button-primary" data-toggle="tooltip" data-placement="top" title="Tới trang đăng nhập">Đăng nhập để trải nghiệm</a>
            @endif

        </div>
    </section>
@endsection
