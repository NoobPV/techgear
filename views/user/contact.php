<?php $this->title = 'Liên hệ' ?>
<?php if (\app\core\Application::$app->session->getFlash('success')) :  ?>
    <div class="alert alert-success" role="alert"><?php echo \app\core\Application::$app->session->getFlash('success') ?></div>
<?php endif; ?>
<div class="catagory-pages-header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <ul class="catagory-pages-header-home">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>/</li>
                    <li>
                        Liên Hệ
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row section-contact">
        <article class="col-12 col-md-6 contact-infor">
            <div class="section-title contact-title">
                <h2>Thông Tin Liên Hệ</h2>
            </div>
            <p class="contact-contents">Xin chào, nếu bạn quan tâm đến sản phẩm nào xin hãy liên hệ địa chỉ bên dưới!</p>
            <ul>
                <li><strong>Email</strong>: <i>trantham3298@email.com</i></li>
                <li><strong>Số điện thoại</strong>: <i>0964-616-978</i></li>
                <li><strong>Địa chỉ</strong>: <i>Số 6 Lê Lợi - Phường 4 - Quận Gò Vấp - TPHCM</i></li>
            </ul>
        </article>
        <article class="col-12 col-md-6 send-emai">
            <div class="section-title contact-title">
                <h2>Gửi Thông Điệp Cho Chúng Tôi</h2>
            </div>
            <div>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="">
                    <input class="display-block input-contact-style" type="email" name="email" placeholder="Email của bạn...">
                    <span class="email-status"></span>
                    <input class="display-block input-contact-style" type="text" name="full_name" placeholder="Họ Và Tên của bạn...">
                    <span class="name-status"></span>
                    <textarea class="display-block input-contact-style textarea-style" name="body" id="body" placeholder="Bạn muốn nói gì?"></textarea>
                    <span class="mess-status"></span>
                    <button class="display-block style-button-send-email send-email-btn">Đồng Ý</button>
                </form>
            </div>
        </article>
    </div>
</div>
<section class="container-fluid">
    <article class="confirm-contact-form">
        <div class="confirm-contact-contents">
            <span class="confirm-contact-status display-block">gửi đi thành công</span>
            <div class="display-block confirm-contact-button">
                <button class="display-inline-block submit-contact-btn">Đồng ý</button>
            </div>
        </div>
    </article>
</section>