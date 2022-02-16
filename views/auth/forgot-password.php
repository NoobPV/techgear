<?php $this->title = 'Quên mật khẩu' ?>
<div class="container-forgot">
    <div class="bg-login-cover">
        <img src="../../img/lg/forgot2.jpg" alt="" />
    </div>
    <form action="" method="post" class="login-form-primary" id="forgot-pass-form">
        <div class="login-form-user-img">
            <img style="border-radius: 50%;" src="../../img/lg/pass.jpg" alt="" />
            <h1>Quên Mật Khẩu</h1>
        </div>
        <div class="input-login-primary">
            <i class="far fa-paper-plane user-login-icon"></i>
            <input type="hidden" name="id">
            <input class="" type="email" name="email" placeholder="Nhập địa chỉ Email" required>
        </div>
        <p style="color: red; font-size: 14px;" class="forgot-pass-error"></p>
        <div class="login-submit-btn-primary">
            <button>Xác nhận</button>
        </div>
        <div class="register-now">Bạn đã tạo tài khoản chưa? Bấm vào <a class="register-here" href="/register">đây</a></div>
    </form>
</div>