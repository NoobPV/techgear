<?php $this->title = 'Trang cá nhân' ?>
<?php if (!\app\controllers\MainController::$ctrl->auth->isLoggedIn()) :   ?>


<?php endif; ?>
<div class="container">
    <?php if (\app\core\Application::$app->session->getFlash('success')) :  ?>
        <div class="alert alert-success" role="alert"><?php echo \app\core\Application::$app->session->getFlash('success') ?></div>
    <?php endif; ?>
    <div class="section">
        <section class="row">
            <article class="col-12 col-sm-12 col-md-12 infor-user-title-cover">
                <div class="infor-user-title">
                    <div class="infor-user-title-img">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="infor-user-title-items">
                        <div class="infor-user-title-items-name">
                            <strong><?php echo \app\controllers\MainController::$ctrl->auth->getUser()->username ?></strong>
                        </div>
                        <div class="infor-user-title-items-time display-block padding-top-1 padding-bottom-1">
                            Ngày đăng ký: <i><?php echo date('Y-m-d', strtotime(\app\controllers\MainController::$ctrl->auth->getUser()->created_at)); ?>
                            </i>
                        </div>
                    </div>
                </div>
                <div class="infor-user">
                    <i class="fas fa-info display-inline-block vertical-align-middle"></i>
                    <h2 class="display-inline-block">THÔNG TIN CÁ NHÂN</h2>
                </div>
            </article>
            <article class="col-12 col-md-6">
                <form action="" method="POST" onsubmit="return validateRegister()">
                    <input type="hidden" name="id" value="<?php echo \app\controllers\MainController::$ctrl->auth->getUser()->id ?>">
                    <div class="infor-user-items">
                        <div class="position-relative input-form display-block">
                            <label for="full_name" class="label">Họ và Tên(*): </label>
                            <input type="text" name="full_name" class="form-control" value="<?php echo \app\controllers\MainController::$ctrl->auth->getUser()->full_name ?>" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]{6,20}$" placeholder="Nhập họ tên" required title="Không nhập số hoặc kí tự đặc biệt, 6 kí tự trở lên">
                            <span class="fas fa-user form-icon"></span>
                        </div>
                        <span class="name-status"></span>
                        <div class="position-relative input-form">
                            <label for="username" class="label">Tên Tài Khoản(*): </label>
                            <input type="text" name="username" class="form-control" value="<?php echo \app\controllers\MainController::$ctrl->auth->getUser()->username ?>" disabled>
                            <span class="fas fa-paper-plane form-icon"></span>
                        </div>
                        <!-- <div>
                            <div class="position-relative input-form">
                                <label for="password" class="label">Mật Khẩu Mới: </label>
                                <i class="fas fa-eye form-icon-hidden-password password-lock-on" id="open-pass-btn" data-pass-lock="3"></i>
                                <i class="fas fa-eye-slash form-icon-hidden-password pass-word-lock-primary password-lock-off" id="lock-pass-btn" data-pass-lock="3"></i>
                                <input type="password" name="password" class="form-control pass-word-lock" id="lock-pass" placeholder="mật khẩu mới" value="" required pattern="[a-zA-Z0-9!@#$%^&*]{6,}" title="Tối thiểu 6 kí tự, không chứa khoảng trắng">
                                <span class="fas fa-lock form-icon"></span>
                            </div>
                            <span class="pass-status"></span>
                            <div class="position-relative input-form">
                                <label for="passworded" class="label">Xác Nhận Mật Khẩu Mới: </label>
                                <i class="fas fa-eye form-icon-hidden-password password-lock-on" id="open-passed-btn" data-pass-lock="2"></i>
                                <i class="fas fa-eye-slash form-icon-hidden-password pass-word-lock-primary password-lock-off" id="lock-passed-btn" data-pass-lock="2"></i>
                                <input type="password" class="form-control pass-word-lock" id="lock-passed" placeholder="xác nhận mật khẩu mới" required pattern="[a-zA-Z0-9!@#$%^&*]{6,}" title="Tối thiểu 6 kí tự, không chứa khoảng trắng">
                                <span class="fas fa-lock form-icon"></span>
                            </div>
                            <span class="passed-status"></span>
                        </div> -->
                        <div class="position-relative input-form">
                            <label for="gender" class="label padding-bottom-4">Giới Tính: </label><br>
                            <span class="fas fa-venus-mars margin-right-4"></span>
                            <input type="radio" id="male" name="gender" value="1" <?php echo (\app\controllers\MainController::$ctrl->auth->getUser()->gender) == 1 ? 'checked' : '' ?> required>
                            <label for="male" class="margin-right-2">Nam</label>
                            <input type="radio" id="female" name="gender" value="0" <?php echo (\app\controllers\MainController::$ctrl->auth->getUser()->gender) == 0 ? 'checked' : '' ?>>
                            <label for="female">Nữ</label>
                        </div>
                    </div>
                    <a href="/change-password">Đổi mật khẩu</a>

            </article>
            <aside class="col-12 col-md-6">

                <div class="infor-user-items">
                    <div class="position-relative input-form">
                        <label for="email" class="label">Email(*): </label>
                        <input type="email" name="email" class="form-control" value="<?php echo \app\controllers\MainController::$ctrl->auth->getUser()->email ?>" required pattern="^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$" title="Nhập đúng email">
                        <span class="fas fa-envelope form-icon"></span>
                    </div>
                    <span class="email-status"></span>
                    <span class="email-status"></span>

                    <span class="gender-status"></span>
                    <div class="position-relative input-form">
                        <label for="phone" class="label margin-top-4">Số điện thoại: </label>
                        <input type="text" name="phone" class="form-control" style="padding-left: 20px;" value="<?php echo \app\controllers\MainController::$ctrl->auth->getUser()->phone ?>" required pattern="^[0-9]{10-11})$" title="Nhập đúng số điện thoại">
                        <!--<span class="fas fa-table form-icon"></span>-->
                    </div>
                    <div class="position-relative input-form">
                        <label for="address" class="label">Địa chỉ: </label>
                        <input type="text" name="address" class="form-control" placeholder="địa chỉ" value="<?php echo \app\controllers\MainController::$ctrl->auth->getUser()->address ?>" required>
                        <span class="fas fa-map-marker-alt form-icon"></span>
                    </div>
                </div>
            </aside>
            <div class="error"></div>
            <?php if (isset($errors)) : ?>
                <?php foreach ($errors as $error) : ?>
                    <p style="color:red"><?= $error ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="col-12 col-md-12 text-center">
                <button class="submit-edit-primary submit-edit-infor-btn">Đổi Thông Tin</button>
            </div>
            </form>

        </section>
    </div>
</div>
<script>
    function validateRegister() {
        let password = document.querySelector('#lock-pass').value;
        let rpassword = document.querySelector('#lock-passed').value;
        let errorRPassword = document.querySelector('.error');

        if (password !== rpassword) {
            errorRPassword.innerHTML = "Mật khẩu không giống nhau";
            return false;
        }

        return true;
    }
</script>