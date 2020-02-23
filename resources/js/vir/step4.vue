<template>
    <div>
        <div class="va-step va-step-4 animated fadeInDown">
            <div class="page-block m-b-30 size1 tac">
                <div class="s-text2 m-b-6">Xem kết quả</div>
                <div class="s-text8 m-b-20">Mã xác thực đã được gửi đến điện thoại của bạn, hãy vui lòng nhập mã xác thực để xem kết quả * Mật khẩu mới dùng để đăng ký tài khoản trong hệ thống</div>
                <input type="password" name="password-new" class="form-control m-b-10" placeholder="Nhập mật khẩu mới">
                <input type="text" class="form-control m-b-10" name="code-verify" placeholder="Nhập mã xác thực">
                <p class="p-code-verify text text-danger pull-right"></p>
                {{--                            <div class="form-countdown m-b-20" id="countdownTime">10:00</div>--}}
                <button class="button-primary pull-left sms-btn" type="submit">Tiếp tục</button>
                <br/>
            </div>
        </div>
        <div class="va-step va-step-4-1 animated fadeInDown">
            <div class="page-block m-b-30 size1 tac">
                <div class="s-text2 m-b-6">Login</div>
                <div class="s-text8 m-b-20">Tài khoản đã có trong hệ thống vui lòng đăng nhập để tiếp tục</div>
                <input type="text" name="phone-verify" class="form-control m-b-10" readonly>
                <input type="password" name="password-verify" class="form-control m-b-10" placeholder="Nhập mật khẩu">
                <p class="pull-right text text-danger login-password"></p>
                <button class="button-primary login-btn" type="submit">Tiếp tục</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step4"
    }
</script>

<style scoped>

</style>