<?php $this->title = 'Chi tiết đơn hàng' ?>
<div class="col-12 col-lg-10 content-detail">
    <section class="product-content section-main">
        <div class="all-order">
            <div class="order-detail">
                <h5>Order #<?= $order->id ?></h5>
                <span class="btn btn-<?= $status['css'] ?>" style="color: #fff;"><?= $status['html'] ?></span>
            </div>

            <div class="order-detail-infor-div"><strong>Địa chỉ: </strong><span><?= $order->ship_address ?></span></div>
            <div class="order-detail-infor-div"><strong>Email: </strong><span class="infor-line"><?= $customer->email ?></span></div>
            <div class="order-detail-infor-div"><strong>Số điện thoại: </strong><span class="infor-line"><?= $customer->phone ?></span></div>
            <div class="order-detail-infor-div"><strong>Giới tính: </strong><span><?= $gender['html'] ?></span></div>
            <div class="order-detail-infor-div"><strong>Ngày giao hàng: </strong><span><?= (isset($order->created_at)) ? date('d-m-Y', strtotime($order->created_at)) : '' ?></span></div>
            <div class="order-detail-infor-div"><strong>Ngày thanh toán: </strong><span><?= (isset($order->paid_date)) ? date('d-m-Y', strtotime($order->paid_date)) : '' ?></span></div>
            <table class="table" style="overflow-y: scroll; height: 400px;">
                <thead>
                    <tr>
                        <th scope="col">Mã</th>
                        <th scope="col">
                            <i class="far fa-image"></i>
                        </th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Tổng giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    ?>
                    <?php foreach ($orderDetails as $orderDetail) : ?>
                        <tr>
                            <th><?= $orderDetail->id ?></th>
                            <th scope="row">
                                <img style="width: 70px;" class="" src="../../img/products/<?= $orderDetail->product->image ?>" alt="" />
                            </th>
                            <td style="text-transform: capitalize; font-weight: bold;" class="color-featured">
                                <?= $orderDetail->product->product_name ?>
                            </td>
                            <td>
                                <?= $orderDetail->quantity ?>
                            </td>
                            <td><?= number_format($orderDetail->unit_price, 0, ',', '.'); ?>đ</td>
                            <td>
                                <strong><?= number_format($orderDetail->unit_price * $orderDetail->quantity, 0, ',', '.') ?>đ</strong>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/order">Quay về</a>
        </div>
    </section>
</div>