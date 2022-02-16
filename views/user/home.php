<?php $this->title = 'Trang chủ';

use app\controllers\MainController;
use app\core\Application; ?>
<?php if (Application::$app->session->getFlash('success')) :  ?>
    <div class="alert alert-success float-right w-25" role="alert" style="font-size: 18px; font-weight: 600;"><?php echo Application::$app->session->getFlash('success') ?></div>
    <div class="clearfix"></div>
<?php endif; ?>
<?php if (Application::$app->session->getFlash('fail')) :  ?>
    <div class="alert alert-danger float-right w-25" role="alert"><?php echo Application::$app->session->getFlash('fail') ?></div>
    <div class="clearfix"></div>
<?php endif; ?>
<section class="banner-section">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-7 banner-main">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="lazy-load" data-src="../img/banner/slide-home3.png" alt="" />
                        <div class="carousel-caption d-none d-md-block content-slide-banner-primary">
                            <h3>
                                <a href="/product-list?category=3" class="link">Phiên bản thể thao<br />Sự lựa chọn tốt nhất cho bạn</a>
                            </h3>
                            <p class="desc">Kết nối không dây với điện thoại, máy tính...</p>
                            <a href="/product-list?category=3" class="submit-banner-btn-primary">Khám phá ngay</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="lazy-load" data-src="../img/banner/slide-home1.png" alt="" />
                        <div class="carousel-caption d-none d-md-block content-slide-banner-primary">
                            <h3>
                                <a href="/product-list?category=4" class="link">Tai nghe Gaming<br />Hiệu ứng ánh sáng tuyệt đỉnh</a>
                            </h3>
                            <p class="desc">Kết nối không dây với điện thoại, Laptop...</p>
                            <a href="/product-list?category=4" class="submit-banner-btn-primary">Khám phá ngay</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="lazy-load" data-src="../img/banner/slide-home2.png" alt="" />
                        <div class="carousel-caption d-none d-md-block content-slide-banner-primary">
                            <h3>
                                <a href="/product-list?category=5" class="link">Phiên bản thể thao <br />Sự lựa chọn tốt nhất cho bạn</a>
                            </h3>
                            <p class="desc">Kết nối không dây với điện thoại, Laptop...</p>
                            <a href="/product-list?category=5" class="submit-banner-btn-primary">Khám phá ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-5 banner-child-responsive">
            <div class="row">
                <div class="col-lg-6 banner-box-child">
                    <img class="lazy-load" data-src="../img/banner/banner1.png" alt="" />
                    <div class="banner-box-child-absolute">
                        <h3>
                            <a href="/product-list?category=4" class="link">Canyon <br />Star Raider</a>
                        </h3>
                        <p class="desc">Thiết bị âm thanh</p>
                    </div>
                </div>
                <div class="col-lg-6 banner-box-child">
                    <img class="lazy-load" data-src="../img/banner/banner2.png" alt="" />
                    <div class="banner-box-child-absolute">
                        <h3>
                            <a href="/product-list?category=1" class="link">Điện thoại <br />Galaxy S20</a>
                        </h3>
                        <p class="desc">Điện thoại di động</p>
                    </div>
                </div>
                <div class="col-lg-6 banner-box-child" style="margin-top: 30px;">
                    <img class="lazy-load" data-src="../img/banner/banner3.png" alt="" />
                    <div class="banner-box-child-absolute">
                        <h3>
                            <a href="/product-list?category=4" class="link">Galaxy <br />Buds Plus</a>
                        </h3>
                        <p class="desc">Tai nghe không dây</p>
                    </div>
                </div>
                <div class="col-lg-6 banner-box-child" style="margin-top: 30px;">
                    <img class="lazy-load style-img-fixed" data-src="../img/banner/banner4.png" alt="" />
                    <div class="banner-box-child-absolute">
                        <h3>
                            <a href="/product-list?category=3" class="link">Máy ảnh <br />Alpha Sony</a>
                        </h3>
                        <p class="desc">Máy ảnh</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="trending section-main">
    <div class="section-header title-product">
        <h3>Sản phẩm thịnh hành</h3>
        <a href="/new-product-list">Xem tất cả <i class="fas fa-chevron-right"></i></a>
    </div>
    <nav class="container-fluid product-box">
        <ul class="row">
            <?php foreach ($trendProducts as $trendProduct) : ?>
                <li class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2 product-box-items">
                    <div class="product-box-items-cover">
                        <div class="product-event">
                            <?= isset($trendProduct->discount_amount) ? "<span class='product-sales'> - {$trendProduct->discount_amount}% </span>" : '' ?>
                            <?= $trendProduct->is_new ? '<span class="product-event-new">mới</span>' : '' ?>
                        </div>
                        <a href="/product-detail?id=<?= $trendProduct->id ?>" class="product-img">
                            <img data-src="../img/products/<?= $trendProduct->image ?>" class="product-image lazy-load" alt="" />
                        </a>
                        <div class="product-content">
                            <a href="/product-detail?id=<?= $trendProduct->id ?>" class="product-name"><?= $trendProduct->product_name ?></a>
                            <div class="product-review">
                                <div class="stars-outer">
                                    <div class="stars-inner" style="width: <?= $trendProduct->ratings['avgRating']   ?>%"></div>
                                </div>
                                <a class="number-rating">(<?= $trendProduct->ratings['amountRating'] ?>)</a>
                            </div>
                            <?php if (isset($trendProduct->discount_price)) : ?>
                                <div style="display: inline-block;" class="product-price featured-price color-sales text-danger"><?= $trendProduct->discount_price ?>đ</div>
                                <del class="product-discount-price"><?= ($trendProduct->list_price) ?>đ</del>
                            <?php else : ?>
                                <div class="product-price"><?= ($trendProduct->list_price) ?>đ</div>
                            <?php endif; ?>
                        </div>
                        <div class="product-action-items">
                            <div class="product-add-cart-item">
                                <span class="product-btn btn product-add-cart-alert" data-id="<?= $trendProduct->id ?>"><strong>Thêm vào giỏ</strong></span>
                            </div>
                            <div class="product-view-item">
                                <a class="view-product-detail-primary" href="/product-detail?id=<?= $trendProduct->id ?>" title="Xem sản phẩm"><i class="far fa-eye"></i></a>
                                <a class="add-wish-primary" href="#" title="Thêm vào yêu thích"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</section>
<section class="category section-main">
    <div class="section-header title-product">
        <h3>Danh mục phổ biến</h3>
        <a href="/product-list">Xem tất cả <i class="fas fa-chevron-right"></i></a>
    </div>
    <div class="category-layout layout">
        <a class="category-box" href="/product-list?category=3">
            <img data-src="../img/categories/category-3.jpg" alt="" class="lazy-load" />
            <div class="category-box-infor">
                <span class="category-name">Máy ảnh</span>
                <div class="category-search">Tìm kiếm ngay</div>
            </div>
        </a>
        <a class="category-box category-box-responsive-child-0" href="/product-list?category=2">
            <img data-src="../img/categories/category-2.jpg" alt="" class="lazy-load" />
            <div class="category-box-infor">
                <span class="category-name">Latop</span>
                <div class="category-search">Tìm kiếm ngay</div>
            </div>
        </a>
        <a class="category-box category-box-responsive-child-1" href="/product-list?category=4">
            <img data-src="../img/categories/category-4.jpg" alt="" class="lazy-load" />
            <div class="category-box-infor">
                <span class="category-name">Tai nghe</span>
                <div class="category-search">Tìm kiếm ngay</div>
            </div>
        </a>
        <a class="category-box category-box-responsive-child-2" href="/product-list?category=1">
            <img data-src="../img/categories/category-1.jpg" alt="" class="lazy-load" />
            <div class="category-box-infor">
                <span class="category-name">Điện thoại di động</span>
                <div class="category-search">Tìm kiếm ngay</div>
            </div>
        </a>
        <a class="category-box category-box-responsive-child-3" href="/product-list?category=5">
            <img data-src="../img/categories/category-5.png" alt="" class="lazy-load" />
            <div class="category-box-infor">
                <span class="category-name">Phụ kiện</span>
                <div class="category-search">Tìm kiếm ngay</div>
            </div>
        </a>
    </div>
</section>
<?php if (!empty($discountProducts)) : ?>
    <section class="deal section-main">
        <div class="section-header deal-header title-product">
            <h3>Giảm giá sốc</h3>
            <div class="deal-countdown">
                <strong style="letter-spacing: 0.5px;">Nhanh lên! Ưu đãi kết thúc sau: </strong>
                <div style="letter-spacing: 0.5px;" id="countdown" class="timer"></div>
            </div>
        </div>
        <div class="deal-layout layout">
            <?php foreach ($discountProducts as $discountProduct) : ?>
                <?php if (!empty($discountProduct->flashDealProducts)) :  ?>
                    <div class="deal-product">
                        <div class="product-event">
                            <?= isset($discountProduct->discount_amount) ? "<span class='product-sales'> - {$discountProduct->discount_amount}% </span>" : '' ?>
                            <?= $discountProduct->flashDealProducts->is_new ? '<span class="product-event-new">mới</span>' : '' ?>
                        </div>
                        <div class="deal-product-img">
                            <img data-src="../img/products/<?= $discountProduct->flashDealProducts->image ?>" alt="" class="lazy-load" />
                        </div>
                        <div class="deal-product-content">
                            <a href="/product-detail?id=<?= $discountProduct->flashDealProducts->id ?>" class="product-name"><?= $discountProduct->flashDealProducts->product_name ?></a>
                            <div class="product-review">
                                <div class="stars-outer">
                                    <div class="stars-inner"></div>
                                    <div class="stars-inner" style="width: <?= $discountProduct->flashDealProducts->ratings['avgRating'] ?>%"></div>
                                </div>
                                <span class="number-rating"></span>
                                <a href="#" class="number-rating">(<?= $discountProduct->flashDealProducts->ratings['amountRating'] ?>)</a>
                            </div>
                            <div class="product-price color-sales" style="font-weight: bold;"><?= MainController::$ctrl->formatPrice($discountProduct->flashDealProducts->list_price * (100 - $discountProduct->discount_amount) / 100) ?>đ
                                <del style="margin-left: 5px; color: #666;" class="product-discount-price"><?= MainController::$ctrl->formatPrice($discountProduct->flashDealProducts->list_price) ?>đ</del>
                            </div>
                            <div class="product-desc">
                                <?= $discountProduct->flashDealProducts->description ?>
                            </div>
                            <span class="product-btn btn product-add-cart-alert" data-id="<?= $discountProduct->flashDealProducts->id ?>">Thêm vào giỏ</span>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
<section class="banner-middle section-main">
    <nav class="banner-middle-layout">
        <ul id="slider-banner-middle" class="row">
            <li class="col-md-12 col-lg-6 col-xl-4 banner-middle-content mySlides mySlides-1">
                <img src="../img/banner/banner-5.png" alt="" />
                <div class="mySlides-child">
                    <h3>
                        <a href="product-list?category=2" class="link">Microsoft <br />Surface Laptop</a>
                    </h3>
                    <p class="desc">Laptop</p>
                </div>
            </li>
            <li class="col-md-4 col-lg-6 col-xl-4 banner-middle-content mySlides mySlides-2">
                <img src="../img/banner/banner-6.png" alt="" />
                <div class="mySlides-child">
                    <h3>
                        <a href="product-list?category=3" class="link">Máy ảnh <br />Phiên bản thể thao tốt nhất</a>
                    </h3>
                    <p class="desc">Máy ảnh</p>
                </div>
            </li>
            <li class="col-md-4 col-xl-4 banner-middle-content mySlides mySlides-3">
                <img style="border-radius: 20px;" src="../img/banner/banner-7.png" alt="" />
                <div class="mySlides-child">
                    <h3>
                        <a href="product-list?category=5" class="link">Loa <br />Bluetooth 90</a>
                    </h3>
                    <p class="desc">Phụ kiện</p>
                </div>
            </li>

        </ul>
    </nav>
</section>
<?php if (!empty($topProducts)) : ?>
    <section class="top-product section-main">
        <div class="section-header title-product">
            <h3>Sản phẩm bán nhiều</h3>
            <a href="/top-product-list">Xem tất cả <i class="fas fa-chevron-right"></i></a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-5 product-box-items featured-product featured-product-first">
                <div class="product-box-items-cover featured-product-items" style="height: 100%;">
                    <div class="product-event" style="left: 30px;">
                        <?= isset($topProducts[0]->discount_amount) ? "<span class='product-sales'> - {$topProducts[0]->discount_amount}% </span>" : '' ?>
                        <?= $topProducts[0]->is_new ? '<span class="product-event-new">mới</span>' : '' ?>
                    </div>
                    <a href="/product-detail?id=<?= $topProducts[0]->id ?>" class="product-img">
                        <img data-src="../img/products/<?= $topProducts[0]->image ?>" class="product-image lazy-load" alt="" />
                    </a>
                    <div class="featured-product-infor">
                        <div class="product-content">
                            <a href="/product-detail?id=<?= $topProducts[0]->id ?>" class="product-name"><?= $topProducts[0]->product_name ?></a>
                            <div class="product-review">
                                <div class="stars-outer">
                                    <div class="stars-inner" style="width: <?= $topProducts[0]->ratings['avgRating'] ?>%"></div>
                                </div>
                                <span class="number-rating"></span>
                                <a href="#">(<?= $topProducts[0]->ratings['amountRating'] ?>)</a>
                            </div>
                            <?php if (isset($topProducts[0]->discount_price)) : ?>
                                <div style="display: inline-block;" class="product-price featured-price color-sales text-danger"><?= $topProducts[0]->discount_price ?>đ</div>
                                <del style="margin-left: 2px; color: #666; font-size: 14px;"><?= $topProducts[0]->list_price ?>đ</del>
                            <?php else : ?>
                                <div class="product-price featured-price"><?= $topProducts[0]->list_price ?>đ</div>
                            <?php endif; ?>
                        </div>
                        <span class="product-content-summary"><?= $topProducts[0]->description ?></span>
                        <div class="product-add-cart-item product-featured-add-cart-primary">
                            <span class="product-btn btn product-add-cart-alert" data-id="<?= $topProducts[0]->id ?>"><strong>Thêm vào giỏ</strong></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-7">
                <ul class="row" style="margin-bottom: 0;">
                    <?php for ($i = 1; $i < count($topProducts); $i++) : ?>
                        <li class="col-12 col-lg-12 col-xl-6 product-box-items product-box-items-fix featured-product">
                            <div class="product-box-items-cover featured-product-items">
                                <div class="product-event" style="left: 30px;">
                                    <?= isset($topProducts[$i]->discount_amount) ? "<span class='product-sales'> - {$topProducts[$i]->discount_amount}% </span>" : '' ?>
                                    <?= $topProducts[$i]->is_new ? '<span class="product-event-new">mới</span>' : '' ?>
                                </div>
                                <a href="/product-detail?id=<?= $topProducts[$i]->id ?>" class="product-img">
                                    <img data-src="../img/products/<?= $topProducts[$i]->image ?>" class="product-image lazy-load" alt="" />
                                </a>
                                <div class="featured-product-infor">
                                    <div class="product-content">
                                        <a href="/product-detail?id=<?= $topProducts[$i]->id ?>" class="product-name"><?= $topProducts[$i]->product_name ?></a>
                                        <div class="product-review">
                                            <div class="stars-outer">
                                                <div class="stars-inner" style="width: <?= $topProducts[$i]->ratings['avgRating'] ?>%"></div>
                                            </div>
                                            <span class="number-rating"></span>
                                            <a href="#">(<?= $topProducts[$i]->ratings['amountRating'] ?>)</a>
                                        </div>
                                        <?php if (isset($topProducts[$i]->discount_price)) : ?>
                                            <div style="display: inline-block;" class="product-price featured-price color-sales text-danger"><?= $topProducts[$i]->discount_price ?>đ</div>
                                            <del style="margin-left: 5px; color: #666; font-size:14px"><?= $topProducts[$i]->list_price ?>đ</del>
                                        <?php else : ?>
                                            <div class="product-price featured-price"><?= $topProducts[$i]->list_price ?>đ</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>

        </div>
    </section>
<?php endif; ?>
<section class="view-product">
    <div class="">
        <article>
            <div class="transform-text-product">
                <div class="text-product">
                    <span>MIẾN PHÍ GIAO HÀNG CHO ĐƠN 500.000đ</span>
                    <span>Giao hàng miễn phí ở VN - Hoàn lại hơn 1.0000.000đ ( Không bao gồm Điện thoại ) | Miễn phí thu thập đồ tại cửa hàng ở VN</span>
                    <span>Với mỗi hóa đơn trên 150.000đ từ TechOfTTVV, nhận ngay phiếu giảm giá 5%.</span>
                    <span>Với mỗi hóa đơn trên 300.00đ từ TechOfTTVV, nhận ngay phiếu giảm giá 15%.</span>
                    <span>GIAO HÀNG NHANH CHÓNG < 5KM</span>
                </div>
            </div>
        </article>
    </div>
</section>
<section class="trending section-main">
    <div class="section-header title-product">
        <h3>Sản phẩm ngẫu nhiên</h3>
        <!-- <a href="#">Xem tất cả <i class="fas fa-chevron-right"></i></a> -->
    </div>
    <nav class="container-fluid product-box">
        <ul class="row">
            <?php foreach ($randProducts as $randProduct) : ?>
                <li class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2 product-box-items">
                    <div class="product-box-items-cover">
                        <div class="product-event">
                            <?= isset($randProduct->discount_amount) ? "<span class='product-sales'> - {$randProduct->discount_amount}% </span>" : '' ?>

                            <?= $randProduct->is_new ? '<span class="product-event-new">mới</span>' : '' ?>
                        </div>
                        <a href="/product-detail?id=<?= $randProduct->id ?>" class="product-img">
                            <img data-src="../img/products/<?= $randProduct->image ?>" class="product-image lazy-load" alt="" />
                        </a>
                        <div class="product-content">
                            <a href="/product-detail?id=<?= $randProduct->id ?>" class="product-name"><?= $randProduct->product_name ?></a>
                            <div class="product-review">
                                <div class="stars-outer">
                                    <div class="stars-inner" style="width: <?= $randProduct->ratings['avgRating'] ?>%"></div>
                                </div>
                                <span class="number-rating"></span>
                                <a href="#">(<?= $randProduct->ratings['amountRating'] ?>)</a>
                            </div>
                            <?php if (isset($randProduct->discount_price)) : ?>
                                <div style="display: inline-block;" class="product-price featured-price color-sales text-danger"><?= $randProduct->discount_price ?>đ</div>
                                <del style="color: #666;" class="product-discount-price"><?= $randProduct->list_price ?>đ</del>
                            <?php else : ?>
                                <div class="product-price"><?= $randProduct->list_price ?>đ</div>
                            <?php endif; ?>
                        </div>
                        <div class="product-action-items">
                            <div class="product-add-cart-item">
                                <span class="product-btn btn product-add-cart-alert" data-id="<?= $randProduct->id ?>"><strong>Thêm vào giỏ</strong></span>
                            </div>
                            <div class="product-view-item">
                                <a class="view-product-detail-primary" href="/product-detail?id=<?= $randProduct->id ?>" title="Xem sản phẩm"><i class="far fa-eye"></i></a>
                                <a class="add-wish-primary" href="#" title="Thêm vào yêu thích"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</section>
<section class="brand section-main">
    <div class="brand-layout layout">
        <img src="../img/brand/brand_01.png" alt="" />
        <img src="../img/brand/brand_02.png" alt="" />
        <img src="../img/brand/brand_03.png" alt="" />
        <img src="../img/brand/brand_04.png" alt="" />
        <img src="../img/brand/brand_05.png" alt="" />
        <img src="../img/brand/brand_06.png" alt="" />
    </div>
</section>