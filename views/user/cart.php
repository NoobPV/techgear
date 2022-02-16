<?php $this->title = 'Giỏ hàng';

use app\controllers\MainController; ?>
<section class="cart">
    <h1 class="cart-title">GIỎ HÀNG</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-9 cart-product">
                <form action="/cart" method="POST" id="update-cart-form">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Giảm giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng giá</th>
                                    <button class="abc" style="display:none;"></button>
                                </tr>

                            </thead>
                            <tbody class="show-cart-item">
                                <?php if (!empty($_SESSION['cart'])) : ?>
                                    <?php foreach ($_SESSION['cart'] as $product) : ?>
                                        <tr>

                                            <td>
                                                <div class="layout-list list-cart-item">
                                                    <input type="hidden" name="updateId[]" value="<?= $product['product_id'] ?>">
                                                    <a href="/product-detail?id=<?= $product['product_id'] ?>">
                                                        <img data-src="../img/products/<?= $product['image'] ?>" alt="" class="lazy-load" />
                                                        <span><?= $product['product_name'] ?></span>
                                                    </a>
                                                </div>
                                            </td>

                                            <td class="list-cart-price"><?= MainController::$ctrl->formatPrice($product['list_price']) ?>đ</td>
                                            <td class="list-cart-action">
                                                <?php echo $product['discount_amount'] ?? '0'  ?>%
                                            </td>
                                            <td class="list-cart-quanti">
                                                <div class="quantity">
                                                    <input type="number" name="quantity[]" value="<?= $product['quantity'] ?>" min="0">
                                                </div>
                                            </td>

                                            <td class="list-cart-action">
                                                <div class="show-price">
                                                    <?php if (isset($product['discount_price'])) : ?>
                                                        <span><?= MainController::$ctrl->formatPrice($product['discount_price'] * $product['quantity']) ?>đ</span>
                                                    <?php else : ?>
                                                        <span><?= MainController::$ctrl->formatPrice($product['list_price'] * $product['quantity']) ?>đ</span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="list-cart-action-cover">
                                                    <a href="/product-detail?id=<?= $product['product_id'] ?>" title="detail">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a title="delete" class="delete-product-cart" data-id="<?= $product['product_id'] ?>">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <tbody>
                        </table>
                    </div>
                    <div class="cart-btn">
                        <a href="/" class="previous-shopping button-cart-primary">
                            <i class="fas fa-chevron-left"></i>
                            Tiếp tục mua hàng
                        </a>
                        <span class="clear-cart-primary delete-all-product-cart">Xóa giỏ hàng</span>
                        <input type="submit" class="button-cart-primary" value="Cập nhật giỏ hàng">
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-3 cart-summary">
                <h3>Kê khai</h3>
                <hr>
                <div class="cart-summary-content">
                    <div class="cart-summary-box">
                        <p>Tổng giá</p>
                        <p style="font-weight: bold;" class="show-cart-subtotal"><?= !empty(($_SESSION['total_price'])) ? number_format(($_SESSION['total_price']), 0, ',', '.') : '0' ?>đ</p>
                    </div>
                    <div class="cart-summary-box">
                        <p>Số tiền đã giảm</p>
                        <p style="font-weight: bold; color:red" class="show-cart-subtotal"><?= !empty(($_SESSION['total_discount'])) ? number_format(($_SESSION['total_discount']), 0, ',', '.') : '0' ?>đ</p>
                    </div>
                    <div class="cart-summary-box">
                        <p>Tổng đơn hàng</p>
                        <p style="font-weight: bold;" class="show-cart-subtotal"><?= !empty(($_SESSION['subtotal'])) ? number_format(($_SESSION['subtotal']), 0, ',', '.') : '0' ?>đ</p>
                    </div>
                </div>
                <hr>
                <a href="/checkout" class="button-cart-primary checkout-btn-primary">THANH TOÁN</a>
            </div>
        </div>
    </div>
</section>