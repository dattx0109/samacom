<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Xác nhận tài khoản</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/partials.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

</head>

<body style="padding-top: 0;">
<div class="login-container">
    <div class="login-img animated fadeInLeft" style="background-image: url('{{asset('img/acc/register.png')}}')">

    </div>
    <div class="login-content">
        <div class="login-inner animated fadeInDown">
            <a href="/" class="login-logo">
                <img src="{{asset('img/acc/logo.png')}}" class="m-b-30" alt="samacom-logo">
            </a>
            <h1 class="m-text1 m-b-30">Xác nhận tài khoản</h1>
            <div class="confirm_code">

                @if($verifyAccount->count_verify !=5)
                    @if(strtotime($verifyAccount->expried_at)>strtotime( date('Y-m-d H:i:s')))
                        <div> <p class="text-info ">Vui lòng kiểm tra email "{{request()->user->email}}" để lấy mã xác nhận và xác thực vào ô bên dưới</p></div>
                        <form class="m-t" role="form" action="{{url('/confirm/code')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control m-b-10" name="code" placeholder="Mã xác nhận">
                                {{--<p>code:{{$verifyAccount->code}}</p>--}}
                                <input type="hidden" name="timeout" value="{{$verifyAccount->expried_at}}">
                                <input type="hidden" name="count_verify" value="{{$verifyAccount->count_verify}}">
                                @if (session('activeError'))
                                    <div class="text-danger">
                                        {{ session('activeError') }}
                                    </div>
                                @endif
                                @if($errors->has('name'))
                                    <span class="text-danger text-under-input">
                                {{$errors->first('name')}}
                            </span>
                                @endif
                                @if(isset($activeError))
                                    <span class="text-danger text-under-input">
                                        {{$activeError}}
                                        </span>
                                @endif
                            </div>
                            <button type="submit" id="btn-confirm" class="button-primary m-b-10">Xác nhận</button>
                        </form>
                    @else
                        <span class="text-danger text-under-input">Thời gian nhập mã đã hết. Hãy tạo mã mới </span>
                    @endif
                @else
                    <span class="text-danger text-under-input">Bạn đã lấy nhập 5 lần sai liên tiếp.Hãy lấy mã mới </span>
                @endif
            </div>


            @if($countCodeActive !=3  )
                <button type="button" id="btn-new-code" class="button-register m-b-10 m-t-10">Gửi lại mã xác nhận</button>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

            @else
                @if(strtotime($verifyAccount->expried_at)< strtotime( date('Y-m-d H:i:s')))
                    <span class="text-danger text-under-input">Bạn đã lấy mã 3 lần trong ngày hôm nay.Hãy quay lại vào ngày mai </span>
                @endif
            @endif

{{--            @if(strtotime($verifyAccount->expried_at)>strtotime( date('Y-m-d H:i:s')))--}}
{{--                <p class="text-muted text-center">--}}
{{--                    <span id="timer">--}}
{{--                        <small id="time"></small>&nbsp;giây--}}
{{--                    </span>--}}
{{--                </p>--}}
{{--            @endif--}}
        </div>
    </div>
</div>

<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('js_service/sms-confirm.js')}}"></script>

</body>

</html>

