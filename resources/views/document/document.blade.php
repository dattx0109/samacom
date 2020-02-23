@extends('layouts.base')

@section('content')
    <div class="container p-t-40 p-b-40">
        <div class="page-block animated fadeInDown">
            <h1 class="s-text2 m-b-14">Danh sách file</h1>
            <div class="">
                <table class="table table-doc table-responsive">
                    <thead class="mobile-hidden">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Tên tệp</th>
                        <th scope="col">Dung lượng</th>
                        <th scope="col"><div class="tac">Trạng thái</div></th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $key => $item)
                        <tr>
                            <th scope="row"><i class="icon-file big-icon"></i></th>
                            <td><div class="s-text9">{{$item['value']}}</div></td>
                            <td class="mobile-hidden"><div class="s-text8">{{$item['size']}}</div></td>
                            <td class="mobile-hidden"><div class="tac s-text13">
                                    <i class="icon-unlock text-info"></i>
{{--                                    <i class="icon-padlock color-red"></i>--}}
                                </div></td>
                            <td>
                                <ul class="table-list p-t-10">
{{--                                    <li class="table-list__has-sub mobile-hidden">--}}
{{--                                        <i class="icon-share"></i>--}}
{{--                                        <ul class="table-list__sub">--}}
{{--                                            <li>--}}
{{--                                                <a href="">--}}
{{--                                                    <i class="fa fa-facebook"></i>Facebook--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="">--}}
{{--                                                    <i class="fa fa-linkedin"></i>Linkedin--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
                                    <li class="" data-toggle="tooltip" data-placement="top" title="Tải xuống">
                                        @if(request()->session()->has('user'))
                                            <div class="download-file" data-dowload="/download-file?file={{$item['link']}}"  data-id="{{$key}}"><i class="icon-download-1"></i></div>
                                        @else
                                            <div class="download-file-1" style="cursor: pointer" data-toggle="modal" data-target="#modalDownload"><i class="icon-download-1"></i></div>
                                        @endif
                                    </li>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalDownload" tabindex="-1" role="dialog" aria-labelledby="modalDownload" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body modal-body--no-padding">
                                                    <div class="popup-container tac p-b-25">
                                                        <div class="m0a modal-icon-block m-b-20"><i class="icon-user-2"></i></div>
                                                        <div class="m-text3 m-b-6">Bạn chưa đăng nhập</div>
                                                        <div class="s-text15 m-b-30">Vui lòng đăng nhập để tải file</div>
                                                        <div class="display-flex-wrap jcc">
                                                            <a href="{{url('/login')}}" class="button-register m-r-10" data-dismiss="modal" data-toggle="tooltip" data-placement="top" title="Đóng popup">Đóng</a>
                                                            <a href="{{url('/confirm/sms')}}" class="button-primary" data-toggle="tooltip" data-placement="top" title="Tới trang đăng nhập">Đăng nhập</a>
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
                                    <!-- End Modal -->
{{--                                    <div class="popup-form {{$key}}" hidden>--}}
{{--                                        <div class="s-text2 m-b-6">Mở khóa tài liệu</div>--}}
{{--                                        <div class="s-text8 m-b-20">Nhập mật khẩu để mở khóa và tải xuống tệp tài liệu</div>--}}
{{--                                        <div class="form-pass-group">--}}
{{--                                            <input class="form-control m-b-20 input-{{$key}}" type="password" placeholder="Nhập mã khoá học" class="form-control">--}}
{{--                                            <i class="icon-visualization"></i>--}}
{{--                                        </div>--}}
{{--                                        <div class="button-list">--}}
{{--                                            <div class="button-register m-r-10 document-cls">Đóng</div>--}}
{{--                                            <button disabled class=" button-primary btn-{{$key}}" data-dowload="/download-file?file={{$item['link']}}">Tải xuống</button>--}}
{{--                                        </div>--}}
{{--                                        <div class="popup-form-cls">--}}
{{--                                            <div class="popup-form-cls-inner">--}}
{{--                                                <i class="icon-close-2"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script src="{{ asset('js-service/download-file.js') }}"></script>
@endsection
