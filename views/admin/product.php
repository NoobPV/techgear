<?php $this->title = 'Sản phẩm' ?>
<div class="col-12 col-lg-10 content-detail">
    <section class="product-content section-main">
        <div class="all-product">
            <h2 class="section-title">Sản phẩm / <span>Toàn bộ sản phẩm</span></h2>
            <div class="product-total-title">
                <div class="total-title-noti">
                    <span><strong>Tổng</strong> (<?= $total ?>)</span>
                    <span>Đang bán </span>(<span class="totalStocking"><?= $totalStocking ?></span>)
                </div>
                <!-- <form>
                    <input type="text" placeholder="Tìm....">
                    <input type="submit" value="Tìm sản phẩm">
                </form> -->
            </div>
            <p class="alert-product text-danger"></p>
            <?php if (\app\core\Application::$app->session->getFlash('productSuccess')) :  ?>
                <p class="alert alert-success w-25 admin-product-success" role="alert"><?php echo \app\core\Application::$app->session->getFlash('productSuccess') ?></p>
            <?php endif; ?>
            <form action="" method="POST" id="delete-multi-product-form">
                <div class="table-responsive" style="background-color: #fff;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input class="input-checkbox-primary" type="checkbox" id="select-all">
                                </th>
                                <th scope="col"><i class="far fa-image"></i></th>
                                <th scope="col" class="color-featured">Tên</th>
                                <th scope="col" class="color-featured">SKU</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col" class="color-featured">Giá</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col" class="color-featured">Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td style="vertical-align: middle;" scope="row">
                                        <input class="input-checkbox-primary" type="checkbox" name="deleteMultiId[]" value="<?= $product->id ?? '' ?>">
                                    </td>
                                    <td class="product-total-img">
                                        <img src="/img/products/<?= $product->image ?>" alt="" />
                                    </td>
                                    <td class="product-total-name">
                                        <span class="product-name"><?= $product->product_name ?></span>
                                        <div class="product-total-action">
                                            <span>ID: <?= $product->id ?></span>
                                            <a href="/admin/product/edit?id=<?= $product->id ?>" class="edit-product-primary edit-product-btn">Chỉnh sửa <i class="fas fa-pencil-alt"></i></a>
                                            <span id="test-form" class="delete-product-primary" data-id="<?= $product->id ?>" data-toggle="modal" data-target="#delete-product">Xóa<i class="fas fa-trash-alt"></i></span>
                                        </div>
                                    </td>
                                    <td><?= $product->product_code ?></td>
                                    <td class="product-stock">
                                        <span class="btn btn-<?= $product->status['css'] ?>" data-id="<?= $product->id ?>" data-status="<?= $product->status['number'] ?>" data-toggle="modal" data-target="#edit-status-product"><?= $product->status['html'] ?></span>
                                    </td>
                                    <td><?= $product->list_price ?>đ</td>
                                    <td class="color-featured" style="font-weight: bold;"><?= $product->category->category_name ?></td>
                                    <td style="color: #414141;">
                                        <span><?= date('d-m-Y', strtotime($product->created_at)) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2">
                                    <a class="btn btn-danger text-light" data-toggle="modal" data-target="#delete-multi-product">Xóa</a>
                                </td>
                                <td colspan="6">
                                    <div class="page-list" class="text-align-end">
                                        <?php $numPages = ceil($amountProducts / 5);
                                        for ($i = 1; $i <= $numPages; $i++) : if ($i == $currentPage) : ?>
                                                <a class="currentpage" href="/admin/product?page=<?= $i ?>"><?= $i ?></a>
                                            <?php else : ?>
                                                <a href="/admin/product?page=<?= $i ?>"><?= $i ?></a>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </section>
</div>
<div class="modal fade" id="edit-status-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tình trạng sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có muốn chuyển tình trạng sản phẩm
            </div>
            <p class="abc"></p>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit-edit-status-product">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn chắc chắn muốn xóa sản phẩm này?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit-delete-product">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete-multi-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn chắc chắn muốn xóa những sản phẩm này?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit-delete-multi-product">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>