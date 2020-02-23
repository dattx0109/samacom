@extends('layouts.base')

@section('content')
    <div class="container p-b-50">
        <div class="p-t-40">
            <form class="" role="form" method="get" action="/danh-sach-cong-viec">
                <div class="page-tools page-list-tools">
                    <div class="page-filter">
                        <div class="page-filter-label">Sắp xếp theo:</div>
                        <div class="page-filter-item select-wrapper m-r-10 m-m-r-15">
                            <select name="salary" id="salary" class="chosen-select chosen-select-no-search primary-select mw170" data-toggle="tooltip" data-placement="bottom" title="Sắp xếp theo mức thu nhập cao/thấp">
                                <option {{request()->salary ==''?'selected':""}} value="">Mức thu nhập</option>
                                <option {{request()->salary ==1?'selected':"" }} value="1">Từ thấp lên cao</option>
                                <option {{request()->salary ==2?'selected':"" }} value="2">Từ cao xuống thấp</option>
                            </select>
                        </div>
                        <div class="page-filter-item select-wrapper m-r-10 m-m-r-0">
                            <select name="date_update" id="date_update" class="chosen-select chosen-select-no-search primary-select mw170" data-toggle="tooltip" data-placement="bottom" title="Sắp theo ngày đăng tuyển mới/cũ">
                                <option {{request()->date_update ==''?'selected':""}} value="">Ngày đăng tuyển</option>
                                <option {{request()->date_update ==1?'selected':"" }} value="1">Mới nhất</option>
                                <option {{request()->date_update ==2?'selected':"" }} value="2">Cũ nhất</option>
                            </select>
                        </div>
                        <div class="button-primary button-primary--right-icon open-advanced-filter m-m-t-15" data-toggle="tooltip" data-placement="bottom" title="Hiển thị bộ lọc nâng cao">
                            <span>Lọc nâng cao</span><i class="icon-filter"></i>
                        </div>
                    </div>
                    <div class="page-switch mobile-hidden">
                        <div class="switch-view-list">
                            <div class="switch-btn-list button-square button-square--left button-square--green is-active" data-toggle="tooltip" data-placement="bottom" title="Hiển thị dạng danh sách"><i class="icon-list"></i></div>
                            <div class="switch-btn-grid button-square button-square--right button-square--green" data-toggle="tooltip" data-placement="bottom" title="Hiển thị dạng lưới"><i class="icon-grid"></i></div>
                        </div>
{{--                        <div class="chosen-button button-square button-square--full m-l-11 have-icon">--}}
{{--                            <i class="fa fa-list"></i>--}}
{{--                            <div class="have-number">3</div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="page-advanced-filter">
                        <div class="page-advanced-filter-top">
                            <div class="s-text2 m-b-20">Lọc nâng cao</div>
                            <div class="grid-form">
                                <div class="grid-form__item">
                                    <div class="grid-form__label">Vị trí sale:</div>
                                    <div class="select-wrapper multi-select-wrapper">
                                        <select multiple="multiple" name="group_sale[]" id="group_sale" class="primary-select multi-select-sale" data-placeholder="Lựa chọn">
                                            <option @if(isset(request()->group_sale)) @if(in_array(1, request()->group_sale)) selected @endif @endif value="1">Sale Admin</option>
                                            <option @if(isset(request()->group_sale)) @if(in_array(5, request()->group_sale)) selected @endif @endif value="5">Sale bán hàng</option>
                                            <option @if(isset(request()->group_sale)) @if(in_array(6, request()->group_sale)) selected @endif @endif value="6">Sale online</option>
                                            <option @if(isset(request()->group_sale)) @if(in_array(3, request()->group_sale)) selected @endif @endif value="3">Sale tư vấn</option>
                                            <option @if(isset(request()->group_sale)) @if(in_array(4, request()->group_sale)) selected @endif @endif value="4">Sale thị trường</option>
                                            <option @if(isset(request()->group_sale)) @if(in_array(2, request()->group_sale)) selected @endif @endif value="2">Telesale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid-form__item">
                                    <div class="grid-form__label">Ngành nghề:</div>
                                    <div class="select-wrapper">
                                        <select name="field" id="field" class="chosen-select primary-select">
                                            <option {{request()->field ==''?'selected':"" }} value="">Lựa chọn</option>
                                            @foreach($fieldWorks as $fieldWork)
                                                <option {{request()->field ==$fieldWork->id?'selected':"" }} value="{{$fieldWork->id}}">{{$fieldWork->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="grid-form__item">
                                    <div class="grid-form__label">Tỉnh/Thành:</div>
                                    <div class="select-wrapper">
                                        <select name="province_id" id="province" data-placeholder="Chọn tỉnh thành..." class="chosen-select primary-select">
                                            <option {{request()->province ==''?'selected':""}} value="">Lựa chọn</option>
                                            @foreach($listProvince as $item)
                                                <option {{request()->province_id ==$item->id?'selected':""}} value={{$item->id}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="grid-form__item">
                                    <div class="grid-form__label">Quận/Huyện:</div>
                                    <div class="select-wrapper">
                                        <select name="district_id" id="district_id" class="chosen-select primary-select">
                                            <option {{request()->district_id ==''?'selected':""}} value="">Lựa chọn</option>
                                            @if(isset($district))
                                                @foreach($district as $item)
                                                    <option {{request()->district_id ==$item->id?'selected':""}} value={{$item->id}}>{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="grid-form__item">
                                    <div class="grid-form__label">Cấp bậc:</div>
                                    <div class="select-wrapper">
                                        <select name="rank"  id="rank" class="chosen-select primary-select">
                                            <option {{request()->rank ==''?'selected':"" }} value="">Lựa chọn</option>
                                            <option {{request()->rank ==4?'selected':"" }} value="4">Trưởng phòng</option>
                                            <option {{request()->rank ==3?'selected':"" }} value="3">Phó phòng</option>
                                            <option {{request()->rank ==2?'selected':"" }} value="2">Trưởng nhóm</option>
                                            <option {{request()->rank ==1?'selected':"" }}  value="1">Nhân viên</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid-form__item">
                                    <div class="grid-form__label">Thu nhập:</div>
                                    <div class="select-wrapper">
                                        <select name="income" id="income" class="chosen-select primary-select">
                                            <option {{request()->income ==''?'selected':""}} value="">Lựa chọn</option>
                                            <option {{request()->income ==1?'selected':"" }} value="1">Dưới 6,000,000 vnđ</option>
                                            <option {{request()->income ==2?'selected':"" }} value="2">6,000,000 vnđ - 8,000,000 vnđ</option>
                                            <option {{request()->income ==3?'selected':"" }} value="3">8,000,000 vnđ - 10,000,000 vnđ</option>
                                            <option {{request()->income ==4?'selected':"" }} value="4">10,000,000 vnđ - 15,000,000 vnđ</option>
                                            <option {{request()->income ==5?'selected':"" }} value="5">15,000,000 vnđ - 20,000,000 vnđ</option>
                                            <option {{request()->income ==6?'selected':"" }} value="6">20,000,000 vnđ - 30,000,000 vnđ</option>
                                            <option {{request()->income ==7?'selected':"" }} value="7">30,000,000 vnđ - 50,000,000 vnđ</option>
                                            <option {{request()->income ==8?'selected':"" }} value="8">50,000,000 vnđ - 100,000,000 vnđ</option>
                                            <option {{request()->income ==9?'selected':"" }} value="9">Trên 100,000,000 vnđ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid-form__item">
                                    <div class="grid-form__label">Loại hình công việc</div>
                                    <div class="select-wrapper">
                                        <select name="job_type" id="job_type" class="chosen-select primary-select">
                                            <option {{request()->job_type ==''?'selected':""}} value="">Lựa chọn</option>
                                            <option {{request()->job_type ==1?'selected':"" }} value="1">Toàn thời gian</option>
                                            <option {{request()->job_type ==2?'selected':"" }} value="2">Bán thời gian</option>
                                            <option {{request()->job_type ==3?'selected':"" }} value="3">Hợp đồng</option>
                                            <option {{request()->job_type ==4?'selected':"" }} value="4">Thời vụ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid-form__item">
                                    <div class="grid-form__label">Giới tính</div>
                                    <div class="select-wrapper">
                                        <select name="sex" id="sex" class="chosen-select primary-select">
                                            <option {{request()->sex ==''?'selected':""}} value="">Lựa chọn</option>
                                            <option {{request()->sex ==1?'selected':"" }} value="1">Nam</option>
                                            <option {{request()->sex ==2?'selected':"" }} value="2">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-advanced-filter-bottom">
                            <button type="button" id="reset_fillter" class="button-reset m-r-20 m-m-r-0" data-toggle="tooltip" data-placement="bottom" title="Bỏ chọn tất cả các trường thông tin">Làm mới bộ lọc</button>
                            <div class="button-register mobile-show m-m-r-10" id="advance_filter_cls">Hủy bỏ</div>
                            <button type="submit" class="button-primary" data-toggle="tooltip" data-placement="bottom" title="Lọc theo các tiêu chí đã chọn">Bắt đầu lọc</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="page-list m-t-30 animated fadeInUp">
            <?php $i = 1 ?>
            @if(($listJob->total()) > 0)
            @foreach($listJob as $list)
            <div class="list-item list-item--list">
                <div class="list-item__info have-tag">
                    <div class="list-item__logo mobile-hidden">
                        <img src="{{$list->logo}}">
                    </div>
                    <div class="list-item__desc">
                        <div class="list-item__head">
                            <div class="list-item__logo mobile-show">
                                <img src="{{$list->logo}}">
                            </div>
                            <div class="list-item__head-text">
                                <h1 class="list-item__title m-text3 m-t-0 m-b-5">
                                    <a href="{{ $list->slug ? url('/cong-viec/'.$list->slug) : url('/cong-viec/'.$list->id_job) }}" class="m-text3" data-toggle="tooltip" data-placement="top" title="Xem chi tiết công việc này">
                                        {{isset($list->title)?$list->title:''}}
                                    </a>
                                </h1>
                                <div class="list-item__m-title s-text1 m-b-20">
                                    {{ $list->short_name ? $list->short_name : ($list->name ?: '') }}
                                </div>
                            </div>
                        </div>
                        <ul class="list-text list-text--flex3 list-text--column3">
                            <li class="list-text__item list-text__item--hidden">
                                <div class="s-text15 m-b-4">Lương cứng</div>
                                <div class="s-text14">
                                    @if($list->income_min === $list->base_salary_max)
                                        {{number_format($list->base_salary_min).' VNĐ'}}
                                    @else
                                        {{number_format($list->base_salary_min) .' - '.number_format($list->base_salary_max)}} VNĐ
                                    @endif
                                </div>
                            </li>
                            <li class="list-text__item">
                                <div class="s-text15 m-b-4">Thu nhập</div>
                                <div class="s-text14">
                                    @if($list->base_salary_min === $list->income_max)
                                        {{number_format($list->income_min).' VNĐ'}}
                                    @else
                                        {{number_format($list->income_min) .' - '.number_format($list->income_max)}} VNĐ
                                    @endif
                                </div>
                            </li>
                            <li class="list-text__item">
                                <div class="s-text15 m-b-4">Hạn ứng tuyển</div>
                                <div class="s-text14">
                                    @if((date('Y-m-d') > $list->job_expire) || $list->job_expire == null )
                                        <div class="expired-block">Đã hết hạn</div>
                                    @else
                                        {{date('d/m/Y',strtotime($list->job_expire))}}
                                    @endif
                                </div>
                            </li>
                            <li class="list-text__item list-text__item--hidden">
                                <div class="s-text15 m-b-4">Ngành nghề</div>
                                <div class="s-text14">
                                   {{isset($list->fieldWorkName)?$list->fieldWorkName: '' }}
                                </div>
                            </li>
                            <li class="list-text__item list-text__item--hidden">
                                <div class="s-text15 m-b-4">Vị trí sales</div>
                                <div class="s-text14">
                                    {{isset($list->tag_sales)?$list->tag_sales: ''}}
                                </div>
                            </li>
                            <li class="list-text__item list-text__item--hidden list-text__item--half m-m-r-15">
                                <div class="s-text15 m-b-4">Khu vực</div>
                                @php
                                    $district = !empty($districtNames[$list->district_id]) ? $districtNames[$list->district_id] : '';
                                    $province = !empty($provinceNames[$list->province_id]) ? $provinceNames[$list->province_id] : '';
                                    $address  = $district ? $district.' - '.$province : $province;
                                @endphp
                                <div class="s-text14">{{ $address }}</div>
                            </li>
{{--                            <li class="list-text__item list-text__item--hidden list-text__item--half m-m-r-15">--}}
{{--                                <div class="s-text15 m-b-4">Vị trí sales</div>--}}
{{--                                <div class="s-text14">{{$list->workplace_full_text}}</div>--}}
{{--                            </li>--}}
{{--                            <li class="list-text__item list-text__item--hidden list-text__item--half m-m-r-15">--}}
{{--                                <div class="s-text15 m-b-4">Lĩnh vực</div>--}}
{{--                                <div class="s-text14">{{$list->workplace_full_text}}</div>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                    <div class="list-tag list-tag--@if((date('Y-m-d') > $list->job_expire))gray
                        @elseif($list->job_type === 1)red
                        @elseif($list->job_type === 2)yellow
                        @elseif($list->job_type === 3)blue
                        @elseif($list->job_type === 4)green
                        @endif">
                        @if ($list->job_type === 1)
                            Toàn thời gian
                        @elseif($list->job_type === 2)
                            Bán thời gian
                        @elseif($list->job_type === 3)
                            Hợp đồng
                        @elseif($list->job_type === 4)
                            Thời vụ
                        @endif
                    </div>
                </div>
                <div class="list-item__action p-b-10">
                    <div class="list-item__publish list-text__item--hidden">
                        <i class="icon-clock m-r-10"></i>
                        {{isset($list->updated_at)?'Cập nhật '.timeAgo($list->updated_at):''}}
                    </div>
{{--                    <div class="list-item__publish list-text__item--hidden">--}}
{{--                        &nbsp;Hạn ứng tuyển  @if(isset($list->job_expire))--}}
{{--                            {{date('d/m/Y',strtotime($list->job_expire))}}--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <div class="list-item__link">
{{--                        <div class="button-square button-square--full button-square--red m-r-10">--}}
{{--                            <i class="fa fa-heart-o"></i>--}}
{{--                        </div>--}}
                        @if((date('Y-m-d') > $list->job_expire) || $list->job_expire == null )
                            <a href="{{ $list->slug ? url('/cong-viec/'.$list->slug) : url('/cong-viec/'.$list->id_job) }}" class="button-primary button-primary--expired" data-toggle="tooltip" data-placement="top" title="Xem chi tiết công việc này">Xem chi tiết</a>
                        @else
                            <a href="{{ $list->slug ? url('/cong-viec/'.$list->slug) : url('/cong-viec/'.$list->id_job) }}" class="button-primary" data-toggle="tooltip" data-placement="top" title="Xem chi tiết công việc này">Xem chi tiết</a>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @if(($listJob->total()) === 0)
            <p class="alert alert-success" role="alert">
                Không tìm thấy công việc phù hợp!
            </p>
        @endif
        <div class="page-list-pagination">
            {{ $listJob->links() }}
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            const $btnList = $('.switch-btn-list');
            const $btnGrid = $('.switch-btn-grid');
            const $openAdvancedFilter = $('.open-advanced-filter');
            const $advancedFilter = $('.page-advanced-filter');
            const $overlayBg = $('.overlay-block');
            const $pageFilter = $('.page-filter');
            const $advanceCls = $('#advance_filter_cls');

            $btnList.on('click', function () {
                $btnGrid.removeClass('is-active');
                $btnList.addClass('is-active');
                $('.list-item').removeClass('list-item--grid');
                $('.list-item').addClass('list-item--list');
            });
            $btnGrid.on('click', function () {
                $btnList.removeClass('is-active');
                $btnGrid.addClass('is-active');
                $('.list-item').removeClass('list-item--list');
                $('.list-item').addClass('list-item--grid');
            });
            $openAdvancedFilter.on('click', function () {
                $advancedFilter.addClass('is-show');
                $overlayBg.addClass('is-show');
                $openAdvancedFilter.addClass('absolute-block');
            });
            $overlayBg.on('click', function () {
                $advancedFilter.removeClass('is-show');
                $overlayBg.removeClass('is-show');
                $openAdvancedFilter.removeClass('absolute-block');
            });
            $advanceCls.on('click', function () {
                $advancedFilter.removeClass('is-show');
                $overlayBg.removeClass('is-show');
                $openAdvancedFilter.removeClass('absolute-block');
            });
        });
    </script>
@endsection
@section('javascript-fillter-job')
    <script src="{{asset('js_service/fillter-job.js')}}"></script>
@endsection
