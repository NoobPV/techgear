<?php $this->title = 'Bảng điều khiển' ?>
<div class="col-12 col-lg-10 content-detail">
    <section class="dashboard-content section-main">
        <h2 class="section-title">Biểu đồ</h2>
        <div class="row chart-status">
            <div class="chart-status-title chart-status-btn">
                <h3>Tình trạng thương mại điện tử</h3>
                <button>
                    <i class="fas fa-chevron-down icon-ecommerce"></i>
                    <i class="fas fa-chevron-up icon-ecommerce icon-up"></i>
                </button>
            </div>
            <aside class="col-12 col-md-3 aside-menu-chart-toggle">
                <nav>
                    <ul>
                        <li class="dashboard-item">
                            <i class="fas fa-signal chart-icon"></i>
                            <div class="dashboard-item-content">
                                <span><?= $sales ?>đ</span>
                                <p>doanh thu tháng này</p>
                            </div>
                        </li>
                        <li class="dashboard-item">
                            <i class="fas fa-check-circle order-success"></i>
                            <div class="dashboard-item-content">
                                <span><?= $totalSuccessOrder ?> Đơn hàng</span>
                                <p>hoàn thành</p>
                            </div>
                        </li>
                        <li class="dashboard-item">
                            <i class="fab fa-stumbleupon-circle order-on-hold"></i>
                            <div class="dashboard-item-content">
                                <span><?= $totalDeliveringOrder ?> Đơn hàng</span>
                                <p>đang giao</p>
                            </div>
                        </li>
                        <li class="dashboard-item">
                            <i class="fas fa-exclamation-circle product-low"></i>
                            <div class="dashboard-item-content">
                                <span><?= $productStocking ?> Sản phẩm</span>
                                <p>Còn hàng</p>
                            </div>
                        </li>
                        <li class="dashboard-item">
                            <i class="fas fa-times-circle product-out"></i>
                            <div class="dashboard-item-content">
                                <span><?= $productOutOfStocking ?> Sản phẩm</span>
                                <p>Hết hàng</p>
                            </div>
                        </li>
                    </ul>
                </nav>
            </aside>
            <article class="col-12 col-md-9 aside-menu-chart-toggle">
                <div class="container">
                    <canvas id="myChart-view"></canvas>
                </div>
            </article>
        </div>
        <div class="row network-and-reviews">
            <div class="col-12 col-md-6 netword-orders" style="padding-left: 0;">
                <div class="net-word-recent">
                    <div class="net-word-recent-title net-word-order-btn">
                        <h3>Đơn hàng qua mạng</h3>
                        <button>
                            <i class="fas fa-chevron-down icon-network"></i>
                            <i class="fas fa-chevron-up icon-network icon-up"></i>
                        </button>
                    </div>
                    <div class="table-responsive menu-net-work-orders">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Đơn hàng</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Tổng cộng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) : ?>
                                    <tr>
                                        <th scope="row" class="net-word-infor">
                                            <span class="netword-id-orders">#<?= $order->id ?></span>
                                            <span class="netword-name-orders"><?= $order->customer->full_name ?></span>
                                        </th>
                                        <td class="status-netword">
                                            <button class="btn btn-<?= $order->status['css'] ?>"><?= $order->status['html'] ?></button>
                                        </td>
                                        <td class="net-word-order-price"><?= $order->totalPrice ?>đ</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 recent-reviews-responsive" style="padding-right: 0;">
                <div class="net-word-recent">
                    <div class="net-word-recent-title recent-reviews-btn">
                        <h3>Đánh giá gần đây</h3>
                        <button>
                            <i class="fas fa-chevron-down icon-review"></i>
                            <i class="fas fa-chevron-up icon-review icon-up"></i>
                        </button>
                    </div>
                    <nav class="menu-recent-reviews">
                        <ul>
                            <?php foreach ($reviews as $review) : ?>
                                <li>
                                    <div>
                                        <div>
                                            <span class="recent-product-name"><?= $review->product->product_name ?></span>
                                            <div class="recent-user-name">đánh giá bởi
                                                <span><?= $review->customer->full_name ?></span>
                                            </div>
                                        </div>
                                        <p><?= $review->comment ?></p>
                                    </div>
                                    <div class="stars-outer">
                                        <div class="stars-inner" style="width: <?= $review->rating * 20 ?>%"></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>