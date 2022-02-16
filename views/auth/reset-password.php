<?php $this->title = 'Đặt lại mật khẩu' ?>
<div class="container-reset">
    <div class="bg-login-cover">
        <img src="../../img/lg/forgot2.jpg" alt="" />
    </div>
    <form action="" method="post" class="login-form-primary" onsubmit="return validateResetPass()" id="reset-pass-form">
        <input type="hidden" name="id" value="<?= $customer->id ?>">
        <div class="login-form-user-img">
            <img style="border-radius: 50%;" src="../../img/lg/pass.jpg" alt="" />
            <h1>Đặt lại mật khẩu</h1>
        </div>
        <div class="input-login-primary">
            <i id="password" class="fas fa-lock user-login-icon"></i>
            <input class="show-pass-input" type="password" name="password" id="password" placeholder="Nhập mật khẩu mới" required pattern="[a-zA-Z0-9!@#$%^&*]{5,}" title="Tối thiểu 5 kí tự, không chứa khoảng trắng">
            <i class="far fa-eye icon-show-pass-login" onclick="ltogglePW()" aria-hidden="true"></i>
            <p class="reset-error-password" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
        </div>
        <div class="input-login-primary">
            <i id="rpassword" class="fas fa-lock user-login-icon"></i>
            <input class="show-pass-input" name="rpassword" type="password" id="rpassword" placeholder="Nhập lại mật khẩu mới" required pattern="[a-zA-Z0-9!@#$%^&*]{5,}" title="Tối thiểu 5 kí tự, không chứa khoảng trắng">
            <i class="far fa-eye icon-show-pass-login" onclick="atogglePW()" aria-hidden="true"></i>
            <p class="reset-error-rpassword" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
        </div>
        <p class="reset-pass-error" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
        <div class="login-submit-btn-primary">
            <button>Xác nhận</button>
        </div>
        <!-- <div class="register-now">Bạn đã tạo tài khoản chưa? Bấm vào <a class="register-here" href="/register">đây</a></div> -->
    </form>
</div>