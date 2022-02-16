<?php $this->title = 'Đổi mật khẩu' ?>
<div class="container-change-pass">
    <div class="bg-login-cover">
        <img src="../../img/lg/forgot2.jpg" alt="" />
    </div>
    <form action="" onsubmit="return validateChangePass()" method="POST" class="login-form-primary" id="change-pass-form">
        <div class="login-form-user-img">
            <img style="border-radius: 50%;" src="../../img/lg/pass.jpg" alt="" />
            <h1>Đổi mật khẩu</h1>
        </div>
        <div class="input-login-primary">
            <i id="userpass" class="fas fa-user user-login-icon"></i>
            <input class="" type="text" name="username" placeholder="Nhập tên tài khoản" required>
            <p class="change-error-username" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
        </div>
        <div class="input-login-primary">
            <i id="userpass" class="fas fa-lock user-login-icon"></i>
            <input class="" type="password" name="old_password" placeholder="Nhập mật khẩu cũ" required>
            <i class="far fa-eye icon-show-pass-login" onclick="btogglePW()" aria-hidden="true"></i>
            <p class="change-error-old_password" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
        </div>
        <div class="input-login-primary">
            <i id="userpass" class="fas fa-lock user-login-icon"></i>
            <input class="" type="password" name="password" placeholder="Nhập mật khẩu mới" required pattern="[a-zA-Z0-9!@#$%^&*]{5,}" title="Tối thiểu 5 kí tự, không chứa khoảng trắng">
            <i class="far fa-eye icon-show-pass-login" onclick="ltogglePW()" aria-hidden="true"></i>
            <p class="change-error-password" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
        </div>
        <div class="input-login-primary">
            <i id="userpass" class="fas fa-lock user-login-icon"></i>
            <input class="" type="password" name="rpassword" placeholder="Nhập lại mật khẩu mới" required pattern="[a-zA-Z0-9!@#$%^&*]{5,}" title="Tối thiểu 5 kí tự, không chứa khoảng trắng">
            <i class="far fa-eye icon-show-pass-login" onclick="atogglePW()" aria-hidden="true"></i>
            <p class="change-error-repeat_password" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
        </div>
        <p style="color:red" class="change-pass-error"></p>
        <div class="forgot-pass-login">
            <a href="/forgot-password" class="losspass-primary"><i>quên mật khẩu ?</i></a>
        </div>
        <div class="login-submit-btn-primary">
            <button>Đổi mật khẩu</button>
        </div>
        <div class="register-now">Bạn đã tạo tài khoản chưa? Bấm vào <a class="register-here" href="/register">đây</a></div>
    </form>
</div>