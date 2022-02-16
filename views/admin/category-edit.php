<?php $this->title = 'Sửa danh mục' ?>
<div class="col-12 col-lg-10 content-detail">
    <section class="product-content section-main">
        <!-- <div class="add-cate"> -->
        <?php if (\app\core\Application::$app->session->getFlash('editCategorySuccess')) :  ?>
            <div class="alert alert-success w-25" role="alert"><?php echo \app\core\Application::$app->session->getFlash('editCategorySuccess') ?></div>
            <div class="clearfix"></div>
        <?php endif; ?>
        <h2 class="section-title">Danh mục / <span>Thêm danh mục</span></h2>
        <?php if (isset($errors)) : ?>
            <hr>
            <?php foreach (($errors) as $error) : ?>
                <div class="text-danger"><?= $error ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
        <form action="" method="POST" enctype="multipart/form-data" id="edit-category-admin" onsubmit="return validateEditCategory()">
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
                            <th scope="row"><i>Tên danh mục:</i></th>
                            <td>
                                <input type="hidden" name="id" value="<?= $category->id ?? '' ?>">
                                <input type="text" name="category_name" class="form-control" value="<?= $category->category_name ?? '' ?>">
                                <p style="color: red; margin-bottom: -5px" class="category-error-name"></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><i>Mô tả:</i></th>
                            <td>
                                <textarea name="description" class="form-control"><?= $category->description ?? '' ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><i>Hình ảnh:</i></th>
                            <td>
                                <input type="file" class="form-control" onchange="openFile2(event)" name="image" <?php echo (isset($category->image)) ? '' : 'required' ?>>
                                <input type="hidden" name="image" value="<?= $category->image ?? '' ?>">
                                <?php if (isset($category)) : ?>
                                    <img class="" id="output-2" style="border: 1px solid #c7c7c7; margin-top: 10px; max-width: 100%; width: 300px; height: 200px;" src="../../img/categories/<?= $category->image ?>" alt="chưa chọn hình ảnh chính" />
                                <?php else : ?>
                                    <img class="" id="output-2" style="border: 1px solid #c7c7c7; margin-top: 10px; max-width: 100%; width: 300px; height: 200px;" src="" alt="chưa chọn hình ảnh chính" />
                                <?php endif; ?>
                                <p style="color: red; margin-bottom: -5px" class="edit-category-error"></p>
                            </td>
                        </tr>
                    <tbody>
                </table>

                <div class="menu-cate" style="margin: 10px 20px 10px 0; text-align: right; width: 100%;">
                    <button class="btn btn-primary">Xác Nhận</button>
                </div>
                <!-- </div> -->
            </div>
        </form>
    </section>
</div>