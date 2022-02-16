<?php $this->title = 'Đăng kí' ?>
<div class="register-cover">
    <div class="container-register-primary">
        <div class="register-title">
            <img src="../../img/lg/usercartoon.png" alt="" />
            <h1> Đăng ký tài khoản </h1>
        </div>
        <div class="register-input-form-cover">
            <form action="#" method="POST" onsubmit="return validateRegister()" id="register-form">
                <div class="register-user-infor">
                    <input type="hidden" name="id" value="">
                    <div class="register-form-input-primary">
                        <i class="fas fa-portrait register-infor-icon"></i>
                        <input type="text" name="full_name" value="" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]{6,}$" placeholder="Nhập họ tên" required title="Không nhập số hoặc kí tự đặc biệt, 6 kí tự trở lên">
                        <p class="register-error-full_name" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
                    </div>
                    <div class="register-form-input-primary">
                        <i class="fas fa-user register-infor-icon"></i>
                        <input type="text" name="username" value="" placeholder="Nhập tên tài khoản" required pattern="[a-zA-Z-0-9._-]{5,20}" title="Chỉ được nhập chữ cái không dấu, số, kí tự '-' và '_', từ 5 đến 20 kí tự">
                        <p class="register-error-username" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
                    </div>
                    <div class="register-form-input-primary">
                        <i class="fas fa-envelope register-infor-icon"></i>
                        <input type="email" name="email" value="" id="email" placeholder="Nhập email" required pattern="^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$" title="Nhập đúng email">
                        <p class="register-error-email" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
                    </div>
                    <div class="register-form-input-primary">
                        <i class="fas fa-phone register-infor-icon"></i>
                        <input type="text" name="phone" value="" placeholder="Nhập số điện thoại" required pattern="^([0-9]{10,11})$" title="Nhập đúng số điện thoại">
                        <p class="register-error-phone" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
                    </div>
                    <div class="register-form-input-primary">
                        <i class="fas fa-map-marker register-infor-icon"></i>
                        <input type="text" name="address" value="" placeholder="Nhập địa chỉ nhà" required>
                        <p class="register-error-address" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
                    </div>
                    <div class="register-form-input-primary">
                        <i class="fas fa-lock register-infor-icon"></i>
                        <input type="password" name="password" value="" id="password" placeholder="Nhập mật khẩu" required pattern="[a-zA-Z0-9!@#$%^&*]{5,}" title="Tối thiểu 5 kí tự, không chứa khoảng trắng">
                        <i class="fa fa-eye show-pass-register" onclick="togglePW()" aria-hidden="true"></i>
                        <i class="fa fa-eye-slash show-pass-register" onclick="togglePW()" aria-hidden="true"></i>
                        <p class="register-error-password" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
                    </div>
                    <div class="register-form-input-primary">
                        <i class="fas fa-lock register-infor-icon"></i>
                        <input type="password" name="repeat_password" value="" id="rpassword" placeholder="Nhập lại mật khẩu" required pattern="[a-zA-Z0-9!@#$%^&*]{5,}" title="Tối thiểu 5 kí tự">
                        <i class="fa fa-eye show-pass-register" onclick="rtogglePW()" aria-hidden="true"></i>
                        <i class="fa fa-eye-slash show-pass-register" onclick="rtogglePW()" aria-hidden="true"></i>
                        <p class="register-error-repeat_password" style="font-size: 14px; margin: -10px 0 7px; color:red"></p>
                    </div>
                    <div class="register-gender">
                        <i class="fas fa-venus-mars"></i>
                        <div class="register-gender-input">
                            <div class="box-radio">
                                <input type="radio" class="gender" name="gender" value="1" id="dot-1" required>
                                <label class="gender_title">Nam</label>
                            </div>
                            <div class="box-radio">
                                <input type="radio" class="gender" name="gender" value="0" id="dot-2">
                                <label class="gender_title">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <p class="register-error-gender" style="font-size: 14px; margin: 0px 0 7px; color:red"></p>
                    <p style="color: red; font-size: 14px;" class="register-error"></p>
                </div>
                <div>
                    <div class="register-submit-btn-primary">
                        <input class="submit-btn-primary" type="submit" value="Đăng ký">
                    </div>
                    <div class="loginnow">Bạn đã có tài khoản rồi? <a class="login-here" href="/login">Đăng nhập ngay</a></div>
                </div>
            </form>
        </div>
    </div>
</div>