<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
    <link href="/css/bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap-grid.css" rel="stylesheet" type="text/css" />
    <link href="/css/bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/css/bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/common/until.css" rel="stylesheet" type="text/css" />
    <link href="/css/common/main.css" rel="stylesheet" type="text/css" />
    <link href="/css/common/header.css" rel="stylesheet" type="text/css" />
    <link href="/css/common/footer.css" rel="stylesheet" type="text/css" />
    <link href="/css/common/banner.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/home.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/list.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/detail.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/cart.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/about.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/contact.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/checkout.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/profile.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <title><?= $this->title ?? 'TECHOFTTVV' ?></title>
</head>

<body>
    <header class="header">
        <div class="container-fluid ">
            <div class="row header-layout">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 logo-primary-responsive">
                    <button style="margin-right: 15px; display: none;" class="header-nav-btn-primary button-recommend-primary header-nav-btn">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a href="/" class="logo">TechOfTTVV</a>
                    <i style="display: none;" class="fas fa-shopping-basket cart-btn-responsive view-cart-btn"></i>
                    <span style="display: none;" class="cart-quanti-primary-responsive show-cart-quantity"><?= $_SESSION['amount'] ?? '0' ?></span>
                </div>
                <div class="col-12 col-sm-6 col-md-7 col-lg-6 col-xl-4 col-search-responsive">
                    <nav class="header-nav">
                        <select form="searchProduct" name="category">
                            <option value="">Danh mục</option>
                            <?php foreach (\app\controllers\MainController::$ctrl->allCategory() as $category) : ?>
                                <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <h3 class="header-nav-category header-menu-toggle-btn">
                            Danh Mục
                            <i style="margin-left: 15px;" class="fas fa-angle-down header-cate-icon"></i>
                            <i style="margin-left: 15px; display: none;" class="fas fa-angle-up header-cate-icon"></i>
                        </h3> -->
                        <!-- <div class="menu" id="scrollbar-primary">
                            <ul class="toggle-menu">
                                <li class="menu-item"><a href="#">Sản phẩm nổi bật nhất</a></li>
                                <li class="menu-item"><a href="#">Sản phẩm bán chạy nhất</a></li>
                                    <li class="menu-item">
                                        <label for="category"><?php echo $category->category_name ?></label>
                                    </li>
                            </ul>
                        </div> -->
                    </nav>
                    <form class="header-search-form form" action="/search-product" id="searchProduct" method="POST">
                        <span class="header-nav-border"></span>
                        <input type="text" placeholder="Tra cứu sản phẩm tại đây" name="search" />
                        <button class="header-search-form-btn-primary btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="col-12 col-sm-6 col-md-5 col-lg-3 col-xl-5">
                    <div style="display: flex; justify-content: space-around;" class="header-action-responsive">
                        <?php if (\app\controllers\MainController::$ctrl->auth->isLoggedIn()) : ?>
                            <div class="header-action box-action login-responsive-primary" href="#">
                                <i style="margin-right: 10px;" class="far fa-user"></i>

                                <div class="login-responsive-primary">
                                    <a href="/profile" class="color-white"><?php echo \app\controllers\MainController::$ctrl->auth->getUser()->username ?></a>
                                    <!-- <span class="color">Tài khoản</span> -->
                                    <a href="/logout">Đăng xuất</a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="header-action box-action login-responsive-primary" href="#">
                                <i style="margin-right: 10px;" class="far fa-user"></i>
                                <div>
                                    <a href="/login" class="color">Đăng nhập</a>
                                    <a href="/register" class="color-white">Tạo tài khoản</a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <a class="header-action box-action" href="#">
                            <i style="margin-right: 10px;" class="far fa-heart"></i>
                            <div class="login-responsive-primary">
                                <span class="color">Sản phẩm yêu thích</span>
                                <span class="color-white">Danh sách</span>
                            </div>
                        </a>
                        <div class="header-action box-action view-cart-btn">
                            <i style="margin-right: 10px;" class="fas fa-shopping-basket"></i>
                            <span class="cart-quanti-primary show-cart-quantity"><?= $_SESSION['amount'] ?? '0' ?></span>
                            <div class="login-responsive-primary">
                                <span class="color">Giỏ hàng</span>
                                <span class="color-white show-cart-subtotal"><?= (isset($_SESSION['subtotal'])) ? number_format($_SESSION['subtotal'], 0, ',', '.') : '0' ?>đ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-layout">
                <aside class="menu-layout-nav">
                    <div class="close-menu-btn-primary close-menu-btn">
                        <h3>đóng</h3>
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="menu-layout-main">
                        <nav class="main-menu-items main-menu-items-toggle-btn">
                            <h4 class="menu-title-btn">Danh mục</h4>
                            <ul id="menu-items">
                                <li>
                                    <a href="/">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="/product-list">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="/about">Về chúng tôi</a>
                                </li>
                                <li>
                                    <a href="/contact">Liên hệ</a>
                                </li>
                                <?php if (\app\controllers\MainController::$ctrl->auth->isLoggedIn()) : ?>
                                    <li>
                                        <a href="#">Tài khoản của tôi</a>
                                    </li>
                                    <li>
                                        <a href="/logout">
                                            Đăng xuất
                                            <i style="margin-left: 5px;" class="fas fa-power-off"></i>
                                        </a>
                                    </li>
                                <?php else : ?>
                                    <li>
                                        <a href="/login">
                                            Đăng nhập
                                            <!-- <i style="margin-left: 5px;" class="fas fa-power-off"></i> -->
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <nav class="main-cate-items main-cate-items-toggle-btn">
                            <h4 class="cate-title-btn">Danh mục sản phẩm</h4>
                            <ul id="cate-items">
                                <li><a href="/new-product-list">Sản phẩm mới nhất</a></li>
                                <li><a href="/top-product-list">Sản phẩm bán chạy nhất</a></li>
                                <?php foreach (\app\controllers\MainController::$ctrl->allCategory() as $category) : ?>
                                    <li><a href="/product-list?category=<?= $category->id ?>"><?= $category->category_name ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                </aside>
            </div>
        </div>
        <div class="cart-layout">
            <aside class="cart-layout-nav">
                <div class="cart-layout-title">
                    <h3>Giỏ hàng</h3>
                    <i class="fas fa-times my-cart-icon close-my-cart-btn" data-toggle="tooltip" data-placement="left" title="Đóng"></i>
                </div>
                <div class="clear"></div>
                <div class="show-cart-aside">
                    <?php if (!empty($_SESSION['cart'])) : ?>
                        <nav class="cart-layout-items">
                            <ul>
                                <?php foreach ($_SESSION['cart'] as $product) : ?>
                                    <li class="cart-items row">
                                        <div class="col-3 cart-items-img">
                                            <a href="#">
                                                <img src="/img/products/<?= $product['image'] ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="col-7 cart-items-infor">
                                            <a href="/product-detail?id=<?= $product['product_id'] ?>"><?= $product['product_name'] ?></a>
                                            <span class="cart-items-infor-price"><?= $product['discount_price'] != 0 ? number_format($product['discount_price'], 0, ',', '.') :  number_format($product['list_price'], 0, ',', '.')  ?>đ</span>
                                            <span class="cart-items-infor-quanti"> x <?= $product['quantity'] ?></span>
                                        </div>
                                        <div class="col-2 cart-items-action">
                                            <!-- <a href="/cart?delete_id=<?= $product['product_id'] ?>"  data-toggle="tooltip" data-placement="top" title="Xóa" class="fas fa-times"></a> -->
                                            <a title="delete" class="delete-product-cart" data-id="<?= $product['product_id'] ?>">
                                                <i class="fas fa-times"></i>
                                            </a>
                                            <a href="/product-detail?id=<?= $product['product_id'] ?>">
                                                <i data-toggle="tooltip" data-placement="bottom" title="Chi tiết sản phẩm" class="far fa-eye"></i>
                                            </a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <li class="text-center">
                                    <span style="float: left;">Tổng đơn hàng:</span>
                                    <span style="float: right; color: balck; font-weight: bold;" class="show-cart-subtotal">
                                        <?= (isset($_SESSION['subtotal'])) ? number_format($_SESSION['subtotal'], 0, ',', '.') : '0' ?>đ</span>
                                    <div class="clear"></div>
                                    <!-- <button class="button-border-primary view-cart-detail-btn"> -->
                                        <a href="/cart" class="button-border-primary view-cart-detail-btn" style="color: black;">XEM GIỎ HÀNG</a>
                                    <!-- </button> -->
                                    <!-- <button class="button-submit-primary view-checkout-btn"> -->
                                        <a href="/checkout" class="button-submit-primary view-checkout-btn">TIẾN HÀNG THANH TOÁN</a>
                                    <!-- </button> -->
                                </li>
                            </ul>
                        </nav>
                    <?php else : ?>
                        <div class="cart-layout-empty">
                            <i class="fas fa-shopping-basket"></i>
                            <p>Giỏ hàng chưa có sản phẩm nào</p>
                            <a href="/product-list" class="button-submit-primary close-my-cart-btn">Thêm sản phẩm</a>
                        </div>
                    <?php endif; ?>
                </div>
            </aside>
        </div>
        <hr style="background: rgba(255,255,255,.15); width: 95%; margin: 0 auto;">
        <div class="row header-layout-department">
            <div class="col-12 col-sm-12 col-md-3" style="padding-right: 0">
                <div class="header-nav-department">
                    <h3 class="header-nav-department-toggle-primary header-nav-department-toggle-btn">
                        <i style="margin-right: 5px; display: none;" class="fas fa-times department-icon"></i>
                        <i style="margin-right: 5px;" class="fas fa-bars department-icon"></i>
                        Danh Mục
                    </h3>
                    <nav class="menu-department">
                        <ul class="toggle-menu-department">
                            <li class="menu-item-department"><a href="/new-product-list">Sản phẩm mới nhất</a></li>
                            <li class="menu-item-department"><a href="/top-product-list">Sản phẩm bán chạy nhất</a></li>
                            <?php foreach (\app\controllers\MainController::$ctrl->allCategory() as $category) : ?>
                                <li class="menu-item-department"><a href="/product-list?category=<?= $category->id ?>"><?= $category->category_name ?></a></li>
                            <?php endforeach; ?>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6" style="padding-left: 0;">
                <nav class="header-pages-nav">
                    <ul class="row">
                        <li class="col-12 col-md-3">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="col-12 col-md-3">
                            <a href="/product-list">Sản phẩm</a>
                        </li>
                        <li class="col-12 col-md-3">
                            <a href="/about">về chúng tôi</a>
                        </li>
                        <li class="col-12 col-md-3">
                            <a href="/contact">liên hệ</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-12 col-sm-6 col-md-3 header-freeship">
                <span>Miễn phí giao hàng cho đơn 500.000đ</span>
                <!-- <a href="#" data-toggle="tool-tip" data-placement="top" title="Log out" class="logout-btn-primary" style="">
                    <i class="fas fa-power-off"></i>
                </a> -->
            </div>
        </div>
    </header>

    <main>
        {{content}}
    </main>

    <footer>
        <div class="row" style="padding-bottom: 40px;">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 support-box">
                <div class="footer-top-service">
                    <i class="fas fa-shipping-fast"></i>
                    <div class="box-detail">
                        <p>GIAO HÀNG MIỄN PHÍ</p>
                        <p class="color">Đối với các đơn đặt hàng trên 500.000đ</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 support-box ">
                <div class="footer-top-service">
                    <i class="far fa-credit-card"></i>
                    <div class="box-detail">
                        <p>THANH TOÁN AN TOÀN</p>
                        <p class="color">An toàn tuyệt đối</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 support-box ">
                <div class="footer-top-service">
                    <i class="fas fa-headset"></i>
                    <div class="box-detail">
                        <p>HỖ TRỢ 24/7</p>
                        <p class="color">24/7 Chăm sóc khách hàng</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 support-box">
                <div class="footer-top-service">
                    <i class="fas fa-hand-holding-usd"></i>
                    <div class="box-detail">
                        <p>HOÀN TIỀN</p>
                        <p class="color">Nếu có vấn đề</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row footer-layout">
                <div class="col-12 col-md-12 order-lg-1 col-lg-6 order-xl-1 col-xl-3">
                    <div class="footer-responsive app-btn-toggle fixed-toggle-primary">
                        <div class="footer-content-responsive footer-content-app">
                            <h4 class="footer-title footer-content-title-responsive">Tech Of TTVV</h4>
                            <i class="fas fa-chevron-down down-icon-footer footer-icon footer-icon-app"></i>
                            <i class="fas fa-chevron-up footer-icon footer-icon-app"></i>
                        </div>
                        <nav class="menu-app-link fixed-toggle-primary-content">
                            <div class="clear"></div>
                            <p class="content-responsive" style="color: #999;">
                                Website bán sản phẩm công nghệ uy tín số 1 Việt Nam
                            </p>
                            <ul class="social-links">
                                <li>
                                    <a href="https://www.facebook.com/nguyenluuphivu" title="facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/Thm74455834" title="twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" title="instagram"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12 col-md-12 order-lg-12 col-lg-12 order-xl-2 col-xl-6">
                    <div class="row">
                        <nav class="col-12 col-md-12 col-lg-4 footer-services">
                            <div class="footer-responsive customer-toggle-primary fixed-toggle-primary">
                                <div class="footer-content-responsive footer-content-customer">
                                    <h4 class="footer-title">Danh mục sản phẩm</h4>
                                    <i class="fas fa-chevron-down down-icon-footer footer-icon footer-icon-customer"></i>
                                    <i class="fas fa-chevron-up footer-icon footer-icon-customer"></i>
                                </div>
                                <ul class="footer-content footer-content-customers fixed-toggle-primary-content">
                                    <li><a href="/product-list?category=1">Điện thoại di động</a></li>
                                    <li><a href="/product-list?category=2">Latop</a></li>
                                    <li><a href="/product-list?category=3">Máy ảnh</a></li>
                                    <li><a href="/product-list?category=4">Tai nghe</a></li>
                                    <li><a href="/product-list?category=5">Phụ kiện</a></li>
                                </ul>
                            </div>
                        </nav>
                        <nav class="col-12 col-md-12 col-lg-4 footer-services">
                            <div class="footer-responsive customer-helper-toggle-primary fixed-toggle-primary">
                                <div class="footer-content-responsive footer-content-customer-helper">
                                    <h4 class="footer-title">Chăm sóc khách hàng</h4>
                                    <i class="fas fa-chevron-down down-icon-footer footer-icon footer-icon-customer-helper"></i>
                                    <i class="fas fa-chevron-up footer-icon footer-icon-customer-helper"></i>
                                </div>
                                <ul class="footer-content footer-content-customers-helper fixed-toggle-primary-content">
                                    <li><a href="/contact">Liên hệ với chúng tôi</a></li>
                                    <li><a href="/about">Về chúng tôi</a></li>
                                </ul>
                            </div>
                        </nav>
                        <nav class="col-12 col-md-12 col-lg-4 footer-services">
                            <div class="footer-responsive customer-account-toggle-primary fixed-toggle-primary">
                                <div class="footer-content-responsive footer-content-customer-account">
                                    <h4 class="footer-title">Tài khoản</h4>
                                    <i class="fas fa-chevron-down down-icon-footer footer-icon footer-icon-customer-account"></i>
                                    <i class="fas fa-chevron-up footer-icon footer-icon-customer-account"></i>
                                </div>
                                <ul class="footer-content footer-content-customers-account fixed-toggle-primary-content">
                                    <li><a href="/profile">Trang cá nhân</a></li>
                                    <li><a href="/login">Đăng nhập</a></li>
                                    <li><a href="/register">Đăng ký</a></li>
                                    <li><a href="/change-password">Đổi mật khẩu</a></li>
                                    <li><a href="/forgot-password">Quên mật khẩu?</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-12 col-md-12 order-lg-2 col-lg-6 order-xl-3 col-xl-3 send-mail-footer">
                    <div class="footer-responsive fixed-toggle-primary">
                        <div class="footer-content-responsive newsletter-btn-toggle footer-content-newsletter">
                            <h4 class="footer-title">Đăng ký nhận bản tin</h4>
                            <i class="fas fa-chevron-down down-icon-footer footer-icon footer-icon-newsletter"></i>
                            <i class="fas fa-chevron-up footer-icon footer-icon-newsletter"></i>
                        </div>
                        <div class="menu-newsletter fixed-toggle-primary-content">
                            <p class="join-title">
                                Tham gia cùng hơn 60.000 người đăng ký và nhận được một phiếu giảm giá mới cho mỗi
                                Ngày thứ bảy.
                            </p>
                            <form action="/" class="newsletter form" method="post">
                                <input type="email" placeholder="Nhập địa chỉ Email" name="email" />
                                <button><i class="far fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="push-up-btn-primary">
            <i class="fas fa-angle-double-up"></i>
        </div>
    </footer>
    <script src="/js/common/jquery.js" type="text/javascript"></script>
    <script src="/js/jquery.lazy-master/jquery.lazy.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/js/dist/popper.min.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/js/dist/util.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/js/dist/modal.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/js/dist/tooltip.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/dist/js/bootstrap.js" type="text/javascript"></script>
    <script src="/js/common/footer.js" type="text/javascript"></script>
    <script src="/js/common/header.js" type="text/javascript"></script>
    <script src="/js/pages/main.js" type="text/javascript"></script>
    <script src="/js/pages/home.js" type="text/javascript"></script>
    <script src="/js/pages/product-list.js" type="text/javascript"></script>
    <script src="/js/pages/detail.js" type="text/javascript"></script>
    <script src="/js/pages/cart.js" type="text/javascript"></script>
    <script src="/js/pages/checkout.js" type="text/javascript"></script>
    <script src="/js/pages/about.js" type="text/javascript"></script>
    <script src="/js/pages/contact.js" type="text/javascript"></script>
    <script src="/js/pages/profile.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/api/cart.js" type="text/javascript"></script>

</body>

</html>