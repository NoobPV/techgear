<?php $this->title = 'Danh mục' ?>
<div class="col-12 col-lg-10 content-detail">
    <section class="product-content section-main">
        <div class="all-cate">
            <h2 class="section-title">Danh mục / <span>Toàn bộ danh mục</span></h2>
            <div class="product-total-title">
                <div class="total-title-noti">
                    <strong>Tổng</strong><span> (<?= $totalCategory ?? '0' ?>)</span>
                </div>
                <div>
                    <a href="/admin/category/edit">Thêm danh mục</a>
                </div>
            </div>
            <p class="text-danger category-alert"></p>
            <?php if (\app\core\Application::$app->session->getFlash('success')) :  ?>
                <p class="alert alert-success w-25 flash-success" role="alert"><?php echo \app\core\Application::$app->session->getFlash('success') ?></p>
            <?php endif; ?>
            <form action="" method="POST" id="delete-multi-category-form">
                <div class="table-responsive" style="background-color: #fff;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input class="input-checkbox-primary" type="checkbox" id="select-all">
                                </th>
                                <th scope="col"><i class="far fa-image"></i></th>
                                <th scope="col" class="color-featured">Tên</th>
                                <th scope="col" class="color-featured">Mô tả</th>
                                <th scope="col" class="color-featured">Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <th style="vertical-align: middle;" scope="row">
                                        <input class="input-checkbox-primary" type="checkbox" name="deleteMultiId[]" value="<?= $category->id ?>">
                                    </th>
                                    <td class="product-total-img">
                                        <img class="" src="../../img/categories/<?= $category->image ?>" alt="" />
                                    </td>
                                    <td class="product-total-name">
                                        <span class="product-name"><?= $category->category_name ?></span>
                                        <div class="product-total-action">
                                            <span>ID: <?= $category->id ?></span>
                                            <a href="/admin/category/edit?id=<?= $category->id ?>" class="edit-product-primary edit-cate-btn">Chỉnh sửa <i class="fas fa-pencil-alt"></i></a>
                                            <span class="delete-product-primary" data-id="<?= $category->id ?>" data-toggle="modal" data-target="#delete-category">Xóa <i class="fas fa-trash-alt"></i></span>
                                        </div>
                                    </td>
                                    <td><?= $category->description ?></td>
                                    <td style="color: #414141;">
                                        <span><?= date('d-m-Y', strtotime($category->created_at)) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <!-- <td colspan="100">
                                    <button class="btn btn-danger">Xóa</button>
                                </td> -->
                                <td colspan="1">
                                    <a class="btn btn-danger text-light" data-toggle="modal" data-target="#delete-multi-category">Xóa</a>
                                </td>
                            </tr>
                            <!-- <tr class="edit-cate-item">
                            <td colspan="100">
                                <div class="row edit-product-form">
                                    <div class="col-12 col-md-12">
                                        <h3>Chỉnh sửa danh mục</h3>
                                        <div class="edit-product-infor">
                                            <label><i>Mã</i></label>
                                            <input type="text">
                                        </div>
                                        <div class="edit-product-infor">
                                            <label><i>Tên</i></label>
                                            <input type="text">
                                        </div>
                                        <div class="edit-product-infor">
                                            <label><i>Mô tả</i></label>
                                            <textarea name="description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFileSm" class=""><i>Hình</i></label>
                                            <input class="" id="" type="file" onchange="openFile(event)">
                                            <img id="output" style="width: 200px; margin: 10px 0; border: 1px solid #c7c7c7;" src="../../public/img/products/product-1.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div class="edit-product-btn-primary">
                                        <button class="btn btn-secondary cancel-edit-cate-btn">Hủy bỏ</button>
                                        <button class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </td>
                        </tr> -->
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <!-- <div class="add-cate">
            <h2 class="section-title">Danh mục / <span>Thêm danh mục</span></h2>
            <div class="row add-cate-item">
                <div class="col-12 col-md-12 add-cate-data toggle-menu-cate-btn">
                    <div class="add-cate-data-title ">
                        <h4>Dữ liệu danh mục</h4>
                        <i class="fas fa-chevron-down icon-cate-data"></i>
                        <i class="fas fa-chevron-up icon-cate-data icon-up"></i>
                    </div>
                </div>
                <table class="table menu-cate">
                    <tbody>
                        <tr>
                            <th scope="row"><i>Mã danh mục:</i></th>
                            <td>
                                <input type="text" name="cateCode" placeholder="..." class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><i>Tên danh mục:</i></th>
                            <td>
                                <input type="text" name="cateName" placeholder="..." class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><i>Mô tả:</i></th>
                            <td>
                                <textarea name="cateDescription" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><i>Hình ảnh:</i></th>
                            <td>
                                <input type="file" class="form-control" onchange="openFile2(event)">
                                <img id="output-2" style="border: 1px solid #c7c7c7; margin-top: 10px; max-width: 100%; width: 300px; height: 200px;" src="" alt="chưa chọn hình ảnh chính" />
                            </td>
                        </tr>
                    <tbody>
                </table>
                <div class="menu-cate" style="margin: 10px 20px 10px 0; text-align: right; width: 100%;">
                    <button class="btn btn-primary">Xác Nhận</button>
                </div>
            </div>
        </div> -->
    </section>
</div>
<div class="modal fade" id="delete-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa danh mục sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn chắc chắn muốn xóa danh mục này?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit-delete-category">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete-multi-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn chắc chắn muốn xóa danh mục này?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit-delete-multi-category">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>