<?php

use app\core\Application;

$url = Application::$app->request->getUrl()
?>

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
    <link href="/css/pages/admin.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <title>Home</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="header">
                <button>
                    <i class="fas fa-sync"></i>
                </button>
                <div class="header-admin-control header-admin-control-btn">
                    <span>Chào Admin! <i class="fas fa-angle-down"></i></span>
                    <nav class="sidebar-admin-control">
                        <ul>
                            <li>
                                <a href="#">
                                    Đăng xuất <i class="fas fa-power-off"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row no-gutters" style="margin:0 -15px;">
                <aside class="col-12 col-lg-2">
                    <nav>
                        <ul class="menu-control-item">
                            <!-- <i class="fas fa-caret-left icon-active-sidebar" data-id-menu="2"></i> -->
                            <li class="menu-item" data-id-menu="1">
                                <a href="/admin" class="menu-item-cover dashboard-first toggle-sidebar-btn dashboard-btn <?= $url == '/admin' ? 'actived-color' : '' ?>" data-id-menu="1">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Biểu đồ
                                </a>
                            </li>
                            <li class="menu-item" data-id-menu="2">
                                <a href="/admin/product" class="menu-item-cover product-btn <?= $url == '/admin/product' ? 'actived-color' : '' ?>" data-id-menu="2">
                                    <i class="fas fa-archive"></i>
                                    Sản phẩm
                                </a>
                            </li>
                            <li class="menu-item" data-id-menu="1">
                                <a href="/admin/product/edit" class="menu-item-cover dashboard-first toggle-sidebar-btn dashboard-btn <?= $url == '/admin/product/edit' ? 'actived-color' : '' ?>" data-id-menu="1">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Thêm sản phẩm
                                </a>
                            </li>
                            <li class="menu-item" data-id-menu="3">
                                <a href="/admin/category" class="menu-item-cover toggle-sidebar-btn cate-btn <?= $url == '/admin/category' ? 'actived-color' : '' ?>" data-id-menu="3">
                                    <i class="fas fa-compass"></i>
                                    Danh mục
                                </a>
                            </li>
                            <li class="menu-item" data-id-menu="3">
                                <a href="/admin/category/edit" class="menu-item-cover toggle-sidebar-btn cate-btn <?= $url == '/admin/category/edit' ? 'actived-color' : '' ?>" data-id-menu="3">
                                    <i class="fas fa-compass"></i>
                                    Thêm danh mục
                                </a>
                            </li>
                            <li class="menu-item" data-id-menu="4">
                                <a href="/admin/order" class="menu-item-cover toggle-sidebar-btn order-btn <?= $url == '/admin/order' ? 'actived-color' : '' ?>" data-id-menu="4">
                                    <i class="fas fa-check-circle"></i>
                                    Đơn hàng
                                </a>
                            </li>
                            <li class="menu-item" data-id-menu="5">
                                <a href="/admin/review" class="menu-item-cover toggle-sidebar-btn comment-btn <?= $url == '/admin/review' ? 'actived-color' : '' ?>" data-id-menu="5">
                                    <i class="fas fa-comment-alt"></i>
                                    Đánh giá
                                </a>
                            </li>
                            <!-- <li class="menu-item" data-id-menu="6">
                                <a href="changeColor.php" class="menu-item-cover toggle-sidebar-btn comment-btn" data-id-menu="6">
                                    <i class="fas fa-palette"></i>
                                    Đổi màu
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                </aside>
                {{content}}
            </div>
        </div>
    </main>
    <footer>
    </footer>
    <script src="/js/common/jquery.js" type="text/javascript"></script>
    <script src="/js/jquery.lazy-master/jquery.lazy.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.1/chart.min.js"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/js/dist/popper.min.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/js/dist/util.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/js/dist/modal.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/css/bootstrap-4.0.0/bootstrap-4.0.0/js/dist/tooltip.js" type="text/javascript"></script>
    <script src="/js/pages/admin.js" type="text/javascript"></script>
    <script src="/js/pages/dashboard.js" type="text/javascript"></script>
    <script src="/js/pages/product.js" type="text/javascript"></script>
    <script src="/js/pages/categories.js" type="text/javascript"></script>
    <script src="/js/pages/order.js" type="text/javascript"></script>
    <script src="/js/common/validate.js" type="text/javascript"></script>
    <script src="/js/api/admin.js" type="text/javascript"></script>

</body>

</html>