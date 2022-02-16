<?php $this->title = 'Sản phẩm' ?>
<section class="">
    <div class="filter-header">
        <a href="/">Trang chủ</a>
        <i class="fas fa-chevron-right"></i>
        <span class="filter-header-category"><?= $categoryName ?></span>
    </div>
    <div class="toggle-menu-shop-btn-primary toggle-menu-shop-btn">
        <i class="fas fa-sliders-h"></i>
    </div>
    <div class="row">
        <aside class="col-xl-3 filter">
            <div class="filter-cover">
                <div class="filter-title">
                    Tùy chọn mua sắm
                    <button class="close-menu-shop-btn-primary close-menu-shop-btn">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="filter-item">
                    <div class="filter-item-title item-category-btn">
                        Danh mục
                        <div>
                            <i class="fas fa-chevron-down icon-menu-product-list"></i>
                            <i class="fas fa-chevron-up icon-menu-product-list  icon-menu-product-list-up"></i>
                        </div>
                    </div>
                    <ul class="filter-item-content item-category-list">
                        <li><a href="/product-list">Tất cả sản phẩm</a></li>
                        <li><a href="/new-product-list">Sản phẩm mới</a></li>
                        <li><a href="/top-product-list">Sản phẩm bán chạy</a></li>
                        <?php foreach (\app\controllers\MainController::$ctrl->allCategory() as $category) : ?>
                            <li><a href="/product-list?category=<?= $category->id ?>"><?= $category->category_name ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- <div class="filter-item">
                    <div class="filter-item-title item-price-btn">
                        Giá
                        <div>
                            <i class="fas fa-chevron-down icon-menu-product-list"></i>
                            <i class="fas fa-chevron-up icon-menu-product-list  icon-menu-product-list-up"></i>
                        </div>
                    </div>
                    <ul class="filter-item-content item-price-list">
                        <li><a href="#">$0.00 - $99.99</a></li>
                        <li><a href="#">$0.00 - $99.99</a></li>
                        <li><a href="#">$0.00 - $99.99</a></li>
                    </ul>
                </div>
                <div class="filter-item">
                    <div class="filter-item-title item-brand-btn">
                        Thương hiệu sản phẩm
                        <div>
                            <i class="fas fa-chevron-down icon-menu-product-list"></i>
                            <i class="fas fa-chevron-up icon-menu-product-list  icon-menu-product-list-up"></i>
                        </div>
                    </div>
                    <ul class="filter-item-content item-brand-list">
                        <li><a href="#">Iphone</a></li>
                        <li><a href="#">Iphone</a></li>
                        <li><a href="#">Iphone</a></li>
                    </ul>
                </div> -->
            </div>
        </aside>
        <article class="col-lg-12 col-xl-9 product-list-container">
            <nav class="row product-box">
                <div class="product-list-container-grid-primary">
                    <button class="grid-list-col-btn"><i class="fas fa-th-large grid-list-col"></i></button>
                    <button class="grid-list-col-md-btn"><i class="fas fa-th grid-list-col-md"></i></button>
                    <button class="grid-list-col-lg-btn">
                        <i class="fas fa-grip-vertical grid-list-col-lg actived-grid-color"></i>
                        <i class="fas fa-grip-vertical grid-list-col-lg actived-grid-color"></i>
                    </button>
                    <span>Sản phẩm 1-12 of 22</span>
                </div>
                <ul class="product-list-layout layout-list">
                    <?php foreach ($products as $product) : ?>
                        <li class="col-12 col-sm-4 col-md-3 col-lg-2 col-xl-3 product-box-items grid-list-action">
                            <div class="product-box-items-cover">
                                <div class="product-event">
                                    <?php echo  isset($product->discount_amount) ? "<span class='product-sales'> - {$product->discount_amount}% </span>" : '' ?>
                                    <?php echo $product->is_new ? '<span class="product-event-new"> new </span>' : '' ?>
                                </div>
                                <a href="/product-detail?id=<?= $product->id ?>" class="product-img">
                                    <img data-src="../img/products/<?= $product->image ?>" class="product-image lazy-load" alt="" />
                                </a>
                                <div class="product-content">
                                    <a href="/product-detail?id=<?= $product->id ?>" class="product-name"><?= $product->product_name ?></a>
                                    <div class="product-review">
                                        <div class="stars-outer">
                                            <div class="stars-inner" style="width: <?= $product->ratings['avgRating']   ?>%"></div>
                                        </div>
                                        <span class="number-rating"></span>
                                        <a href="#">(<?= $product->ratings['amountRating'] ?>)</a>
                                    </div>
                                    <?php if (isset($product->discount_price)) : ?>
                                        <div style="display: inline-block;" class="product-price featured-price color-sales text-danger"><?= $product->discount_price ?>đ</div>
                                        <del style="display: inline; margin-left: 2px; color: #666;"><?= $product->list_price ?>đ</del>
                                    <?php else : ?>
                                        <div class="product-price"><?= $product->list_price ?>đ</div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-action-items">
                                    <div class="product-add-cart-item">
                                        <span class="product-btn btn product-add-cart-alert" data-id="<?= $product->id ?>"><strong>THÊM VÀO GIỎ</strong></span>
                                    </div>
                                    <div class="product-view-item">
                                        <a class="view-product-detail-primary" href="#" title="view product"><i class="far fa-eye"></i></a>
                                        <a class="add-wish-primary" href="#" title="add wish list"><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="page-list">
                    <?php
                    if (!empty($products)) {
                        if (isset($isTopProduct)) {
                            $numPages = ceil($amountProducts / 12);
                            for ($i = 1; $i <= $numPages; $i++) {
                                if ($i == $currentPage)
                                    echo "<a class='currentpage' href='/top-product-list?page=$i'>$i</a>";
                                else {
                                    echo "<a href='/top-product-list?page=$i'>$i</a>";
                                }
                            }
                        } elseif (isset($isNewProduct)) {
                            $numPages = ceil($amountProducts / 12);
                            for ($i = 1; $i <= $numPages; $i++) {
                                if ($i == $currentPage)
                                    echo "<a class='currentpage' href='/new-product-list?page=$i'>$i</a>";
                                else {
                                    echo "<a href='/new-product-list?page=$i'>$i</a>";
                                }
                            }
                        } elseif (!empty($isSearchProduct)) {
                            $numPages = ceil($amountProducts / 12);
                            for ($i = 1; $i <= $numPages; $i++) {
                                if ($i == $currentPage)
                                    echo "<a class='currentpage' href='/search-product?page=$i" . (!empty($categoryId) ? '&category=' . $categoryId : '') . (!empty($key) ? '&key=' . $key : '') . "'> $i </a>";
                                else
                                    echo  "<a href='/search-product?page=$i" . (!empty($categoryId) ? '&category=' . $categoryId : '') . (!empty($key) ? '&key=' . $key : '') . "'> $i </a>";
                            }
                        } else {
                            $numPages = ceil($amountProducts / 12);
                            for ($i = 1; $i <= $numPages; $i++) {
                                if ($i == $currentPage)
                                    echo  "<a class='currentpage' href='/product-list?page=$i" . (!empty($categoryId) ? '&category=' . $categoryId : '') . "'> $i </a>";
                                else
                                    echo "<a href='/product-list?page=$i" . (!empty($categoryId) ? '&category=' . $categoryId : '') . "'>$i</a>";
                            }
                        }
                    }
                    ?>
                </div>
            </nav>
        </article>
    </div>
</section>