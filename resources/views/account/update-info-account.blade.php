@extends('layouts.base')

@section('content')
    <div class="page-menu page-menu--active">
        <div class="container">
            <div class="page-point tal" id="percentage_profile_all">
                <div class="page-point__item" id="percentage_profile">
                    <div class="page-point__title m-b-7">Mức độ hoàn thành CV</div>
                    <div class="page-point__point">{{isset($percentageProfile->percentage_profile)?round($percentageProfile->percentage_profile, 0).'%':'0%'}}</div>
                    <div class="page-point__block">
                        <div class="page-point__progress" style="width: {{isset($percentageProfile->percentage_profile)?round($percentageProfile->percentage_profile, 0).'%':'0%'}};"></div>
                    </div>
                </div>
            </div>
            @if(request()->session()->has('redirect'))
                @if($percentageProfile->is_pass_apply)
                    <a href="{{url('/candidate/'.session('jobId').'?uid='.session('uid'))}}" class="button-primary" disabled>Ứng tuyển ngay</a>
                @else
                    <a href="{{url('/candidate/'.session('jobId').'?uid='.session('uid'))}}" class="button-primary" disabled>Ứng tuyển ngay</a>
                @endif

            @endif
        </div>
    </div>
    <section class="page-detail p-b-30 p-t-120">
        <div class="container animated fadeInDown">
            <div class="page-detail-head">
                <form method="post" action="{{route('update-avatar')}}" class="form-horizontal"
                      enctype="multipart/form-data">
                    <div class="page-block page-block--split m-b-30">
                        <div class="page-block-top">
                            <div class="page-flex">
                                <div class="page-block__img page-block__img--circle"
                                     style="background-image: url('{{isset($accountDetail->avatar)?$accountDetail->avatar:asset('img/avatar_default.png')}}');"
                                     id="avatr_show">

                                </div>
                                <div class="page-block__desc page-block__desc--flex">
                                    <div class="page-block__head display-block">
                                        <h4 class="page-block__title m-text3 m-b-0 m-b-5 m-r-20">{{$account->name}}</h4>
                                        <div class="s-text10 m-b-20">{{$account->email}}</div>
                                        <label for="avatar" class="label-link normal-label m-b-20">Đổi ảnh đại
                                            diện</label><sup class="text-warning">*</sup><br>
                                        <button class="button-primary m-b-10" type="submit" style="display: none;"
                                                id="btnAvatar">Lưu lại
                                        </button>
                                    </div>
                                    <div class="page-block__info">
                                        <div class="form-group">
                                            <label for="job_search_status">Trạng thái tìm việc</label>
                                            <div class="select-wrapper">
                                                <select id="job_search_status" class="chosen-select primary-select"
                                                        tabindex="2">
                                                    <option {{isset($accountDetail->job_search_status)?$accountDetail->job_search_status == 1?'selected':'':''}}  value="1">
                                                        Đang tìm việc
                                                    </option>
                                                    <option {{isset($accountDetail->job_search_status)?$accountDetail->job_search_status == 2?'selected':'':''}} value="2">
                                                        Đang cân nhắc
                                                    </option>
                                                    <option {{isset($accountDetail->job_search_status)?$accountDetail->job_search_status == 3?'selected':'':''}} value="3">
                                                        Không tìm việc
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
{{--                                        <div class="page-point page-point--full" id="percentage_profile_all">--}}
{{--                                            <div class="page-point__item" id="percentage_profile">--}}
{{--                                                <div class="page-point__title m-b-7">Mức độ hoàn thành CV</div>--}}
{{--                                                <div class="page-point__point">{{isset($percentageProfile->percentage_profile)?round($percentageProfile->percentage_profile, 0).'%':'0%'}}</div>--}}
{{--                                                <div class="page-point__block">--}}
{{--                                                    <div class="page-point__progress" style="width: {{isset($percentageProfile->percentage_profile)?round($percentageProfile->percentage_profile, 0).'%':'0%'}};"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <input type="file" class="form-control hidden" name="avatar" id="avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                <input type="hidden" name="job_search_status"
                       value="{{isset($accountDetail->job_search_status)?$accountDetail->job_search_status:1}}">
                <div class="page-block m-b-30">
                    <div class="display-flex-wrap m-b-6">
                        <div class="m-text5 p-r-20">Thông tin cơ bản</div>
                        <div class="page-block__saved page-block__saved--active">
                            <div class="icon-container"><i class="fa fa-check"></i></div>
                            Đã lưu
                        </div>
                    </div>
                    <small class="m-b-20">Hoàn thành mục <sup class="text-danger">*</sup> để có thể ứng tuyển thành công</small>
                    <div class="page-col-4">
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Họ và tên<sup>*</sup></label>
                            <input type="text" class="form-control" placeholder="VD: Nguyen Van A"
                                   name="name"
                                   value="{{old('name')?old('name'):isset($account->name)?$account->name:''}}">
                            @error('name')
                            <span class="msg-alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group m-r-30" id="data_1">
                            <label class="m-b-6">Ngày sinh<sup>*</sup></label>
                            <div class="input-group date">
                                <input type="text" class="form-control" name="date_of_birth"
                                       placeholder="Ngày sinh"
                                       value="{{old('date_of_birth')?old('date_of_birth'):(!empty($accountDetail)?!empty($accountDetail->date_of_birth)?date('d-m-Y', strtotime($accountDetail->date_of_birth)):'':'')}}">
                                <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                            </div>
                            @error('date_of_birth')
                            <span class="msg-alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Email<sup>*</sup></label>
                            <input type="text" class="form-control" placeholder="VD: nguyenvana@gmail.com"
                                   value="{{old('email')?old('email'):isset($account->email)?$account->email:''}}"
                                   name="email">
                            @error('email')
                            <span class="msg-alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="m-b-6">Điện thoại<sup>*</sup></label>
                            <div class="fixed-var">{{request()->user->phone}}</div>
                        </div>
                        <div class="form-group m-r-30">
                            <label>Link Facebook</label>
                            <input type="text" placeholder="Link Facebook" class="form-control"
                                   name="link_fb"
                                   value="{{old('link_fb')?old('link_fb'):(!empty($accountDetail)?!empty($accountDetail->link_fb)?($accountDetail->link_fb):'':'')}}">
                        </div>
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Giới tính</label>
                            <div class="m-checkbox-container">
                                <label class="m-checkbox p-r-20">
                                    <input {{isset($accountDetail->gender)?$accountDetail->gender==1?'checked':'':''}} class="i-checks"
                                           type="radio" value="1"
                                           name="gender" {{(old('gender') == '1') ? 'checked' : ''}} >Nam<span
                                            class="checkmark"></span>
                                </label>
                                <label class="m-checkbox p-r-20">
                                    <input {{isset($accountDetail->gender)?$accountDetail->gender==2?'checked':'':''}}  class="i-checks"
                                           type="radio" value="2"
                                           name="gender" {{(old('gender') == '2') ? 'checked' : ''}}>Nữ<span
                                            class="checkmark"></span>
                                </label>
                                <label class="m-checkbox">
                                    <input {{isset($accountDetail->gender)?$accountDetail->gender==3?'checked':'':'checked'}} class="i-checks"
                                           type="radio" value="3"
                                           name="gender" {{(old('gender') == '3') ? 'checked' : ''}}>Khác<span
                                            class="checkmark"></span>
                                </label>
                                @error('gender')
                                <span class="msg-alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-4-2">
                            <label class="m-b-6">Tình trạng hôn nhân</label>
                            <div class="m-checkbox-container">
                                <label class="m-checkbox p-r-20">
                                    <input {{isset($accountDetail->marital_status)?$accountDetail->marital_status==1?'checked':'':'checked'}} class="i-checks"
                                           type="radio" value="1"
                                           name="marital_status" {{(old('marital_status') == '1') ? 'checked' : ''}}>Độc
                                    thân<span class="checkmark"></span>
                                </label>
                                <label class="m-checkbox p-r-20">
                                    <input {{isset($accountDetail->marital_status)?$accountDetail->marital_status==2?'checked':'':''}} class="i-checks"
                                           type="radio" value="2"
                                           name="marital_status" {{(old('marital_status') == '2') ? 'checked' : ''}}>Đã
                                    có gia đình<span class="checkmark"></span>
                                </label>
                                <label class="m-checkbox">
                                    <input {{isset($accountDetail->marital_status)?$accountDetail->marital_status==3?'checked':'':''}} class="i-checks"
                                           type="radio" value="3"
                                           name="marital_status" {{(old('marital_status') == '3') ? 'checked' : ''}}>Đã
                                    có con<span class="checkmark"></span>
                                </label>
                                @error('marital_status')
                                <span class="msg-alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-4-2 m-r-30">
                            <label class="m-b-6">Địa chỉ<sup>*</sup></label>
                            <input type="text" placeholder="Địa chỉ" class="form-control"
                                   name="full_address"
                                   value="{{old('full_address')?old('full_address'):(!empty($accountDetail)?!empty($accountDetail->full_address)?($accountDetail->full_address):'':'')}}">
                            @error('full_address')
                            <span class="msg-alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Tỉnh/Thành phố<sup>*</sup></label>
                            <div class="select-wrapper">
                                <select id="province_id" name="province_id"
                                        data-placeholder="Chọn tỉnh thành..."
                                        class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn tỉnh thành</option>
                                    @foreach($provinces as $province)
                                        <option {{old('province_id')? (old('province_id')==$province->id?'selected':''): (!empty($accountDetail)?$accountDetail->province_id==$province->id?'selected':'':'')}}
                                                value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('province_id')
                            <span class="msg-alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="m-b-6">Quận/Huyện<sup>*</sup></label>
                            <div class="select-wrapper">
                                <select name="district_id" id="district_id"
                                        data-placeholder="Chọn quận huyện..."
                                        class="chosen-select primary-select"
                                        tabindex="2">z
                                    <option value="" disabled selected>Chọn quận huyện</option>
                                    @if(!empty($accountDetail->province_id))
                                        @foreach($districts as $district)
                                            <option {{isset($accountDetail->district_id)?$accountDetail->district_id==$district->id?'selected':'':''}}  value="{{$district->id}}">{{$district->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('district_id')
                            <span class="msg-alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="btn-container tar">
                        <button class="button-primary btn-submit-step1" type="submit">Lưu lại</button>
                    </div>
                </div>
                <div class="page-block m-b-30">
                    <div class="display-flex-wrap m-b-6">
                        <div class="m-text5 p-r-20">Mục tiêu nghề nghiệp</div>
                        <div class="page-block__saved page-block__saved--active">
                            <div class="icon-container"><i class="fa fa-check"></i></div>
                            Đã lưu
                        </div>
                    </div>
                    <small class="m-b-20">Hoàn thành mục <sup class="text-danger">*</sup> để có thể ứng tuyển thành công</small>
                    <div class="form-group">
                        <label class="m-b-6">Mục tiêu nghề nghiệp<sup>*</sup></label>
                        <textarea type="text" placeholder="Mục tiêu nghề nghiệp" class="form-control"
                                  name="career_goals">{{old('career_goals')?old('career_goals'):(!empty($accountDetail)?!empty($accountDetail->career_goals)?($accountDetail->career_goals):'':'')}}</textarea>
                        @error('career_goals')
                        <span class="msg-alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="m-b-6">Điểm mạnh, điểm yếu</label>
                        <textarea type="text" placeholder="Điểm mạnh, điểm yếu" class="form-control"
                                  name="strengths_weaknesses">{{old('strengths_weaknesses')?old('strengths_weaknesses'):(!empty($accountDetail)?!empty($accountDetail->strengths_weaknesses)?($accountDetail->strengths_weaknesses):'':'')}}</textarea>
                    </div>
                    <div class="form-group m-b-25">
                        <label class="m-b-6">Hoạt động ngoại khóa</label>
                        <textarea type="text" placeholder="Hoạt động ngoại khóa" class="form-control"
                                  name="extracurricular_activities">{{old('extracurricular_activities')?old('extracurricular_activities'):(!empty($accountDetail)?!empty($accountDetail->extracurricular_activities)?($accountDetail->extracurricular_activities):'':'')}}</textarea>
                    </div>
                    <div class="btn-container tar">
                        <button class="button-primary btn-submit-step2" type="submit">Lưu lại</button>
                    </div>
                </div>
                <div class="page-block m-b-30">
                    <div class="display-flex-wrap m-b-20">
                        <div class="m-text5 p-r-20">Tính cách</div>
                        <div class="page-block__saved page-block__saved--active">
                            <div class="icon-container"><i class="fa fa-check"></i></div>
                            Đã lưu
                        </div>
                    </div>
                    <div class="form-group m-b-25">
                        <label class="m-b-6">Tính cách của ứng viên</label>
                        <textarea type="text" placeholder="Tính cách ứng viên" class="form-control"
                                  name="character">{{old('character')?old('character'):(!empty($accountDetail)?!empty($accountDetail->character)?($accountDetail->character):'':'')}}</textarea>
                    </div>
                    <div class="btn-container tar">
                        <button class="button-primary" type="submit">Lưu lại</button>
                    </div>
                </div>
            <div class="page-block m-b-30">
                <div class="display-flex-wrap m-b-6">
                    <div class="m-text5 p-r-20">Kinh nghiệm làm việc</div>
                    <div class="page-block__saved page-block__saved--active">
                        <div class="icon-container"><i class="fa fa-check"></i></div>
                        Đã lưu
                    </div>
                </div>
                <small class="m-b-20">Hoàn thành mục <sup class="text-danger">*</sup> để có thể ứng tuyển thành công</small>

                <div class="wrapper wrapper-content animated fadeInRight" id="list_account_exp">
                    @if(count($accountExp) > 0)
                        <?php $i = 1 ?>
                        @foreach($accountExp as $listAccountExp)
                            <div class="item-box item-box--has-tool" id="account_exp_{{isset($listAccountExp->id)?$listAccountExp->id:''}}">
                                <div class="item-box__inner">
                                    <div class="item-box__head m-b-15">
                                        <span class="item-box__title s-text7 m-r-20">{{isset($listAccountExp->company)?$listAccountExp->company:''}}</span>
                                        <span class="item-box__date s-text8">{{isset($listAccountExp->start_time)?date('m/Y', strtotime($listAccountExp->start_time)):''}} - {{isset($listAccountExp->end_time)?date('m/Y', strtotime($listAccountExp->end_time)):''}}</span>
                                    </div>
                                    <div class="item-box__label s-text11 m-b-5">{{isset($listAccountExp->position)?getParseRank($listAccountExp->position):''}}
                                        - {{isset($listAccountExp->field_work)?$listAccountExp->field_work:''}}</div>
                                    <div class="item-box__label s-text11 m-b-5">{{isset($listAccountExp->reference)?$listAccountExp->reference:''}}</div>
                                    <div class="item-box__desc">{{isset($listAccountExp->description)?$listAccountExp->description:''}}</div>
                                </div>
                                <div class="box-tool">
                                    <div class="box-tool__item updateExpAccount" data-value="{{json_encode($listAccountExp)}}">
                                        <i class="icon-edit"></i>
                                    </div>
                                    <div class="box-tool__item"
                                         onclick="deleteAccountExp({{isset($listAccountExp->id)?$listAccountExp->id:''}})">
                                        <i class="icon-trash"></i>
                                    </div>
                                </div>
                            </div>
                            <?php $i++ ?>
                        @endforeach
                    @endif
                </div>

                <a data-toggle="modal" href="#modal-form" class="dotted-button dotted-button--full"><i
                            class="icon-add-2"></i>Thêm kinh nghiệm làm việc</a>
            </div>
            <div class="page-block m-b-30">
                <div class="display-flex-wrap m-b-20">
                    <div class="display-flex-wrap m-b-20">
                        <div class="m-text5 p-r-20">Kỹ năng</div>
                        <div class="page-block__saved page-block__saved--active">
                            <div class="icon-container"><i class="fa fa-check"></i></div>
                            Đã lưu
                        </div>
                    </div>
                </div>

                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="page-point m-b-20" id="list_account_skill">
                            @if(count($accSkill) > 0)
                            @foreach($accSkill as $item)
                                <div class="page-point__item page-point__item--delete m-b-12" id="account_skill_{{isset($item->id)?$item->id:''}}">
                                    <div class="page-point__title s-text9 m-b-7">{{isset($item->name)?$item->name:''}}</div>
                                    <div class="page-point__point s-text9">{{isset($item->point) ? $item->point:''}}%
                                    </div>
                                    <div class="page-point__block">
                                        <div class="page-point__progress"
                                             style="width: {{isset($item->point) ? $item->point:''}}%;"></div>
                                    </div>
                                    <div class="page-point__delete--hover" onclick="deleteAccountSkill({{isset($item->id)?$item->id:''}})">
                                        <div class="page-point__delete"><i class="icon-trash"></i></div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </div>

                <a data-toggle="modal" href="#modal-form_ky_nang" class="dotted-button dotted-button--full"><i
                            class="icon-add-2"></i>Thêm kỹ năng</a>
            </div>
            <div class="page-block m-b-30">
                <div class="display-flex-wrap m-b-6">
                    <div class="m-text5 p-r-20">Học vấn/Bằng cấp</div>
                    <div class="page-block__saved page-block__saved--active">
                        <div class="icon-container"><i class="fa fa-check"></i></div>
                        Đã lưu
                    </div>
                </div>
                <small class="m-b-20">Hoàn thành mục <sup class="text-danger">*</sup> để có thể ứng tuyển thành công</small>
                @if(count($accountEdu) > 0)
                    <div class="wrapper wrapper-content animated fadeInRight listAccountEdu">
                        <?php $i = 1 ?>
                        @foreach($accountEdu as $listAccountEdu)
                            <div class="item-box item-box--has-tool" id="education{{$listAccountEdu->id}}">
                                <div class="item-box__inner">
                                    <div class="item-box__head m-b-15">
                                        <span class="item-box__title s-text7 m-r-20">{{isset($listAccountEdu->school)?$listAccountEdu->school:''}}</span>
                                        <span class="item-box__date s-text8">{{isset($listAccountEdu->start_time)?$listAccountEdu->start_time:''}}{{isset($listAccountEdu->end_time)?' --  '.$listAccountEdu->end_time:''}}</span>
                                    </div>
                                    <div class="item-box__label s-text11 m-b-5">{{isset($listAccountEdu->filed_study)?$listAccountEdu->filed_study:''}}
                                        - {{isset($listAccountEdu->degree)?getParseDegree($listAccountEdu->degree):''}}</div>
                                    <div class="item-box__desc">{{isset($listAccountEdu->description)?$listAccountEdu->description:''}}</div>
                                </div>
                                <div class="box-tool">
                                    <div class="box-tool__item"
                                         onclick="getEducation({{$listAccountEdu->id}})">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <div class="box-tool__item"
                                         onclick="deleteEducation({{ $listAccountEdu->id }})">
                                        <i class="fa fa-trash"></i>
                                    </div>
                                </div>
                            </div>
                            <?php $i++ ?>
                        @endforeach
                    </div>
                @endif
                <a data-toggle="modal" href="#modal-form1" class="dotted-button dotted-button--full"><i
                            class="icon-add-2"></i>Thêm học vấn/bằng cấp</a>
            </div>
            <div class="page-block m-b-30">
                <div class="display-flex-wrap m-b-20">
                    <div class="m-text5 p-r-20">Mong muốn</div>
                    <div class="page-block__saved page-block__saved--active">
                        <div class="icon-container"><i class="fa fa-check"></i></div>
                        Đã lưu
                    </div>
                </div>
                <form method="post" action="{{route('add-account-wish')}}">
                    <div class="page-col-4">
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Lĩnh vực<sup>*</sup></label>
                            <div class="select-wrapper">
                                <select id="filed_work_wish" name="filed_work_wish"
                                        data-placeholder="Chọn chức vụ..."
                                        class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn lĩnh vực</option>
                                    @foreach($fieldJobs as $key => $item)
                                        <option {{old('filed_work_wish')? (old('filed_work_wish')==$key?'selected':''): (!empty($accountWish)?$accountWish->filed_work_wish==$key?'selected':'':'')}}
                                                value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('filed_work_wish')
                            <span class="msg-alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Vị trí:</label>
                            <div class="select-wrapper">
                                <select name="position_wish" data-placeholder="Chọn vị trí..."
                                        class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn vị trí</option>
                                    @foreach(getGroupSales() as $key => $rank)
                                        <option {{old('position_wish')? (old('position_wish')==$key?'selected':''): (!empty($accountWish)?$accountWish->position_wish==$key?'selected':'':'')}} value="{{$key}}">{{$rank}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Loại hình công việc:</label>
                            <div class="select-wrapper">
                                <select name="job_type_wish" data-placeholder="Loại hình công việc..."
                                        class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn loại hình</option>
                                    @foreach(getJobType() as $key => $rank)
                                        <option {{old('job_type_wish')? (old('job_type_wish')==$key?'selected':''): (!empty($accountWish)?$accountWish->job_type_wish==$key?'selected':'':'')}}
                                                value="{{$key}}">{{$rank}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="m-b-6">Mức lương:</label>
                            <div class="select-wrapper">
                                <select name="salary_wish" data-placeholder="Mức lương.."
                                        class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn mức lương</option>
                                    @foreach(getSalary() as $key => $rank)
                                        <option {{old('salary_wish')? (old('salary_wish')==$key?'selected':''): (!empty($accountWish)?$accountWish->salary_wish==$key?'selected':'':'')}}
                                                value="{{$key}}">{{$rank}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Thành phố/ Tỉnh:</label>
                            <div class="select-wrapper">
                                <select name="province_id" id="province_id_wish"
                                        data-placeholder="Chọn tỉnh thành..."
                                        class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn Thành phố/Tỉnh</option>
                                    @foreach($provinces as $province)
                                        <option {{old('province_id')? (old('province_id')==$province->id?'selected':''): (!empty($accountWish)?$accountWish->province_id==$province->id?'selected':'':'')}}
                                                value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Quận/Huyện:</label>
                            <div class="select-wrapper">
                                <select name="district_id" id="district_id_wish"
                                        data-placeholder="Chọn quận huyện..."
                                        class="chosen-select primary-select"
                                        tabindex="2">
                                    <option value="" disabled selected>Chọn Quận/Huyện</option>
                                    @if(!empty($accountWish->province_id))
                                        @foreach($districtsAccountWish as $district)
                                            <option {{isset($accountWish->district_id)?$accountWish->district_id==$district->id?'selected':'':''}}  value="{{$district->id}}">{{$district->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-r-30">
                            <label class="m-b-6">Điều mong muốn:</label>
                            <div class="select-wrapper">
                                <select name="current_priority" data-placeholder="Điều mong muốn ..."
                                        class="chosen-select primary-select" tabindex="2">
                                    <option value="" disabled selected>Chọn mong muốn</option>
                                    @foreach(getCurrentPriority() as $key => $rank)
                                        <option {{old('current_priority')? (old('current_priority')==$key?'selected':''): (!empty($accountWish)?$accountWish->current_priority==$key?'selected':'':'')}}
                                                value="{{$key}}">{{$rank}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="btn-container tar">
                        <button class="button-primary" type="submit">Lưu lại</button>
                    </div>
                </form>
            </div>
{{--            <div class="tab-content">--}}
{{--                <div id="profile_overview" class="tab-pane fade in active">--}}
{{--                    <div class="animated fadeInDown">--}}
{{--                        --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div id="profile_detail" class="tab-pane fade">--}}
{{--                    <div class="animated fadeInDown">--}}
{{--                        --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>

    {{-- modal --}}
    @include('account.modal-create-account-skill')
    @include('account.modal-create-account-exp')
    @include('account.modal-update-account-exp')
    @include('account.modal-create-account-edu')
    @include('account.modal-update-account-edu')
@endsection

@section('CSS')
    <style>
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('javascript')
{{--    <script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
{{--    <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>--}}
{{--    <!-- Data picker -->--}}
{{--    <script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>--}}
{{--    <!-- Date range picker -->--}}
{{--    <script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script>--}}
{{--    <script src="{{asset('js_service/edit-profile.js')}}"></script>--}}
{{--    <script src="{{asset('js_service/update-account-profile.js')}}"></script>--}}
{{--    <script src="{{asset('js_service/profile-step-1.js')}}"></script>--}}
{{--    <script src="{{asset('js-service/active_sub_menu.js')}}"></script>--}}
@endsection
