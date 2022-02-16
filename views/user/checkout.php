<?php $this->title = 'Thanh toán' ?>
<section class="checkout">
    <?php if (!\app\controllers\MainController::$ctrl->auth->isLoggedIn()) :   ?>
        <div class="container-fluid checkout-head" style="height: 300px;">
            <div>
                <h2 class="checkout-title">Thanh toán</h2>
                <p>
                    <i style="color: #666;">Đăng nhập để mua được hàng và sẽ được nhiều ưu đãi hơn</i>
                </p>
            </div>
            <a href="/login">ĐĂNG NHẬP</a>
        </div>
    <?php elseif (empty($_SESSION['cart'])) : ?>
        <div class="container-fluid checkout-head" style="height: 300px;">
            <div>
                <h2 class="checkout-title">Thanh toán</h2>
                <p>
                    <i style="color: #666;">Bạn chưa có sản phẩm trong giỏ hàng</i>
                </p>
            </div>
            <a href="/product-list">Thêm sản phẩm</a>
        </div>
    <?php else : ?>
        <form action="" method="POST">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-7 checkout-box">
                        <div class="shipping-address checkout-content">
                            <input type="hidden" name="id" value="" />
                            <input type="hidden" name="customer_id" value="<?php echo \app\controllers\MainController::$ctrl->auth->getUser()->id ?>" />
                            <h3>Thông tin giao hàng</h3>
                            <br>
                            <p>Họ và tên: <span class="font-weight-bold"><?php echo \app\controllers\MainController::$ctrl->auth->getUser()->full_name ?></span></p>
                            <p>Số điện thoại: <span class="font-weight-bold"><?php echo \app\controllers\MainController::$ctrl->auth->getUser()->phone ?></span></p>
                            <div class="form-group">
                                <label for="last-name">Địa chỉ giao hàng</label>
                                <input type="text" name="ship_address" class="form-control" value="<?php echo \app\controllers\MainController::$ctrl->auth->getUser()->address ?>" required />
                            </div>
                        </div>
                        <div class="shipping-address checkout-content">
                            <h3>Phương thức thanh toán</h3>
                            <br>
                            <div class="box-radio">
                                <input type="radio" name="payment_type_id" value="1" required>
                                <label>Thẻ tín dụng</label>
                            </div>
                            <div class="box-radio">
                                <input type="radio" name="payment_type_id" value="2">
                                <label>Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-xl-5 checkout-box">
                        <div class="order-summary checkout-content">
                            <h3>Tổng Đơn</h3>
                            <hr>
                            <div class="total-product toggle-menu-product-btn">
                                <span><?= $_SESSION['amount'] ?> sản phẩm trong giỏ</span>
                                <i class="fas fa-chevron-down icon-toggle-btn"></i>
                                <i class="fas fa-chevron-up icon-toggle-btn  icon-toggle-up"></i>
                            </div>
                            <hr>
                            <nav class="product-box list-product">
                                <ul>
                                    <?php foreach ($_SESSION['cart'] as $product) : ?>
                                        <li>
                                            <img data-src="/img/products/<?= $product['image'] ?>" alt="" class="lazy-load" />
                                            <div class="product-infor">
                                                <div class="product-name">
                                                    <a href="/product-detail?id=<?= $product['product_id'] ?>"><?= $product['product_name'] ?> </a>
                                                </div>
                                                <div class="product-quantity">
                                                    <span style="margin-right: 5px;">Số lượng: <?= $product['quantity'] ?></span>
                                                </div>
                                            </div>
                                            <div class="product-price"><?= number_format($product['list_price'], 0, ',', '.') ?>đ</div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                            <div class="cart-summary-content">
                                <div class="cart-summary-box">
                                    <p>Tổng giá</p>
                                    <p><?= !empty(($_SESSION['total_price'])) ? number_format(($_SESSION['total_price']), 0, ',', '.') : '0' ?>đ</p>
                                </div>
                                <div class="cart-summary-box">
                                    <p>Số tiền đã giảm</p>
                                    <p style="color: red;"><?= !empty(($_SESSION['total_discount'])) ? number_format(($_SESSION['total_discount']), 0, ',', '.') : '0' ?>đ</p>
                                </div>
                                <div class="cart-summary-box">
                                    <p style="font-size: 18px;">Tổng đơn hàng</p>
                                    <p style="font-size: 18px;"><?= !empty(($_SESSION['subtotal'])) ? number_format(($_SESSION['subtotal']), 0, ',', '.') : '0' ?>đ</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Lời nhắn</p>
                                <textarea name="comment" class="input-textarea"></textarea>
                            </div>
                            <!-- <div class="checkout-discount">
                                <form action="" class="form-discount">
                                    <input class="code-discount" type="text" placeholder="Nhập mã giảm giá">
                                    <input class="apply-btn" type="submit" value="ÁP DỤNG GIẢM GIÁ">
                                </form>
                            </div> -->
                            <input type="submit" value="ĐẶT HÀNG" class="order-btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>
</section>