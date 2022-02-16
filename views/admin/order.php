<?php $this->title = 'Đơn hàng' ?>
<div class="col-12 col-lg-10 content-detail">
    <section class="product-content section-main">
        <div class="all-order">
            <h2 class="section-title">Đơn hàng / <span>Tất cả đơn hàng</span></h2>
            <div class="product-total-title">
                <div class="total-title-noti">
                    <strong>Tổng</strong>
                    <span><?= count($orders) ?></span>
                </div>
                <!-- <form>
                    <input type="text" placeholder="Tìm...">
                    <input type="submit" value="Tìm đơn hàng">
                </form> -->
            </div>
            <p class="text-danger order-alert"></p>
            <?php if (\app\core\Application::$app->session->getFlash('success')) :  ?>
                <p class="alert alert-success w-25 flash-success admin-order-success" role="alert"><?php echo \app\core\Application::$app->session->getFlash('success') ?></p>
            <?php endif; ?>
            <div class="table-responsive" style="background-color: #fff;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <!-- <th scope="col">
                                <input class="input-checkbox-primary" type="checkbox">
                            </th> -->
                            <th scope="col">Mã</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col" class="color-featured">Ngày đặt hàng</th>
                            <th scope="col" class="color-featured">Ngày thanh toán</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col" class="color-featured">Tổng</th>
                            <!-- <th scope="col">Thực thi</th> -->
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <!-- <th style="vertical-align: middle;" scope="row">
                                    <input class="input-checkbox-primary" type="checkbox">
                                </th> -->
                                <td class="product-total-name order-infor-primary">
                                    <span class="product-name">
                                        <?= $order->id ?>
                                    </span>
                                </td>
                                <td>
                                    <?= $order->customer->full_name ?>
                                </td>
                                <td style="color: #414141;">
                                    <span><?= date('d-m-Y', strtotime($order->created_at)) ?></span>
                                </td>
                                <td style="color: #414141;">
                                    <span class="paid-date-<?= $order->id ?>"><?= !empty($order->paid_date) ? date('d-m-Y', strtotime($order->paid_date)) : '' ?></span>
                                </td>
                                <td>
                                    <button class="btn btn-<?= $order->status['css'] ?>" style="color: #fff;" data-id="<?= $order->id ?>" data-toggle="modal" data-target="#edit-status-order"><?= $order->status['html'] ?></button>
                                </td>
                                <td>
                                    <strong><?= $order->totalPrice->price ?>đ</strong>
                                </td>
                                <!-- <td>
                                    <button title="Hủy đơn" class="fas fa-window-close btn-danger button-order-action-primary" data-toggle="modal" data-target="#cancelOrderModal"></button>
                                    <button title="hoàn thành" class="fas fa-check-square btn-success button-order-action-primary" data-toggle="modal" data-target="#submitOrderModal"></button>
                                </td> -->
                                <td>
                                    <span class="far fa-eye view-order-btn-primary view-order-detail mr-2" data-id="<?= $order->id ?>" data-toggle="modal" data-target="#view-order-detail"></span>
                                    <!-- <a href="/admin/order-detail?id=<?= $order->id ?>" class="far fa-eye view-order-btn-primary mr-2"></a> -->
                                    <button title="Xóa đơn" class="fas fa-window-close btn-danger button-order-action-primary" data-id="<?= $order->id ?>" data-toggle="modal" data-target="#delete-order"></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <!-- <div class="modal fade" id="submitOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Đơn Hàng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Đơn hàng đã hoàn thành?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary">Xác Nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="delete-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Xóa Đơn Hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn sẽ xóa các sản phẩm trong chi tiết đơn hàng
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit-delete-order">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-status-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhập tình trạng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Chọn tình trạng của đơn hàng?<br><br>
                <button type="button" class="btn btn-warning text-light data-status" data-status="1">Đang xử lí</button>
                <button type="button" class="btn btn-primary data-status" data-status="2">Đang giao</button>
                <button type="button" class="btn btn-success data-status" data-status="3">Thành công</button>
                <button type="button" class="btn btn-danger data-status" data-status="4">Đã hủy</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="view-order-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="order-detail-info">
        </div>
    </div>
</div>