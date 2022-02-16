<?php $this->title = 'Sửa sản phẩm' ?>
<div class="col-12 col-lg-10 content-detail">
    <section class="product-content section-main">
        <form action="" method="POST" enctype="multipart/form-data" id="edit-product-admin" onsubmit="return validateEditProduct()">
            <?php if (\app\core\Application::$app->session->getFlash('editProductSuccess')) :  ?>
                <div class="alert alert-success w-25" role="alert"><?php echo \app\core\Application::$app->session->getFlash('editProductSuccess') ?></div>
                <div class="clearfix"></div>
            <?php endif; ?>
            <div class="row add-product-item">
                <div class="col-12 col-md-8 add-product-data">
                    <div class="add-product-data-title toggle-menu-infor-btn">
                        <h4>Dữ liệu sản phẩm</h4>
                        <i class="fas fa-chevron-down icon-product-data"></i>
                        <i class="fas fa-chevron-up icon-product-data icon-up"></i>
                    </div>
                    <input type="hidden" name="id" value="<?= $product->id ?? '' ?>">
                    <div class="add-product-infor toggle-menu-infor">
                        <label for="">Mã sản phẩm</label>
                        <input type="text" class="form-control" name="product_code" value="<?= $product->product_code ?? '' ?>" required>
                    </div>
                    <p class="product-error-sku" style="font-size: 14px; margin: 5px 0 0; color:red"></p>
                    <hr>
                    <div class="add-product-infor toggle-menu-infor">
                        <label for="productName">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="product_name" value="<?= $product->product_name ?? '' ?>" required>
                    </div>
                    <p class="product-error-product_name" style="font-size: 14px; margin: 5px 0 0; color:red"></p>
                    <hr>
                    <div class="add-product-infor toggle-menu-infor">
                        <label for="productPrice">Giá bán sản phẩm</label>
                        <input type="number" class="form-control" name="list_price" value="<?= $product->list_price ?? '' ?>" required min='0'>
                    </div>
                    <p class="product-error-list_price" style="font-size: 14px; margin: 5px 0 0; color:red"></p>
                    <hr>
                    <div class="add-product-infor toggle-menu-infor">
                        <label for="productStandard">Chi phí định mức</label>
                        <input type="number" class="form-control" name="standard_cost" value="<?= $product->standard_cost ?? '' ?>" required min='0'>
                    </div>
                    <p class="product-error-standard_cost" style="font-size: 14px; margin: 5px 0 0; color:red"></p>
                    <hr>
                    <div class="add-product-infor toggle-menu-infor">
                        <label for="productName">Mô tả</label>
                        <textarea class="form-control" name="description"><?= $product->description ?? '' ?></textarea>
                    </div>
                    <hr>
                    <div class="add-product-infor toggle-menu-infor">
                        <label for="productImg">Hình ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control" onchange="openFile(event)" <?php echo (isset($product->image)) ? '' : 'required' ?>>
                        <input type="hidden" name="image" value="<?= $product->image ?? '' ?>">
                        <?php if (isset($product)) : ?>
                            <img id="output" class="" src="../../img/products/<?= $product->image ?>" style="border: 1px solid #c7c7c7; margin-top: 10px; max-width: 100%; width: 200px; height: 200px;" />
                        <?php else : ?>
                            <img id="output" class="" style="border: 1px solid #c7c7c7; margin-top: 10px; max-width: 100%; width: 200px; height: 200px;" src="" alt="chưa chọn hình ảnh chính" />
                        <?php endif; ?>
                    </div>
                    <p class="product-error-image" style="font-size: 14px; margin: 5px 0 0; color:red"></p>
                    <hr>
                    <div class="add-product-infor toggle-menu-infor">
                        <label for="productImg">Hình ảnh chi tiết sản phẩm</label>
                        <input multiple="" type="file" class="form-control" id="gallery-photo-add" name="imageDetails[]">
                        <?php if ($imageDetails) : ?>
                            <div class="gallery"></div>
                            <p class="my-2">Chọn ảnh cần xóa</p>
                            <?php foreach ($imageDetails as $imageDetail) : ?>
                                <input type="checkbox" name="deleteIdImages[]" value="<?= $imageDetail->id ?>">
                                <img class="" src="../../img/products-detail/<?= $imageDetail->image ?>" style="width: 200px" />
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="gallery"></div>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="col-12 col-md-4 add-product-properties">
                    <div class="add-product-status add-product-cover-common">
                        <div class="add-product-status-title add-product-cover-common-title status-publish-btn">
                            <h4>Tình trạng sản phẩm</h4>
                            <i class="fas fa-chevron-down icon-publish"></i>
                            <i class="fas fa-chevron-up icon-publish icon-up"></i>
                        </div>
                        <div class="add-product-status-publish">
                            <div>
                                <input type="radio" name="status" value="1" <?= isset($product->status) && $product->status == 1 ? 'checked' : '' ?>>
                                <span class="color-featured">Còn hàng</span>
                            </div><br>
                            <div>
                                <input type="radio" name="status" value="0" <?= isset($product->status) &&  $product->status == 0 ? 'checked' : '' ?>>
                                <span class="color-featured">Hết hàng</span>
                            </div>
                        </div>
                    </div>
                    <div class="add-product-status add-product-cover-common">
                        <div class="add-product-status-title add-product-cover-common-title status-publish-btn">
                            <h4>Trạng thái sản phẩm</h4>
                            <i class="fas fa-chevron-down icon-publish"></i>
                            <i class="fas fa-chevron-up icon-publish icon-up"></i>
                        </div>

                        <div class="add-product-status-publish">
                            <div>
                                <input class="" type="checkbox" name="is_new" id="exampleRadios2" value="1" <?= isset($product->is_new) &&  $product->is_new == 1 ? 'checked' : '' ?>>
                                <span class="color-featured">Sản phẩm mới</span>
                            </div>
                        </div>
                    </div>
                    <div class="add-product-cate add-product-cover-common">
                        <div class="add-product-status-title add-product-cover-common-title toggle-cate-btn">
                            <h4>Danh mục</h4>
                            <i class="fas fa-chevron-down icon-cate"></i>
                            <i class="fas fa-chevron-up icon-cate icon-up"></i>
                        </div>
                        <div action="" class="add-product-cate-form">
                            <?php foreach (\app\controllers\MainController::$ctrl->allCategory() as $category) : ?>
                                <input type="radio" class="input-checkbox-primary" name="category_id" value="<?= $category->id ?>" <?php echo (isset($product) && $product->category_id == $category->id) ? 'checked' : ''  ?> required>
                                <label for=""><?= $category->category_name ?></label><br>
                            <?php endforeach; ?>
                            <p class="product-error-category" style="font-size: 14px; margin: 5px 0 0; color:red"></p>
                        </div>
                    </div>
                </div>
                <p class="edit-product-error" style="font-size: 14px; margin: 5px 15px 0; color:red"></p>
                <div style="margin: 10px 20px 10px 0; text-align: right; width: 100%;">
                    <input type="submit" class="btn btn-primary" value="Xác nhận">
                </div>
                <!-- </div> -->
            </div>
        </form>
    </section>
</div>