<?php $this->title = 'Chi tiết sản phẩm' ?>
<section class="product-detail">
    <div class="filter-header product-detail-title">
        <a href="/">Trang chủ</a>
        <i class="fas fa-chevron-right"></i>
        <a href="/product-list?category=<?= $category->id ?>"><?= $category->category_name ?></a><i class="fas fa-chevron-right"></i>
        <!-- <i class="fas fa-chevron-right"></i> -->
        <span class='filter-header-category'><?= $product->product_name ?></span>
    </div>
    <div class="">
        <div class="row" style="align-items: start;">
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3 col-lg-2 product-detail-img-item">
                        <div class="item img-dot" onclick="currentSlide(1)">
                            <img src="/img/products/<?= $product->image ?>" alt="" class="lazy-load" />
                        </div>
                        <?php if (isset($images)) : ?>
                            <?php for ($i = 0; $i < count($images); $i++) : ?>
                                <div class="item img-dot" onclick="currentSlide(<?= $i + 2 ?>)">
                                    <img src="/img/products-detail/<?= $images[$i]->image ?>" alt="" />
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-sm-9 col-md-9 col-lg-10 product-detail-img-main">
                        <i class="fas fa-chevron-left prev-btn" onclick="plusSlides(-1)"></i>
                        <div class="img-slides slide-in">
                            <img src="/img/products/<?= $product->image ?>" alt="" class="product-image lazy-load" />
                        </div>
                        <?php if (isset($images)) : ?>
                            <?php for ($i = 0; $i < count($images); $i++) : ?>
                                <div class="img-slides slide-in">
                                    <img src="/img/products-detail/<?= $images[$i]->image ?>" alt="" class="product-image lazy-load" />
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                        <i class="fas fa-chevron-right next-btn" onclick="plusSlides(1)"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 product-content product-detail-item">
                <span class="product-name"><?= $product->product_name ?></span>
                <div class="product-review">
                    <div class="stars-outer">
                        <div class="stars-inner" style="width: <?= $product->ratings['avgRating']   ?>%"></div>
                    </div>
                    <span class="quanti-reviewer"><?= $product->ratings['amountRating'] ?> đánh giá</span>
                    <span class="my-review review-scroll-btn">Nhập đánh giá</span>
                </div>
                <?php if (isset($product->discount_price)) : ?>
                    <div style="display: inline-block;" class="product-price featured-price color-sales text-danger"><?= $product->discount_price ?>đ</div>
                    <del style="display: inline; margin-left: 2px; color: #666;"><?= $product->list_price ?>đ</del>
                <?php else : ?>
                    <div class="product-price"><?= $product->list_price ?>đ</div>
                <?php endif; ?>
                <hr style="width: 95%;">
                <div class="product-info">Tình trạng: <?= $product->status == 1 ?  "<span class='status-product-detail'>Còn hàng" : "<span class='text-danger'>Hết hàng" ?></span></div>
                <div class="product-info">SKU: <?= $product->product_code ?></div>
                <p class="product-detail-contents"><?= $product->description ?></p>
                <form action="" class="form-product-detail" id="product-add-cart-form" method="POST">
                    <input type="hidden" name="addId" value="<?= $product->id ?>">
                    <div class="quantity">
                        <input type="number" name="quantity" step="1" value="1" min="0">
                    </div>
                    <input type="submit" value="Thêm vào giỏ hàng">
                </form>
                <div class="product-social-links">
                    <div class="add-wish-list">
                        <i class="far fa-heart"></i>
                        <i class="fas fa-heart success-add-wish-list"></i>
                        Thêm vào danh sách yêu thích
                    </div>
                    <div class="share-btn-primary">
                        <i class="fas fa-share-alt"></i>
                        share
                    </div>
                </div>
                <hr>
                <div class="product-info">Danh mục: <a href="/product-list?category=<?= $category->id ?>"><?= $category->category_name ?></a></div>
            </div>
        </div>

        <div class="row product-detail-rating">
            <div class="col-12 col-lg-6 product-detail-customer-rating">
                <h3>Đánh giá của người dùng</h3>
                <div class="product-detail-rate">
                    <div class="product-review">
                        <h5>Tổng <?= round($product->ratings['avgRating'] / 20, 1) ?> trên 5 sao: </h5>
                        <div class="stars-outer">
                            <div class="stars-inner" style="width: <?= $product->ratings['avgRating'] ?>%"></div>
                        </div>
                        <span class="number-rating"></span>
                        <a href="#">(<?= $product->ratings['amountRating'] ?>)</a>
                    </div>
                </div>
                <?php foreach ($reviews as $review) : ?>
                    <div class="customer-info">
                        <div class="customer-name">
                            <strong><?= $review->customer->full_name ?></strong>
                        </div>
                    </div>
                    <div class="customer-rate">
                        <div class="stars-outer">
                            <div class="stars-inner" style="width: <?= $review->rating * 20 ?>%"></div>
                        </div>
                        <span class="number-rating"></span>
                        <div class="customer-comment"><?= $review->comment ?></div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
            <div class="col-12 col-lg-6">
                <div class="customer-review">
                    <?php if (!\app\controllers\MainController::$ctrl->auth->isLoggedIn()) : ?>
                        <h3>Bạn chưa đăng nhập</h3>
                        <br>
                        <div>
                            <div style="margin-bottom: 10px;">
                                <a href="/login">Đăng nhập</a> để đánh giá sản phẩm.
                            </div>
                            <div>
                                Nếu chưa có tài khoản hãy <a href="/register">Đăng ký</a> ngay!
                            </div>

                        </div>
                    <?php else : ?>
                        <h3>Nhận xét của bạn:</h3>
                        <form action="" method="POST" onsubmit="return checkRating()">
                            <div class="your-reivew">
                                <span>Đánh giá của bạn</span><span style="color: red;"> *</span>
                                <div class="star-outer star-reviewing">
                                    <i class="fas fa-star rating-items" data-rating="1" onclick="getRating(this)"></i>
                                    <i class="fas fa-star rating-items" data-rating="2" onclick="getRating(this)"></i>
                                    <i class="fas fa-star rating-items" data-rating="3" onclick="getRating(this)"></i>
                                    <i class="fas fa-star rating-items" data-rating="4" onclick="getRating(this)"></i>
                                    <i class="fas fa-star rating-items" data-rating="5" onclick="getRating(this)"></i>
                                    <input type="hidden" name="rating" value="" class="rating">
                                </div>
                                <div class="review-contents">
                                    <input type="hidden" name="id" value="">
                                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                                    <input type="hidden" name="customer_id" value="<?= \app\controllers\MainController::$ctrl->auth->getUser()->id ?>">
                                    <span>Nội dung</span><span style="color: red;"> *</span><br>
                                    <textarea name="comment" class="comment" placeholder="bạn muốn nói gì?"></textarea><br>
                                    <div class="error text-danger mb-3"></div>
                                    <button>Gửi bình luận</button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>




    <!-- <div class="product-detail-info">
            <div class="product-detail-header">
            </div>
            <div class="product-detail-content">
                <h3>Khách hàng đánh giá</h3>
                <div class="product-detail-rate">
                    <h3><?= $product->ratings['avgRating'] / 20 ?> trong 5</h3>
                    <div class="product-review">
                        <div class="stars-outer">
                            <div class="stars-inner" style="width: <?= $product->ratings['avgRating'] ?>%"></div>
                        </div>
                        <span class="number-rating"></span>
                        <a href="#">(<?= $product->ratings['amountRating'] ?>)</a>
                    </div>
                </div>
                <div class="customer-review">
                    <?php foreach ($reviews as $review) : ?>
                        <div class="customer-info">
                            <div class="customer-name">
                                <strong><?= $review->customer->full_name ?></strong>
                            </div>
                        </div>
                        <div class="customer-rate">
                            <div class="stars-outer">
                                <div class="stars-inner" style="width: <?= $review->rating * 20 ?>%"></div>
                            </div>
                            <span class="number-rating"></span>
                            <div class="customer-comment"><?= $review->comment ?></div>
                        </div>
                        <hr>
                    <?php endforeach; ?>

                    <?php if (!\app\controllers\MainController::$ctrl->auth->isLoggedIn()) : ?>
                        <div>
                            <div style="margin-bottom: 10px;">
                                <a href="/login">Đăng nhập</a> để đánh giá sản phẩm.
                            </div>
                            <div>
                                Nếu chưa có tài khoản hãy <a href="/register">Đăng ký</a> ngay!
                            </div>

                        </div>
                    <?php else : ?>
                        <form action="" method="POST" onsubmit="return checkRating()">
                            <div class="your-reivew">
                                <h4>Nhận xét của bạn:</h4>
                                <span>đánh giá của bạn</span><span style="color: red;"> *</span>
                                <div class="star-outer star-reviewing">
                                    <i class="fas fa-star rating-items" data-rating="1" onclick="getRating(this)"></i>
                                    <i class="fas fa-star rating-items" data-rating="2" onclick="getRating(this)"></i>
                                    <i class="fas fa-star rating-items" data-rating="3" onclick="getRating(this)"></i>
                                    <i class="fas fa-star rating-items" data-rating="4" onclick="getRating(this)"></i>
                                    <i class="fas fa-star rating-items" data-rating="5" onclick="getRating(this)"></i>
                                    <input type="hidden" name="rating" value="" class="rating">
                                </div>
                                <div class="review-contents">
                                    <input type="hidden" name="id" value="">
                                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                                    <input type="hidden" name="customer_id" value="<?= \app\controllers\MainController::$ctrl->auth->getUser()->id ?>">
                                    <span>Nội dung</span><span style="color: red;"> *</span><br>
                                    <textarea name="comment" class="comment" placeholder="bạn muốn nói gì?"></textarea><br>
                                    <div class="error text-danger"></div>
                                    <button>Gửi bình luận</button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div> -->
    </div>
</section>
<script>
    function getRating(rate) {
        let rating = document.querySelector('.rating');
        var data = rate.getAttribute("data-rating");
        rating.value = data;
    }

    function checkRating() {
        let error = document.querySelector('.error');
        let rating = document.querySelector('.rating').value;
        let comment = document.querySelector('.comment').value;
        let flag = true;

        error.innerHTML = '';
        if (rating == '') {
            error.innerHTML += "Bạn chưa đánh giá <br>";
            flag = false;
        }

        if (comment == '') {
            error.innerHTML += "Bạn chưa bình luận";
            flag = false;
        }

        if (flag == false) {
            return false;
        } else {
            return true;
        }
    }
</script>