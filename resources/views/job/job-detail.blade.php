@extends('layouts.base')

@section('content')
    {{--        @dd(request()->session())--}}
    <section class="page-banner" style="background-image: url('{{asset('img/job/banner.png')}}')">

    </section>
    <section class="page-detail p-b-80 animated fadeInUp">
        <div class="container">
            <div class="page-block display-flex-wrap detail-info-block m-b-30 p-b-20 m-p-b-80 m-p-t-50">
                <div class="page-block__tools display-flex-wrap">
                    {{--                    <div class="button-square button-square--full button-square--green m-r-10"><i class="fa fa-share-alt"></i></div>--}}
                    {{--                    <div class="button-square button-square--full button-square--green m-r-10"><i class="fa fa-repeat"></i></div>--}}
                    {{--                    <div class="button-square button-square--full button-square--red m-r-10"><i class="fa fa-heart"></i></div>--}}
                    @if (request()->session()->has('wasApplySuccess'))
                        <input type="hidden" id="wasApplySuccess" value="{{session('wasApplySuccess')}}">
                    @endif
                    @if (request()->session()->has('applySuccess'))
                        <input type="hidden" id="applySuccess" value="{{session('applySuccess')}}">
                    @endif
                    @if(request()->session()->has('applyError'))
                        <input type="hidden" id="applyError" value="{{session('applyError')}}">
                    @endif
                    @if((date('Y-m-d') > $jobDetail->job_expire) || $jobDetail->job_expire == null )
                        <a disabled="disabled" class="button-primary">Hết hạn ứng tuyển</a>
                    @else
                        @if (request()->session()->has('user'))
                            @if(session('user')->is_active == 0)
                                <button type="button" class="button-primary" data-toggle="modal"
                                        data-target="#myModalNotActiveAccount">Ứng tuyển ngay
                                </button>
                            @else
                                @if(!$percentageProfile->is_pass_apply)
                                    <button type="button" class="button-primary" data-toggle="modal"
                                            data-target="#myModal">Ứng tuyển ngay
                                    </button>
{{--                                    <input type="hidden" name="check_apply" value="1">--}}
                                    @if(request()->session()->has('redirect'))
                                        <input type="hidden" name="check_apply" value="{{request()->checkFalse}}">
                                    @endif
                                @else
                                    @if($candidateID == 0)
                                        <a href="{{url('/candidate/'.$jobDetail->job_id.'?uid='.app('request')->input('uid'))}}"
                                           class="button-primary">Ứng tuyển ngay</a>
                                    @else
                                        <a disabled="disabled" class="button-primary">Đã ứng tuyển</a>
                                    @endif
                                @endif
                            @endif
                        @else


                            <a href="{{route('login')}}?redirect={{url()->full()}}&jobId={{$jobDetail->job_id}}&uid={{app('request')->input('uid')}}"
                               class="button-primary">Ứng tuyển </a>
                        @endif
                    @endif
                </div>
                <div class="page-block__img mobile-hidden">
                    <img
                        src="{{ $jobDetail->logo}}">
                </div>
                <div class="page-block__desc">
                    <div class="page-block__head">
                        <div class="page-block__img mobile-show">
                            <img
                                src="{{ $jobDetail->logo}}">
                        </div>
                        <div class="page-block__text">
                            <h1 class="page-block__title m-text3 m-b-0 m-b-5 m-r-20">
                                {{isset($jobDetail->title_job)?$jobDetail->title_job:'Tìm kiếm công việc từ khắp nơi'}}
                            </h1>
                        </div>
                        <div class="page-tag page-tag--@if((date('Y-m-d') > $jobDetail->job_expire))gray
                        @elseif($jobDetail->job_type === 1)red
                        @elseif($jobDetail->job_type === 2)yellow
                        @elseif($jobDetail->job_type === 3)blue
                        @elseif($jobDetail->job_type === 4)green
                        @endif">
                            @if($jobDetail->job_type == 1)
                                Toàn thời gian
                            @elseif($jobDetail->job_type == 2)
                                Bán thời gian
                            @elseif($jobDetail->job_type == 3)
                                Hợp đồng
                            @elseif($jobDetail->job_type == 4)
                                Thời vụ
                            @endif
                        </div>
                    </div>
                    <div class="s-text16 m-b-6">
                            {{ $jobDetail->short_name_company ?: ($jobDetail->name_company ?: 'Không có dữ liệu') }}
                    </div>
                    <a href="{{isset($jobDetail->website_company)?$jobDetail->website_company:'javascript:void(0)'}}"
                       target="_blank" class="s-link1 m-b-20" data-toggle="tooltip" data-placement="top" title="Truy cập trang/mở tab mới">
                        <i class="icon-worldwide"></i>{{isset($jobDetail->website_company)?$jobDetail->website_company:'Không có dữ liệu'}}
                    </a>
                    {{--                    <div class="social-list">--}}
                    {{--                        <ul class="icon-list icon-list--green m-b-20">--}}
                    {{--                            <li>--}}
                    {{--                                <a href=""><i class="fa fa-facebook"></i></a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a href=""><i class="fa fa-twitter"></i></a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a href=""><i class="fa fa-linkedin"></i></a>--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                    <ul class="list-text list-text--column3">
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Lương cứng</div>
                            <div>
                                @if($jobDetail->base_salary_min === $jobDetail->base_salary_max)
                                    {{number_format($jobDetail->base_salary_min).' VNĐ'}}
                                @else
                                    {{isset($jobDetail->base_salary_min)?number_format($jobDetail->base_salary_min):'Không có dữ liệu'}}
                                    VNĐ
                                    - {{isset($jobDetail->base_salary_max)?number_format($jobDetail->base_salary_max):'Không có dữ liệu'}}
                                    VNĐ
                                @endif
                            </div>
                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Ngành nghề</div>
                            <div>{{isset($jobDetail->name_field_work)?$jobDetail->name_field_work:'----'}}</div>
                        </li>


                        <li class="list-text__item">
                            <div class="o-label m-b-6">Thu nhập</div>
                            <div>
                                @if($jobDetail->income_min === $jobDetail->income_max)
                                    {{number_format($jobDetail->income_min).' VNĐ'}}
                                @else
                                    {{isset($jobDetail->income_min)?number_format($jobDetail->income_min):'Không có dữ liệu'}}
                                    VNĐ
                                    - {{isset($jobDetail->income_max)?number_format($jobDetail->income_max):'Không có dữ liệu'}}
                                    VNĐ
                                @endif
                            </div>
                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Vị trí sales</div>
                            <div>{{isset($jobDetail->tag_id)?getParseSales($jobDetail->tag_id):'----'}}</div>
                        </li>

                        <li class="list-text__item">
                            <div class="o-label m-b-6">Ngày hết hạn</div>
                            <div>
                                @if((date('Y-m-d') > $jobDetail->job_expire) || $jobDetail->job_expire == null )
                                    Đã hết hạn
                                @else
                                    {{date('d/m/Y',strtotime($jobDetail->job_expire))}}
                                @endif
                            </div>
                        </li>
                        <li class="list-text__item">
                            <div class="o-label m-b-6">Khu vực</div>
                            <div>
                                @if(isset($jobDetail->district_job))
                                    @foreach($districts as $district)
                                        {{ (((int)$jobDetail->district_job) == $district->id ? $district->prefix.' '.$district->name : "") }}
                                    @endforeach
                                @endif
                                @if(isset($jobDetail->province_job))
                                    @foreach($provinces as $province)
                                        {{ (((int)$jobDetail->province_job) == $province->id ? ' - '.$province->name :"") }}
                                    @endforeach
                                @endif
                            </div>
                        </li>
                    </ul>
{{--                    <div class="o-label m-b-6">Nơi làm việc</div>--}}
{{--                    <div class="contain-link">--}}
{{--                        <div>--}}
{{--                            {{isset($jobDetail->workplace_detail_job)?$jobDetail->workplace_detail_job . ' - ':'Không có dữ liệu'}}--}}
{{--                            @if(isset($jobDetail->district_job))--}}
{{--                                @foreach($districts as $district)--}}
{{--                                    {{ (((int)$jobDetail->district_job) == $district->id ? $district->prefix.' '.$district->name : "") }}--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                            @if(isset($jobDetail->province_job))--}}
{{--                                @foreach($provinces as $province)--}}
{{--                                    {{ (((int)$jobDetail->province_job) == $province->id ? ' - '.$province->name :"") }}--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        --}}{{--                        <a href="javascript:void(0)"><i class="fa fa-map-marker"></i>Bản đồ đường đi</a>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="page-block m-b-30 p-b-10">
                <div class="s-text2 m-b-20">Thông tin tuyển dụng</div>
                <ul class="list-text list-text--column3 list-text--flex3">
                    <li class="list-text__item display-flex aic">
                        <div class="list-text__icon m-r-20">
                            <i class="icon-flag"></i>
                        </div>
                        <div class="list-text__text">
                            <div class="o-label m-b-4">Yêu cầu kinh nghiệm:</div>
                            <div>
                                @if(isset($jobDetail->experience))
                                    {{getParseExperience($jobDetail->experience)}}
                                @else
                                    Không yêu cầu
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="list-text__item display-flex aic">
                        <div class="list-text__icon m-r-20">
                            <i class="icon-user-2"></i>
                        </div>
                        <div class="list-text__text">
                            <div class="o-label m-b-4">Trình độ học vấn:</div>
                            <div>
                                @if(isset($jobDetail->degree))
                                    {{getParseDegree($jobDetail->degree)}}
                                @else
                                    Không yêu cầu
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="list-text__item display-flex aic">
                        <div class="list-text__icon m-r-20">
                            <i class="icon-user-2"></i>
                        </div>
                        <div class="list-text__text">
                            <div class="o-label m-b-4">Giới tính</div>
                            <div>
                                @if($jobDetail->gender == 1)
                                    Nam
                                @elseif($jobDetail->gender == 2)
                                    Nữ
                                @else
                                    Không yêu cầu
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="list-text__item list-text__item--full display-flex aic">
                        <div class="list-text__icon m-r-20">
                            <i class="icon-placeholder"></i>
                        </div>
                        <div class="list-text__text">
                            <div class="o-label m-b-4">Nơi làm việc</div>
                            <div>
                                {{isset($jobDetail->workplace_detail_job)?$jobDetail->workplace_detail_job . ' - ':'Không có dữ liệu'}}
                                @if(isset($jobDetail->district_job))
                                    @foreach($districts as $district)
                                        {{ (((int)$jobDetail->district_job) == $district->id ? $district->prefix.' '.$district->name : "") }}
                                    @endforeach
                                @endif
                                @if(isset($jobDetail->province_job))
                                    @foreach($provinces as $province)
                                        {{ (((int)$jobDetail->province_job) == $province->id ? ' - '.$province->name :"") }}
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="page-block m-b-30">
                <div class="s-text2 m-b-20">Chi tiết công việc</div>
                <div class="page-text-box">
                    <i>
                        <div class="s-text4 m-b-15" style="font-weight: 600!important;">Mô tả công việc:</div>
                    </i>
                    {!!isset($jobDetail->description_job)?$jobDetail->description_job:'Không có dữ liệu'!!}
                </div>
                <div class="page-text-box">
                    <i>
                        <div class="s-text4 m-b-15" style="font-weight: 600;!important;"> Yêu cầu công việc:</div>
                    </i>
                    {!!isset($jobDetail->requirements_job)?$jobDetail->requirements_job:'Không có dữ liệu'!!}
                </div>
                <div class="page-text-box">
                    <i>
                        <div class="s-text4 m-b-15" style="font-weight: 600;!important;">Quyền lợi:</div>
                    </i>
                    {!!isset($jobDetail->benefit_job)?$jobDetail->benefit_job:'Không có dữ liệu'!!}
                </div>
            </div>
            <div class="page-block m-b-30 p-b-20">
                <div class="s-text2 m-b-20">Chân dung ứng viên</div>
                <div class="page-box m-b-10">
                    <div class="s-text4 m-b-15">Kĩ năng:</div>
                    <div class="page-tag-box">
                        @if(isset($jobDetail->skillJob))
                            @foreach($jobDetail->skillJob as $skillJob)
                                <div class="page-tag-box__item">{{$skillJob->name}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="page-box">
                    <div class="s-text4 m-b-15">Tính cách:</div>
                    <div class="page-tag-box">
                        @if(isset($jobDetail->characterJob))
                            @foreach($jobDetail->characterJob as $characterJob)
                                <div class="page-tag-box__item">{{$characterJob->name}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="page-block m-p-0">
                <div class="s-text2 m-b-20 m-p-t-30 m-p-r-30 m-p-l-30">Công việc tương tự</div>
                <div class="related-block">
                    @foreach ($listJobSameJobDetail as $listJob)
                        <div class="list-item list-item--grid tal">
                            <div class="list-item__info have-tag">
                                <div class="list-item__desc">
                                    <div class="list-item__top m-b-10">
                                        <div class="list-item__top-logo m-r-20">
                                            <img src="{{env('RICH_FILE_URL_BASE'). $listJob->logo}}" alt="LOGO-IMG">
                                        </div>
                                        <div class="list-item__top-text">
                                            <h4 class="list-item__title s-text17 m-t-0 m-b-4">
                                                <a href="{{url('/cong-viec/'.$listJob->id)}}" class="s-text17">
                                                    {{$listJob->title_job}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="list-item__m-title s-text12 m-b-10">{{isset($listJob->short_name_company)?$listJob->short_name_company:'Không có dữ liệu'}}</div>
                                    @if($listJob->job_type == 1)
                                        <div class="block-tag block-tag--red m-b-20">
                                            Toàn thời gian
                                        </div>
                                    @elseif($listJob->job_type == 2)
                                        <div class="block-tag block-tag--yellow m-b-20">
                                            Bán thời gian
                                        </div>
                                    @elseif($listJob->job_type == 3)
                                        <div class="block-tag block-tag--blue m-b-20">
                                            Hợp đồng
                                        </div>
                                    @elseif($listJob->job_type == 4)
                                        <div class="block-tag block-tag--green m-b-20">
                                            Thời vụ
                                        </div>
                                    @endif
                                    <ul class="list-text">
                                        <li class="list-text__item">
                                            <div class="o-label m-b-6">Hạn ứng tuyển</div>
                                            <div class="">
                                                {{isset($listJob->job_expire)?date('d/m/Y',strtotime($listJob->job_expire)):'Không có dữ liệu'}}
                                            </div>
                                        </li>
                                        <li class="list-text__item p-b-0">
                                            <div class="o-label m-b-6">Thu nhập</div>
                                            <div class="">{{number_format($listJob->income_min)}}
                                                - {{number_format($listJob->income_max)}} VNĐ
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="list-item__action p-b-20">
                                <div class="list-item__link list-item__link--left">
                                    {{--                                <div class="button-square button-square--full button-square--red m-r-10">--}}
                                    {{--                                    <i class="fa fa-heart-o"></i>--}}
                                    {{--                                </div>--}}
                                    <a href="{{url('/cong-viec/'.$listJob->id)}}" class="button-primary">Xem chi
                                        tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- fixed apply bar -->
    <div class="fixed-top">
        <div class="container">
            <div class="fixed-top__inner display-flex-wrap">
                <div class="fixed-top__img">
                    <img
                        src="{{ $jobDetail->logo}}">
                </div>
                <div class="fixed-top__text">
                    <div class="fixed-top__head display-flex-wrap">
                        <div
                            class="fixed-top__title s-text17 m-r-20">{{isset($jobDetail->title_job)?$jobDetail->title_job:'Ứng tuyển'}}</div>
                        <div class="mobile-hidden page-tag page-tag--@if((date('Y-m-d') > $jobDetail->job_expire))gray
                        @elseif($jobDetail->job_type === 1)red
                        @elseif($jobDetail->job_type === 2)yellow
                        @elseif($jobDetail->job_type === 3)blue
                        @elseif($jobDetail->job_type === 4)green
                        @endif">
                            @if($jobDetail->job_type == 1)
                                Toàn thời gian
                            @elseif($jobDetail->job_type == 2)
                                Bán thời gian
                            @elseif($jobDetail->job_type == 3)
                                Hợp đồng
                            @elseif($jobDetail->job_type == 4)
                                Mùa vụ
                            @endif
                        </div>
                    </div>
                    <div
                        class="fixed-top__desc s-text8 mobile-hidden">{{isset($jobDetail->name_company)?$jobDetail->name_company:'Không có dữ liệu'}}</div>
                </div>
                <div class="fixed-top__tool">
                    @if (request()->session()->has('user'))
                        @if(session('user')->is_active == 0)
                            <button type="button" class="button-primary" data-toggle="modal"
                                    data-target="#myModalNotActiveAccount">Ứng tuyển ngay
                            </button>
                        @else
                            @if(!$percentageProfile->is_pass_apply)
                                <button type="button" class="button-primary" data-toggle="modal" data-target="#myModal">
                                    Ứng tuyển ngay
                                </button>
                                @if(request()->session()->has('redirect'))
                                    <input type="hidden" name="check_apply" value="{{request()->checkFalse}}">
                                @endif
                            @else
                                @if($candidateID == 0)
                                    <a href="{{url('/candidate/'.$jobDetail->job_id.'?uid='.app('request')->input('uid'))}}"
                                       class="button-primary">Ứng tuyển ngay</a>
                                @else
                                    <a disabled="disabled" class="button-primary">Đã ứng tuyển</a>
                                @endif
                            @endif
                        @endif
                    @else

                        <a href="{{route('login')}}?redirect={{url()->full()}}&jobId={{$jobDetail->job_id}}&uid={{app('request')->input('uid')}}"
                           class="button-primary">Ứng tuyển </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    {{--    @include('job.modal-job-check')--}}
    @include('job.modal-job-success')
    @include('job.modal-job-not-active')
    @include('job.modal-job-not-finish')

@endsection

@section('javascript')
    <script src="{{asset('js_service/check-apply-job.js')}}"></script>
    <script src="{{asset('js-service/fixed-top.js')}}"></script>
@endsection
