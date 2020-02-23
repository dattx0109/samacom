<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{asset('img/favicon.png')}}"/>
    <title>Đăng ký tài khoản</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
{{--    <link href="{{asset('css/style.css')}}" rel="stylesheet">--}}
    <!-- Sass main CSS -->
    <link href="{{asset('css/sass/dist/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sass/dist/partials.css')}}" rel="stylesheet">

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
            <div class="m-text1 m-b-30">Đăng ký tài khoản</div>
            <form class="m-t" role="form" action="{{url('/register')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="s-text9">Tên đăng nhập<sup>*</sup></label>
                    <input value="{{old('name')}}" type="text" class="form-control" name="name" placeholder="Nhập họ tên">
                    @if($errors->has('name'))
                        <span class="text-danger   text-under-input">
                            {{$errors->first('name')}}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="s-text9">Email<sup>*</sup></label>
                    <input value="{{old('email')}}" type="text" class="form-control" name="email" placeholder="Nhập email">
                    @if($errors->has('email'))
                        <span class="text-danger  text-under-input">
                            {{$errors->first('email')}}
                        </span>
                    @endif
                    <p class="text-danger  text-under-input">
                        @if(isset($messageEmailExits))
                            {{$messageEmailExits}}
                        @endif
                    </p>
                </div>
                <div class="form-group">
                    <label class="s-text9">Số điện thoại<sup>*</sup></label>
                    <input value="{{old('phone')}}" type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
                    @if($errors->has('phone'))
                        <span class="text-danger   text-under-input">
                            {{$errors->first('phone')}}
                        </span>
                    @endif
                    <p class="text-danger pull-right text-under-input">
                        @if(isset($messagePhoneExits))
                            {{$messagePhoneExits}}
                        @endif
                    </p>
                </div>
                <div class="form-group">
                    <label class="s-text9">Mật khẩu<sup>*</sup></label>
                    <div class="form-pass-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu từ 6 - 32 ký tự">
                        <i onclick="myFunction()" class="icon-visualization"></i>
                    </div>
                    @if($errors->has('password'))
                        <span class="text-danger  text-under-input">
                            {{$errors->first('password')}}
                        </span>
                    @endif
                </div>
                <div class="form-group m-b-30">
                    <label class="s-text9">Nhập lại mật khẩu<sup>*</sup></label>
                    <div class="form-pass-group">
                        <input type="password" id="passwordNew" class="form-control" name="confirm_password"
                               placeholder="Nhập lại mật khẩu">
                        <i onclick="myFunctionNew()" class="icon-visualization"></i>
                    </div>
                    @if($errors->has('confirm_password'))
                        <span class="text-danger text-left text-under-input">
                            {{$errors->first('confirm_password')}}
                        </span>
                    @endif
                </div>
                <button type="submit" class="button-primary m-t-10 m-b-20">Tạo tài khoản</button>
                <div class="form-desc m-tac">Khi bạn nhấn Đăng ký, bạn đã đồng ý thực hiện mọi giao dịch mua bán theo <a href="{{url('/dieu-khoan-chinh-sach')}}">điều kiện sử dụng và chính sách của Samacom</a></div>

{{--                <p class="text-muted text-center"><small>Bạn đã có tài khoản?</small></p>--}}
{{--                <a class="btn btn-sm btn-white btn-block" href="{{url('/login')}}">Đăng nhập</a>--}}
            </form>
        </div>
    </div>
</div>
{{--<div class="animated fadeInDown">--}}
{{--    <div>--}}
{{--        <div class="text-center">--}}
{{--            <img src="{{asset('img/acc/logo.png')}}" alt="samacom-logo">--}}
{{--            <h3>Đăng ký tài khoản Samacom</h3>--}}
{{--        </div>--}}


{{--        <p class="m-t text-center">--}}
{{--            <small>Thông tin liên lạc liên hệ SAMACOM TEAM</small>--}}
{{--            <br/>--}}
{{--            <small class="text-danger">Phone: 0868888336</small>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--</div>--}}


<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}} "></script>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function myFunctionNew() {
        var x = document.getElementById("passwordNew");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>

</html>
