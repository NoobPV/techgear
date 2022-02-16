<?php $this->title = 'Đánh giá' ?>
<div class="col-12 col-lg-10 content-detail">
    <section class="product-content section-main">
        <div class="all-order">
            <h2 class="section-title">Đánh giá / <span>Tất cả đánh giá</span></h2>
            <div class="product-total-title">
                <div class="total-title-noti">
                    <span><strong>Tổng</strong>(<?= count($reviews) ?>) </span>
                    <span>Đang hiển thị </span>(<span class="review-total-show"><?= $totalShow ?></span>)
                </div>
                <!-- <form>
                    <input type="text" placeholder="Tìm...">
                    <input type="submit" value="Tìm tên">
                </form> -->
            </div>
            <p class="text-danger comment-alert"></p>
            <?php if (\app\core\Application::$app->session->getFlash('reviewSuccess')) :  ?>
                <p class="alert alert-success w-25 flash-success admin-review-success" role="alert"><?php echo \app\core\Application::$app->session->getFlash('reviewSuccess') ?></p>
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
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Đánh giá</th>
                            <th scope="col" class="color-featured">Ngày tạo</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reviews as $review) : ?>
                            <tr>
                                <!-- <th style="vertical-align: middle;" scope="row">
                                    <input class="input-checkbox-primary" type="checkbox">
                                </th> -->
                                <td>
                                    #<?= $review->id ?>
                                </td>

                                <td class="product-total-name order-infor-primary">
                                    <span class="product-name">
                                        <?= $review->customer->full_name ?>
                                    </span>
                                </td>

                                <td>
                                    <strong class="color-featured"><?= $review->product->product_name ?></strong>
                                </td>
                                <td>
                                    <button class="btn btn-<?= $review->editStatus['css'] ?>" style="color: #fff;" data-id="<?= $review->id ?>" data-status="<?= $review->editStatus['number'] ?>" data-toggle="modal" data-target="#edit-status-review"><?= $review->editStatus['html'] ?></button>
                                </td>
                                <td>
                                    <div class="stars-outer">
                                        <div class="stars-inner" style="width: <?= $review->rating * 20 ?>%"></div>
                                    </div>
                                </td>
                                <td style="color: #414141;">
                                    <span><?= date('d-m-Y', strtotime($review->created_at)) ?></span>
                                </td>
                                <td>
                                    <span class="far fa-eye view-order-btn-primary mr-2" data-id="<?= $review->id ?>" data-toggle="modal" data-target="#view-comment-review"></span>
                                    <button title="Xóa bình luận" class="fas fa-window-close btn-danger button-order-action-primary" data-id="<?= $review->id ?>" data-toggle="modal" data-target="#delete-review"></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="edit-status-review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Trạng thái bình luận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có muốn chuyển trạng thái bình luận
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit-edit-status-review">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="view-comment-review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Nội dung bình luận</h5>
            </div>
            <div class="modal-body order-detail-infor">
                <p id="review-comment"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete-review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Xóa Bình luận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn sẽ xóa bình luận này?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit-delete-review">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>