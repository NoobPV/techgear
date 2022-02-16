<?php

namespace app\controllers;

use app\controllers\MainController;
use app\core\Application;
use app\core\Controller;
use app\core\middlewares\GetIdToEdit;
use app\core\middlewares\GetIdToShow;
use app\core\Request;
use app\core\Response;

class ProductController extends Controller
{
    public MainController $ctrl;

    public function __construct()
    {
        $this->ctrl = new MainController();
        $this->registerMiddleware(new GetIdToEdit(['productList'], 'productModel', 'category_id', 'category'));
        $this->registerMiddleware(new GetIdToShow(['productDetail'], 'productModel', 'id', 'id'));
    }

    public function home(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $data = $request->getBody();
            if (!empty($data['email'])) {
                if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) == false) {
                    Application::$app->session->setFlash('fail', 'Địa chỉ email không chính xác');
                    $response->redirect('/');
                } else  if (count($this->ctrl->sendProductInfoModel->find('email', $data['email'])) > 0) {
                    Application::$app->session->setFlash('fail', 'Bạn đã đăng kí nhận email');
                    $response->redirect('/');
                } else {
                    $email = [
                        'id' => '',
                        'email' => $data['email']
                    ];
                    $this->ctrl->sendProductInfoModel->save($email);
                    Application::$app->session->setFlash('success', 'Bạn đã đăng kí thành công');
                    $response->redirect('/');
                }
            }
        }

        $trendProducts = $this->ctrl->productModel->findAll('status = 1 and is_new = 1', 'created_at DESC', 6, null);
        $this->ctrl->getRatings($trendProducts);
        $this->ctrl->getDiscount($trendProducts);
        $this->ctrl->formatPriceProduct($trendProducts);

        $discountProducts = $this->ctrl->productDiscountModel->findAll("end_date - CURRENT_TIMESTAMP() > 0 and CURRENT_TIMESTAMP() - start_date > 0 and discount_name = 'flash_deal'", 'discount_amount desc', 2);
        foreach ($discountProducts as $discountProduct) {
            $temp = $this->ctrl->productModel->find('id', $discountProduct->product_id, "status = 1");
            if (!empty($temp)) {
                $discountProduct->flashDealProducts = $temp[0];
                $discountProduct->flashDealProducts->ratings = $this->ctrl->ratings($discountProduct->flashDealProducts->id);
            }
        }

        $exportTables = $this->ctrl->exportModel->groupBy('product_id, sum(quantity)', null, 'product_id', null, 'sum(quantity) desc', 5);
        $topProducts = [];

        foreach ($exportTables as $exportTable) {
            $topProduct =  $this->ctrl->productModel->find('id', $exportTable->product_id, 'status = 1');
            if ($topProduct) {
                $topProducts[] = $topProduct[0];
            }
        }
        $this->ctrl->getRatings($topProducts);
        $this->ctrl->getDiscount($topProducts);
        $this->ctrl->formatPriceProduct($topProducts);

        $randProducts = $this->ctrl->productModel->groupBy('*', 'status = 1', null, null, 'rand()', 6);
        $this->ctrl->getRatings($randProducts);
        $this->ctrl->getDiscount($randProducts);
        $this->ctrl->formatPriceProduct($randProducts);

        return $this->render('home', [
            'trendProducts' => $trendProducts,
            'discountProducts' => $discountProducts,
            'topProducts' => $topProducts,
            'randProducts' => $randProducts,
        ]);
    }

    public function searchProduct(Request $request, Response $response)
    {
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 12;
        $categoryId = $_GET['category'] ?? '';
        $keySearch = $_GET['key'] ?? '';
        if ($request->isPost()) {
            $data = $request->getBody();
            if (!empty($data['category'])) {
                $categoryId = $data['category'];
            }
            $keySearch = $data['search'];
        }
        if (!empty($categoryId)) {
            $category = $this->ctrl->categoryModel->findById($categoryId);
            $categoryName = $category->category_name;
            $products = $this->ctrl->productModel->find('category_id', $categoryId, "product_name like '%$keySearch%' and status = 1", null, 12, $offset);
            $this->ctrl->getRatings($products);
            $this->ctrl->getDiscount($products);
            $this->ctrl->formatPriceProduct($products);
            $amountProducts = count($this->ctrl->productModel->find('category_id', $categoryId, "product_name like '%$keySearch%' and status = 1"));
        } else {
            $categoryName = "Tất cả danh mục";
            $products = $this->ctrl->productModel->findAll("product_name like '%$keySearch%' and status = 1", null, 12, $offset);
            $this->ctrl->getRatings($products);
            $this->ctrl->getDiscount($products);
            $this->ctrl->formatPriceProduct($products);
            $amountProducts = count($this->ctrl->productModel->findAll("product_name like '%$keySearch%' and status = 1"));
        }

        return $this->render('product-list', [
            'products' => $products,
            'amountProducts' => $amountProducts,
            'categoryName' => $categoryName,
            'currentPage' => $page,
            'categoryId' => $categoryId ?? null,
            'isSearchProduct' => true,
            'key' => $keySearch,
        ]);
    }

    public function productList()
    {
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 12;
        if (isset($_GET['category'])) {
            $category = $this->ctrl->categoryModel->findById($_GET['category']);
            $categoryName = $category->category_name;

            $products = $this->ctrl->productModel->find('category_id', $category->id, 'status = 1', null, 12, $offset);
            $this->ctrl->getRatings($products);
            $this->ctrl->getDiscount($products);
            $this->ctrl->formatPriceProduct($products);
            $amountProducts = count($this->ctrl->productModel->find('category_id', $category->id, 'status = 1'));
        } else {
            $categoryName = "Tất cả danh mục";

            $products = $this->ctrl->productModel->findAll('status = 1', null, 12, $offset);
            $this->ctrl->getRatings($products);
            $this->ctrl->getDiscount($products);
            $this->ctrl->formatPriceProduct($products);
            $amountProducts = count($this->ctrl->productModel->findAll('status = 1'));
        }
        return $this->render('product-list', [
            'products' => $products,
            'amountProducts' => $amountProducts,
            'categoryName' => $categoryName,
            'currentPage' => $page,
            'categoryId' => $_GET['category'] ?? null
        ]);
    }

    public function topProductList()
    {
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 12;
        $categoryName = "Tất cả danh mục";
        $exportTables = $this->ctrl->exportModel->groupBy('product_id, sum(quantity)', null, 'product_id');
        $products = [];

        if (count($exportTables) > 12) {
            for ($i = $offset; $i < 12; $i++) {
                $topProduct = $this->ctrl->productModel->find('id', $exportTables[$i]->product_id, 'status = 1');
                if ($topProduct) {
                    $products[] = $topProduct[0];
                }
            }
        } else {
            for ($i = $offset; $i < count($exportTables); $i++) {
                $topProduct = $this->ctrl->productModel->find('id', $exportTables[$i]->product_id, 'status = 1');
                if ($topProduct) {
                    $products[] = $topProduct[0];
                }
            }
        }

        $this->ctrl->getRatings($products);
        $this->ctrl->getDiscount($products);
        $this->ctrl->formatPriceProduct($products);
        $amountProducts = count($exportTables);
        return $this->render('product-list', [
            'products' => $products,
            'amountProducts' => $amountProducts,
            'categoryName' => $categoryName,
            'currentPage' => $page,
            'isTopProduct' => true
        ]);
    }

    public function newProductList()
    {
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 12;
        $categoryName = "Tất cả danh mục";
        $products = $this->ctrl->productModel->findAll('status = 1 and is_new = 1', 'created_at DESC', 12, $offset);
        $this->ctrl->getRatings($products);
        $this->ctrl->getDiscount($products);
        $this->ctrl->formatPriceProduct($products);
        $amountProducts = count($this->ctrl->productModel->findAll('status = 1 and is_new = 1', 'created_at DESC'));
        return $this->render('product-list', [
            'products' => $products,
            'amountProducts' => $amountProducts,
            'categoryName' => $categoryName,
            'currentPage' => $page,
            'isNewProduct' => true
        ]);
    }

    public function productDetail(Request $request, Response $response)
    {
        $id = $_GET['id'] ?? 1;
        if ($request->isPost()) {
            $review = $request->getBody();
            $this->ctrl->productReviewModel->save($review);
            // $response->redirect("/product-detail?id=$id");
            // var_dump($review);
        }

        $product = $this->ctrl->productModel->findById($id);
        $this->ctrl->getRatings($product);
        $this->ctrl->getDiscount($product);
        $this->ctrl->formatPriceProduct($product);

        $category = $this->ctrl->categoryModel->findById($product->category_id);
        $reviews = $this->ctrl->productReviewModel->find("product_id", $product->id, 'status = 1');
        foreach ($reviews as $review) {
            $review->customer  = $this->ctrl->customerModel->findById($review->customer_id);
        }
        $images = $this->ctrl->productImageModel->find('product_id', $product->id, null, null, 3);
        return $this->render('product-detail', [
            'product' => $product,
            'category' => $category,
            'reviews' => $reviews,
            'images' => $images,
        ]);
    }

    public function cart(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $json = file_get_contents('php://input', true);
            $dataJSON = json_decode($json);
            $dataForm = $request->getBody();

            if (isset($dataJSON->addId) || isset($dataForm['addId'])) {
                if (isset($dataJSON->addId)) {
                    $id = $dataJSON->addId;
                    $quantity = $dataJSON->quantity ?? 1;
                } elseif (isset($dataForm['addId'])) {
                    $id = $dataForm['addId'];
                    $quantity = $dataForm['quantity'] ?? 1;
                }


                $product = $this->ctrl->productModel->findById($id);
                $this->ctrl->getDiscount($product);
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['quantity'] += $quantity;
                } else {
                    $item = [
                        'product_id' => $product->id,
                        'product_name' => $product->product_name,
                        'list_price' => $product->list_price,
                        'discount_amount' => $product->discount_amount ?? null,
                        'discount_price' => $product->discount_price ?? null,
                        'image' => $product->image,
                        'quantity' => (int)$quantity
                    ];
                    $_SESSION['cart'][$id] = $item;
                    // $response->redirect('/cart');
                }
            }
            if (isset($_POST['updateId'])) {
                for ($i = 0; $i < count($_POST['updateId']); $i++) {
                    if ($_POST['quantity'][$i] == 0) {
                        unset($_SESSION['cart'][$_POST['updateId'][$i]]);
                    } else {
                        $_SESSION['cart'][$_POST['updateId'][$i]]['quantity'] = $_POST['quantity'][$i];
                    }
                }
            }

            if (isset($dataJSON->deleteId)) {
                unset($_SESSION['cart'][$dataJSON->deleteId]);
            }

            if (isset($dataJSON->deleteAll)) {
                unset($_SESSION['cart']);
                // header('location: /cart');
            }

            $_SESSION['amount'] = 0;
            $_SESSION['total_price'] = 0;
            $_SESSION['total_discount'] = 0;
            $_SESSION['subtotal'] = 0;

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $pro) {
                    // if (isset($pro['discount_amount'])) {
                    //     $_SESSION['subtotal'] += ($pro['discount_price'] * $pro['quantity']);
                    // } else {
                    //     $_SESSION['subtotal'] += $pro['list_price'] * $pro['quantity'];
                    // }
                    $_SESSION['amount'] += $pro['quantity'];
                    $_SESSION['total_price'] += $pro['list_price'] * $pro['quantity'];
                    if (isset($pro['discount_amount'])) {
                        $_SESSION['total_discount'] += (($pro['list_price'] - $pro['discount_price']) * $pro['quantity']);
                    }
                    $_SESSION['subtotal'] =  $_SESSION['total_price'] - $_SESSION['total_discount'];
                }
            }
            $htmlCartItem = '';
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product) {
                    $htmlCartItem .= " 
                    <tr class='show-block-product-cart'>
                    <td>
                        <div class='layout-list list-cart-item'>
                            <input type='hidden' name='updateId[]' value='$product[product_id]'>
                            <a href='/product-detail?id=$product[product_id]'>
                                <img src='../img/products/$product[image]' alt='' class='lazy-load' />
                                <span>$product[product_name]</span>
                            </a>
                        </div>
                    </td>
                    <td class='list-cart-price'>" . $this->ctrl->formatPrice($product['list_price']) . "đ</td>
                    <td class='list-cart-action'>" . ($product['discount_amount'] ?? '0') . "%</td>
                    <td class='list-cart-quanti'>
                        <div class='quantity'>
                            <input type='number' name='quantity[]' value='$product[quantity]' min='0'>
                        </div>
                    </td>
                    <td class='list-cart-action'>
                        <div class='show-price'>";

                    if (isset($product['discount_price']))
                        $htmlCartItem .= "<span>" . $this->ctrl->formatPrice($product['discount_price'] * $product['quantity']) . "đ</span>";
                    else
                        $htmlCartItem .= "<span>" . $this->ctrl->formatPrice($product['list_price'] * $product['quantity']) . "đ</span>";

                    $htmlCartItem .= "</div>
                        <div class='list-cart-action-cover'>
                            <a href='/product-detail?id=$product[product_id]' title='detail'>
                                <i class='far fa-eye'></i>
                            </a>
                            <a title='delete' class='delete-product-cart' data-id='$product[product_id]'>
                                <i class='fas fa-times'></i>
                            </a>
                        </div>
                    </td>
                </tr>";
                }
            }

            $htmlCartAside = '';
            if (!empty($_SESSION['cart'])) {
                $htmlCartAside = "
                    <nav class='cart-layout-items'>
                        <ul>";
                foreach ($_SESSION['cart'] as $product) {
                    $htmlCartAside .=
                        "<li class='cart-items row'>
                                <div class='col-3 cart-items-img'>
                                    <a href='/product-detail?id=$product[product_id]'>
                                        <img src='/img/products/$product[image]' alt='' />
                                    </a>
                                </div>
                                <div class='col-7 cart-items-infor'>
                                    <a href='/product-detail?id=$product[product_id]'>$product[product_name]</a>
                                    <span class='cart-items-infor-price'>" .  ($product['discount_price'] != 0 ? number_format($product['discount_price'], 0, ',', '.') :  number_format($product['list_price'], 0, ',', '.')) . "đ</span>
                                    <span class='cart-items-infor-quanti'> x $product[quantity]</span>
                                </div>
                                <div class='col-2 cart-items-action'>
                                <a title='delete' class='delete-product-cart' data-id='$product[product_id]'>
                                  <i class='fas fa-times'></i>
                                 </a>
                                <a href='/product-detail?id=$product[product_id]'>
                                        <i data-toggle='tooltip' data-placement='bottom' title='Chi tiết sản phẩm' class='far fa-eye'></i>
                                    </a>
                                </div>
                            </li>";
                }
                $htmlCartAside .=
                    "<li class='text-center'>
                            <span style='float: left;'>Tổng đơn hàng:</span>
                            <span style='float: right; color: balck; font-weight: bold;' class='show-cart-subtotal'>" .
                    number_format($_SESSION['subtotal'], 0, ',', '.') . "đ</span>
                            <div class='clear'></div>
                            <button class='button-border-primary view-cart-detail-btn'>
                                <a href='/cart'>XEM GIỎ HÀNG</a>
                            </button>
                            <button class='button-submit-primary view-checkout-btn'>
                                <a href='/checkout'>TIẾN HÀNG THANH TOÁN</a>
                            </button>
                        </li>
                        </ul>
                    </nav>";
            } else {
                $htmlCartAside = "<div class='cart-layout-empty'>
                    <i class='fas fa-shopping-basket'></i>
                    <p>Giỏ hàng chưa có sản phẩm nào</p>
                    <a href='/product-list' class='button-submit-primary close-my-cart-btn'>Thêm sản phẩm</a>
                    </div>
                    <?php endif; ?>";
            }

            $returnDataJSON = ['htmlCartAside' => $htmlCartAside, 'htmlCartItem' => $htmlCartItem, 'amount' => $_SESSION['amount'], 'subtotal' => number_format($_SESSION['subtotal'], 0, ',', '.')];
            exit(json_encode($returnDataJSON));


            header('location: /cart');
        }

        if (isset($_GET['delete_id'])) {
            unset($_SESSION['cart'][$_GET['delete_id']]);
            header('location: /cart');
        }
        if (isset($_GET['delete_all'])) {
            unset($_SESSION['cart']);
            header('location: /cart');
        }
        return $this->render('cart');
    }
}
