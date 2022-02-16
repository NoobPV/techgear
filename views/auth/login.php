<?php

use app\core\Application;

$this->title = 'Đăng nhập'
?>
<div class="container-login">
    <div class="bg-login-cover">
        <img src="../../img/lg/forgot2.jpg" alt="" />
    </div>
    <form action="" method="POST" class="login-form-primary" id="login-form" onsubmit="return validateLogin()">
        <div class="login-form-user-img">
            <img src="../../img/lg/usercartoon.png" alt="" />
            <h1>Đăng nhập</h1>
        </div>
        <?php if (Application::$app->session->getFlash('success')) : ?>
            <div class="alert alert-success" style="color: #28a745; margin-bottom: 5px"><?php echo Application::$app->session->getFlash('success') ?></div>
        <?php endif; ?>
        <div class="input-login-primary">
            <i id="userpass" class="fas fa-user user-login-icon"></i>
            <input class="" type="text" name="username" placeholder="Nhập tên tài khoản" required>
        </div>
        <p class="login-error-username" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
        <div class="input-login-primary">
            <i id="userpass" class="fas fa-lock user-login-icon"></i>
            <input class="" type="password" name="password" placeholder="Nhập mật khẩu" required>
            <i class="far fa-eye icon-show-pass-login" onclick="ltogglePW()" aria-hidden="true"></i>
        </div>
        <p class="login-error-password" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
        <p style="color: red; font-size: 14px;" class="login-error"></p>
        <div class="forgot-pass-login">
            <a href="/forgot-password" class="losspass-primary"><i>Quên mật khẩu ?</i></a>
        </div>
        <div class="login-submit-btn-primary">
            <button>Đăng nhập</button>
        </div>
        <div class="register-now">Bạn chưa có tài khoản? <a class="register-here" href="/register">Bấm vào đây</a></div>
    </form>
</div>