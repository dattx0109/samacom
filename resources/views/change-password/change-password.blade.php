<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đăng nhập</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
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
            <div class="m-text1 m-b-30">Đổi mật khẩu</div>
            @if(isset($changePasswordSuccess))
                <span class="text-success">{{$changePasswordSuccess}}</span>
            @endif
            <form class="m-t" role="form" action="{{url('/change-password')}}" method="post">
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu cũ">
                    @if($errors->has('password'))
                        <span class="text-danger  text-under-input">
                        {{$errors->first('password')}}
                    </span>
                    @endif
                    <br>
                    <input type="password" class="form-control" name="password_new" placeholder="Mật khẩu mới">
                    @if($errors->has('password_new'))
                        <span class="text-danger  text-under-input">
                        {{$errors->first('password_new')}}
                    </span>
                    @endif
                    <br>
                    <input type="password" class="form-control" name="password_confirm" placeholder="Xác nhận mật khẩu mới">
                    @if($errors->has('password_confirm'))
                        <span class="text-danger  text-under-input">
                        {{$errors->first('password_confirm')}}
                        </span>
                    @endif
                </div>
                <button type="submit" class="button-primary m-b-10">Xác nhận</button>
            </form>
        </div>
    </div>
</div>


<script src="{{asset('js_service/sms-confirm.js')}}"></script>
</body>

</html>
