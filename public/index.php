<?php

use app\controllers\AdminController;
use app\controllers\FormController;
use app\controllers\ProductController;
use app\controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/', [ProductController::class, 'home']);
$app->router->post('/', [ProductController::class, 'home']);
$app->router->get('/search-product', [ProductController::class, 'searchProduct']);
$app->router->post('/search-product', [ProductController::class, 'searchProduct']);
$app->router->get('/product-list', [ProductController::class, 'productList']);
$app->router->post('/product-list', [ProductController::class, 'productList']);
$app->router->get('/top-product-list', [ProductController::class, 'topProductList']);
$app->router->post('/top-product-list', [ProductController::class, 'topProductList']);
$app->router->get('/new-product-list', [ProductController::class, 'newProductList']);
$app->router->post('/new-product-list', [ProductController::class, 'newProductList']);
$app->router->get('/product-detail', [ProductController::class, 'productDetail']);
$app->router->post('/product-detail', [ProductController::class, 'productDetail']);
$app->router->get('/cart', [ProductController::class, 'cart']);
$app->router->post('/cart', [ProductController::class, 'cart']);
$app->router->get('/checkout', [FormController::class, 'checkout']);
$app->router->post('/checkout', [FormController::class, 'checkout']);
$app->router->get('/login', [FormController::class, 'login']);
$app->router->post('/login', [FormController::class, 'login']);
$app->router->get('/logout', [FormController::class, 'logout']);
$app->router->get('/forgot-password', [FormController::class, 'forgotPassword']);
$app->router->post('/forgot-password', [FormController::class, 'forgotPassword']);
$app->router->get('/change-password', [FormController::class, 'changePassword']);
$app->router->post('/change-password', [FormController::class, 'changePassword']);
$app->router->get('/reset-password', [FormController::class, 'resetPassword']);
$app->router->post('/reset-password', [FormController::class, 'resetPassword']);
$app->router->get('/register', [FormController::class, 'register']);
$app->router->post('/register', [FormController::class, 'register']);
$app->router->get('/about', [SiteController::class, 'about']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);
$app->router->get('/profile', [SiteController::class, 'profile']);
$app->router->post('/profile', [SiteController::class, 'profile']);
$app->router->get('/admin', [AdminController::class, 'dashboard']);
$app->router->get('/admin/product', [AdminController::class, 'product']);
$app->router->post('/admin/product', [AdminController::class, 'product']);
$app->router->get('/admin/product/edit', [AdminController::class, 'productEdit']);
$app->router->post('/admin/product/edit', [AdminController::class, 'productEdit']);
$app->router->get('/admin/category', [AdminController::class, 'category']);
$app->router->post('/admin/category', [AdminController::class, 'category']);
$app->router->get('/admin/category/edit', [AdminController::class, 'categoryEdit']);
$app->router->post('/admin/category/edit', [AdminController::class, 'categoryEdit']);
$app->router->get('/admin/order', [AdminController::class, 'order']);
$app->router->post('/admin/order', [AdminController::class, 'order']);
$app->router->get('/admin/order-detail', [AdminController::class, 'orderDetail']);
$app->router->get('/admin/review', [AdminController::class, 'review']);
$app->router->post('/admin/review', [AdminController::class, 'review']);

$app->router->get('/test', [SiteController::class, 'test']);
$app->router->get('/fetch', [SiteController::class, 'fetch']);
$app->router->post('/fetch', [SiteController::class, 'fetch']);

$app->run();
