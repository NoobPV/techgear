<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AdminMiddleware;
use app\core\middlewares\GetIdToEdit;
use app\core\middlewares\GetIdToShow;
use app\core\Request;
use app\core\Response;
use DateTime;

class AdminController extends Controller
{
    public MainController $ctrl;

    public function __construct()
    {
        $this->ctrl = new MainController();
        $this->registerMiddleware(new GetIdToShow(['orderDetail'], 'orderDetailModel', 'order_id', 'id'));
        $this->registerMiddleware(new GetIdToEdit(['productEdit'], 'productModel', 'id', 'id'));
        $this->registerMiddleware(new GetIdToEdit(['categoryEdit'], 'categoryModel', 'id', 'id'));
        $this->registerMiddleware(new AdminMiddleware(['dashboard, product, productEdit, category, categoryEdit, order, orderDetail, review']));
    }

    public function dashboard(Request $request, Response $response)
    {
        $firstDayOfMonth = (new DateTime('first day of this month'))->format('Y/m/d');
        $lastDayOfMonth = (new DateTime('last day of this month'))->format('Y/m/d');
        $orderInMonths = $this->ctrl->orderModel->findAll("created_at > '$firstDayOfMonth' and created_at < '$lastDayOfMonth' and status = 3");
        $sales = 0;
        foreach ($orderInMonths as $orderInMonth) {
            $sum = $this->ctrl->orderDetailModel->groupBy('sum(quantity * unit_price) as total', "order_id = $orderInMonth->id", 'order_id')[0];
            $sales += $sum->total;
        }
        $sales = $this->ctrl->formatPrice($sales);

        $totalSuccessOrder = $this->ctrl->orderModel->total('status', 3);
        $totalDeliveringOrder = $this->ctrl->orderModel->total('status', 2);

        $productStocking = $this->ctrl->productModel->total('status', 1);
        $productOutOfStocking = $this->ctrl->productModel->total('status', 0);

        $orders = $this->ctrl->orderModel->findAll();
        foreach ($orders as $order) {
            $order->customer = $this->ctrl->customerModel->find('id', $order->customer_id)[0];
            $total = $this->ctrl->orderDetailModel->groupBy('sum(unit_price) as price', "order_id = $order->id")[0];
            $order->totalPrice = $this->ctrl->formatPrice($total->price);
            $order->status = $this->ctrl->orderStatus($order->status);
        }

        $preDate = date('Y-m-d', strtotime(' -4 day'));
        $reviews = $this->ctrl->productReviewModel->findAll("created_at > '$preDate'");
        foreach ($reviews as $review) {
            $review->customer = $this->ctrl->customerModel->find('id', $review->customer_id)[0];
            $review->product = $this->ctrl->productModel->find('id', $review->product_id)[0];
        }

        return $this->render('dashboard', [
            'sales' => $sales,
            'totalSuccessOrder' => $totalSuccessOrder,
            'totalDeliveringOrder' => $totalDeliveringOrder,
            'productStocking' => $productStocking,
            'productOutOfStocking' => $productOutOfStocking,
            'orders' => $orders,
            'reviews' => $reviews,
        ], 'admin');
    }

    public function product(Request $request, Response $response)
    {
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 5;
        $amountProducts = $this->ctrl->productModel->total();

        $total = $this->ctrl->productModel->total();
        $totalStocking = $this->ctrl->productModel->total('status', 1);

        $products = $this->ctrl->productModel->findAll(null, null, 5, $offset);
        foreach ($products as $product) {
            $product->category = $this->ctrl->categoryModel->find('id', $product->category_id)[0];
            $product->status = $this->ctrl->productStatus($product->status);
            $product->list_price = $this->ctrl->formatPrice($product->list_price);
        }

        if ($request->isPost()) {
            $json = file_get_contents('php://input', true);
            $data = json_decode($json);

            if (isset($data->id) && isset($data->status)) {
                $temp = [
                    'id' => $data->id,
                    'status' => $data->status,
                ];
                $this->ctrl->productModel->save($temp);
                $status = $this->ctrl->productStatus($data->status);
                $text = "<span class='btn btn-$status[css]' data-id='$data->id' data-status='$status[number]' data-toggle='modal' data-target='#edit-status-product'>$status[html]</span>";
                $totalStocking = $this->ctrl->productModel->total('status', 1);
                $dataJSON = ['text' => $text, 'totalStocking' => $totalStocking];
                // exit(json_encode($text));
                exit(json_encode($dataJSON));
            }

            if (isset($data->deleteId)) {
                $alerts = $this->ctrl->checkForeignKeyProduct($data->deleteId);
                if (empty($alerts)) {
                    $product = $this->ctrl->productModel->findById($data->deleteId);
                    if (file_exists("img/products/$product->image")) {
                        (unlink("img/products/$product->image"));
                    }
                    $productImages = $this->ctrl->productImageModel->find("product_id", $data->deleteId);
                    if (!empty($productImages)) {
                        foreach ($productImages as $productImage) {
                            if (file_exists("img/products-detail/$productImage->image")) {
                                (unlink("img/products-detail/$productImage->image"));
                            }
                            $this->ctrl->productImageModel->delete($productImage->id);
                        }
                    }
                    $this->ctrl->exportModel->deleteWhere("product_id", $data->deleteId);
                    $this->ctrl->importModel->deleteWhere("product_id", $data->deleteId);
                    $this->ctrl->productDiscountModel->deleteWhere("product_id", $data->deleteId);
                    $this->ctrl->productReviewModel->deleteWhere("product_id", $data->deleteId);
                    $this->ctrl->productModel->delete($data->deleteId);
                    Application::$app->session->setFlash('productSuccess', 'Bạn đã xóa sản phẩm thành công');
                    exit(json_encode(true));
                } else
                    exit(json_encode($alerts));
            }

            if (isset($_POST['deleteMultiId'])) {
                $alerts = [];
                foreach ($_POST['deleteMultiId'] as $id) {
                    $alert = $this->ctrl->checkForeignKeyProduct($id);
                    if (!empty($alert))
                        $alerts = array_merge($alerts, $this->ctrl->checkForeignKeyProduct($id));
                }
                if (empty($alerts)) {
                    foreach ($_POST['deleteMultiId'] as $id) {
                        $product = $this->ctrl->productModel->findById($id);
                        if (file_exists("img/products/$product->image")) {
                            (unlink("img/products/$product->image"));
                        }
                        $productImages = $this->ctrl->productImageModel->find("product_id", $id);
                        if (!empty($productImages)) {
                            foreach ($productImages as $productImage) {
                                if (file_exists("img/products-detail/$productImage->image")) {
                                    (unlink("img/products-detail/$productImage->image"));
                                }
                                $this->ctrl->productImageModel->delete($productImage->id);
                            }
                        }
                        $this->ctrl->exportModel->deleteWhere("product_id", $id);
                        $this->ctrl->importModel->deleteWhere("product_id", $id);
                        $this->ctrl->productDiscountModel->deleteWhere("product_id", $id);
                        $this->ctrl->productReviewModel->deleteWhere("product_id", $id);
                        $this->ctrl->productModel->delete($id);
                    }
                    Application::$app->session->setFlash('productSuccess', 'Bạn đã xóa sản phẩm thành công');
                    exit(json_encode(true));
                } else
                    exit(json_encode($alerts));
            } else {
                $alerts[] = "Chưa chọn dữ liệu";
                exit(json_encode($alerts));
            }
        }

        return $this->render('product', [
            'total' => $total,
            'totalStocking' => $totalStocking,
            'products' => $products,
            'amountProducts' => $amountProducts,
            'currentPage' => $page,
            'alerts' => $alerts ?? null,
        ], 'admin');
    }

    public function productEdit(Request $request, Response $response)
    {
        if (isset($_GET['id'])) {
            $product = $this->ctrl->productModel->findById($_GET['id']);
            $imageDetails = $this->ctrl->productImageModel->findAll("product_id = $product->id");
        }

        if ($request->isPost()) {
            $data = $request->getBody();
            unset($data['deleteIdImages']);
            $errors = [];

            if (empty(($data['id']))) {
                if (count($this->ctrl->productModel->find('product_code', $data['product_code'])) > 0) {
                    $errors[] = 'Mã đã được tạo';
                }
            } else {
                if (count($this->ctrl->productModel->find('product_code', $data['product_code'])) > 1) {
                    $errors[] = 'Mã đã được tạo';
                }
            }

            if (empty($data['image']) || !empty($_FILES['image']['name'])) {
                $checkImage = $this->ctrl->checkImage($_FILES['image'], "img/products/");
                if (empty($checkImage['errors'])) {
                    $data['image'] = $checkImage['imageName'];
                } else {
                    $errors[] = $checkImage['errors'];
                }
            }

            if (!empty($_FILES['imageDetails']['name'][0])) {
                $checkMultiImage = $this->ctrl->checkMultiImage($_FILES['imageDetails'], "img/products-detail/");
                if (empty($checkMultiImage['errors'])) {
                    $imageNames = $checkMultiImage['imageNames'];
                } else {
                    $errors[] = $checkMultiImage['errors'];
                }
            }

            $id = '';
            if (empty($errors[0])) {
                if (empty(($data['id']))) {
                    $id = $this->ctrl->productModel->save($data);
                    Application::$app->session->setFlash('editProductSuccess', 'Bạn đã thêm sản phẩm thành công');

                    // $getMails = $this->ctrl->sendProductInfoModel->findAll();
                    // $mails = [];
                    // foreach ($getMails as $item) {
                    //     $mails[] = $item->email;
                    // }
                    // $subject = "Thông báo về sản phẩm mới";
                    // $body = "Đây là đường link sản phẩm mới của chúng tôi <br>
                    // <a href='https://techofttvv.000webhostapp.com/product-detail?id=$id'>$data[product_name]</a>";
                    // $this->ctrl->sendMail($subject, $body, $mails);
                } else {
                    $id = $data['id'];
                    if (!empty($_FILES['image']['name'])) {
                        $product = $this->ctrl->productModel->findById($id);
                        if (file_exists("img/products/$product->image")) {
                            (unlink("img/products/$product->image"));
                        }
                    }
                    if (empty($data['is_new'])) {
                        $data['is_new'] = 0;
                    }
                    $this->ctrl->productModel->save($data);

                    if (isset($_POST['deleteIdImages'])) {
                        foreach ($_POST['deleteIdImages'] as $imageId) {
                            $productImage = $this->ctrl->productImageModel->findById($imageId);
                            if (file_exists("img/products-detail/$productImage->image")) {
                                unlink("img/products-detail/$productImage->image");
                            }
                            $this->ctrl->productImageModel->delete($imageId);
                        }
                    }
                    Application::$app->session->setFlash('editProductSuccess', 'Bạn đã sửa sản phẩm thành công');
                }
                $hrefJSON = "/admin/product/edit?id=$id";
                if (isset($imageNames)) {
                    foreach ($imageNames as $i) {
                        $item = [
                            'id' => "",
                            'product_id' => $id,
                            'image' => $i
                        ];
                        $this->ctrl->productImageModel->save($item);
                    }
                }

                if (isset($checkImage)) {
                    if (move_uploaded_file($_FILES['image']["tmp_name"], $checkImage['target_file'])) {
                        $this->ctrl->fixImage($checkImage['target_file'], 600, 600);
                    }
                }

                if (isset($checkMultiImage)) {
                    for ($i = 0; $i < count($_FILES['imageDetails']["tmp_name"]); $i++) {
                        if (move_uploaded_file($_FILES['imageDetails']["tmp_name"][$i], $checkMultiImage['target_files'][$i])) {
                            // $this->ctrl->fixImage($checkMultiImage['target_files'][$i], 600, 600);
                        }
                    }
                }

                exit(json_encode($hrefJSON));
            } else {
                exit(json_encode(['errors' => $errors]));
            }
        }
        return $this->render('product-edit', [
            'product' => $product ?? null,
            'imageDetails' => $imageDetails ?? null,
        ], 'admin');
    }

    public function category(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $json = file_get_contents('php://input', true);
            $data = json_decode($json);

            if (isset($data->deleteId)) {
                $alerts = $this->ctrl->checkForeignKeyCategory($data->deleteId);
                if (empty($alerts)) {
                    $category = $this->ctrl->categoryModel->findById($data->deleteId);
                    if (file_exists("img/categories/$category->image")) {
                        (unlink("img/categories/$category->image"));
                    }
                    $this->ctrl->categoryModel->delete($data->deleteId);
                    Application::$app->session->setFlash('success', 'Bạn đã xóa danh mục thành công');
                    exit(json_encode(true));
                } else
                    exit(json_encode($alerts));
            }

            if (isset($_POST['deleteMultiId'])) {
                $alerts = [];
                foreach ($_POST['deleteMultiId'] as $id) {
                    $alert = $this->ctrl->checkForeignKeyCategory($id);
                    if (!empty($alert))  $alerts = array_merge($alerts, $alert);
                }
                if (empty($alerts)) {
                    foreach ($_POST['deleteMultiId'] as $id) {
                        $category = $this->ctrl->categoryModel->findById($id);
                        if (file_exists("img/categories/$category->image")) {
                            (unlink("img/categories/$category->image"));
                        }
                        $this->ctrl->categoryModel->delete($id);
                    }
                    Application::$app->session->setFlash('success', 'Bạn đã xóa danh mục thành công');
                    exit(json_encode(true));
                } else
                    exit(json_encode($alerts));
            } else {
                $alerts[] = "Chưa chọn dữ liệu";
                exit(json_encode($alerts));
            }
        }

        $categories = $this->ctrl->categoryModel->findAll();
        $totalCategory = $this->ctrl->categoryModel->total();

        return $this->render("category", [
            'categories' => $categories,
            'totalCategory' => $totalCategory,
            'alert' => $alert ?? null,
        ], 'admin');
    }

    public function categoryEdit(Request $request, Response $response)
    {
        if (isset($_GET['id'])) {
            $category = $this->ctrl->categoryModel->findById($_GET['id']);
        }

        if ($request->isPost()) {
            $data = $request->getBody();
            $errors = [];

            if (empty($data['image']) || !empty($_FILES['image']['name'])) {
                $checkImage = $this->ctrl->checkImage($_FILES['image'], "img/categories/");
                if (empty($checkImage['errors'])) {
                    $data['image'] = $checkImage['imageName'];
                } else {
                }
                $errors[] = $checkImage['errors'];
            }

            $id = '';
            if (empty($errors[0])) {

                if (empty(($data['id']))) {
                    $id = $this->ctrl->categoryModel->save($data);
                    Application::$app->session->setFlash('editCategorySuccess', 'Bạn đã thêm danh mục thành công');
                } else {
                    $id = $data['id'];
                    if (!empty($_FILES['image']['name'])) {
                        $category = $this->ctrl->categoryModel->findById($id);
                        if (file_exists("img/categories/$category->image")) {
                            (unlink("img/categories/$category->image"));
                        }
                    }
                    $this->ctrl->categoryModel->save($data);
                    Application::$app->session->setFlash('editCategorySuccess', 'Bạn đã sửa danh mục thành công');
                }
                if (isset($checkImage)) {
                    if (move_uploaded_file($_FILES['image']["tmp_name"], $checkImage['target_file'])) {
                        $this->ctrl->fixImage($checkImage['target_file'], 272, 140);
                    }
                }
                $hrefJSON = "/admin/category/edit?id=$id";
                exit(json_encode($hrefJSON));
            } else {
                exit(json_encode(['errors' => $errors]));
            }
        }
        return $this->render("category-edit", [
            'category' => $category ?? null
        ], 'admin');
    }

    public function order(Request $request, Response $response)
    {
        $orders = $this->ctrl->orderModel->findAll();
        foreach ($orders as $order) {
            $order->orderDetail = $this->ctrl->orderDetailModel->find('order_id', $order->id);
            $order->customer = $this->ctrl->customerModel->findById($order->customer_id);
            $order->status = $this->ctrl->orderStatus($order->status);
            $order->totalPrice = $this->ctrl->orderDetailModel->groupBy('sum(unit_price) as price', "order_id = $order->id")[0];
            $order->totalPrice->price = $this->ctrl->formatPrice($order->totalPrice->price);
        }
        if ($request->isPost()) {
            $json = file_get_contents('php://input', true);
            $data = json_decode($json);

            if (isset($data->deleteId)) {
                $this->ctrl->orderDetailModel->deleteWhere('order_id', $data->deleteId);
                $this->ctrl->orderModel->delete($data->deleteId);
                Application::$app->session->setFlash('success', 'Bạn đã xóa đơn hàng thành công');
            }

            if (isset($data->id) && isset($data->status)) {
                $paid_date = null;
                $order = $this->ctrl->orderModel->findById($data->id);
                if ($data->status == 1 || $data->status == 2) {
                    $paid_date = null;
                }
                if ($data->status == 3) {
                    $paid_date = date('Y-m-d');
                }
                if ($data->status == 4) {
                    $paid_date = $order->paid_date;
                }
                $updateStatus = [
                    'id' => $data->id,
                    'status' => $data->status,
                    'paid_date' => $paid_date,
                ];

                $this->ctrl->orderModel->save($updateStatus);
                $status = $this->ctrl->orderStatus($data->status);
                if (!empty($paid_date))  $paid_date = date('d-m-Y', strtotime($paid_date));
                $text = "<button class='btn btn-$status[css]' style='color: #fff;' data-id='$data->id' data-toggle='modal' data-target='#edit-status-order'>$status[html]</button>";
                $returnData = ['date' => $paid_date, 'html' => $text];
                exit(json_encode($returnData));
            }
            if (isset($data->orderDetailId)) {
                $order = $this->ctrl->orderModel->findById($data->orderDetailId);
                $orderDetails = $this->ctrl->orderDetailModel->find('order_id', $data->orderDetailId);
                $customer = $this->ctrl->customerModel->findById($order->customer_id);
                $gender = $this->ctrl->gender($customer->gender);
                $status = $this->ctrl->orderStatus($order->status);
                $totalPrice = $this->ctrl->orderDetailModel->groupBy('sum(unit_price) as price', "order_id = $order->id")[0];
                $totalPrice->price = $this->ctrl->formatPrice($totalPrice->price);

                foreach ($orderDetails as $item) {
                    $item->product = $this->ctrl->productModel->findById($item->product_id);
                }
                $text = " 
                <div class='modal-header'>
                <div class='order-detail'>
                    <h5>Order $order->id</h5>
                    <span class='btn btn-$status[css]' style='color: #fff;'>$status[html]</span>
                </div>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                <div class='modal-body' >
                <div class='order-detail-infor-div'><strong>Địa chỉ: </strong><span>$order->ship_address</span></div>
                <div class='order-detail-infor-div'><strong>Email: </strong><span class='infor-line'>$customer->email</span></div>
                <div class='order-detail-infor-div'><strong>Số điện thoại: </strong><span class='infor-line'>$customer->phone</span></div>
                <div class='order-detail-infor-div'><strong>Ngày thanh toán: </strong><span>" .
                    ((isset($order->paid_date)) ? date('d-m-Y', strtotime($order->paid_date)) : '') .
                    "</span></div>
                <table class='table' style='overflow-y: scroll; height: auto;'>
                    <thead>
                        <tr>
                            <th scope='col'>
                                <i class='far fa-image'></i>
                            </th>
                            <th scope='col'>Tên sản phẩm</th>
                            <th scope='col'>Số lượng</th>
                            <th scope='col'>Đơn giá</th>
                            <th scope='col'>Tổng giá</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                foreach ($orderDetails as $orderDetail) {
                    $text .=
                        "<tr>
                        <th scope='row'>
                            <img style='width: 70px;' class='' src='../../img/products/{$orderDetail->product->image}' alt='' />
                        </th>
                        <td style='text-transform: capitalize; font-weight: bold;' class='color-featured'>
                            {$orderDetail->product->product_name}
                        </td>
                        <td>
                                $orderDetail->quantity
                        </td>
                        <td>" . number_format($orderDetail->unit_price, 0, ',', '.') . "đ</td>
                        <td>
                            <strong>" . number_format($orderDetail->unit_price * $orderDetail->quantity, 0, ',', '.') . "đ</strong>
                        </td>
                    </tr>";
                }

                $text .=
                    "</div>
                    </tbody>
                    </table>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' data-dismiss='modal'>Đóng</button>
                    </div>";
                exit(json_encode($text));
            }
        }

        return $this->render('order', [
            'orders' => $orders
        ], 'admin');
    }

    public function orderDetail()
    {
        if (isset($_GET['id'])) {
            $order = $this->ctrl->orderModel->findById($_GET['id']);
            $orderDetails = $this->ctrl->orderDetailModel->find('order_id', $_GET['id']);
            $customer = $this->ctrl->customerModel->findById($order->customer_id);
            $gender = $this->ctrl->gender($customer->gender);
            $status = $this->ctrl->orderStatus($order->status);
            $totalPrice = $this->ctrl->orderDetailModel->groupBy('sum(unit_price) as price', "order_id = $order->id")[0];
            $totalPrice->price = $this->ctrl->formatPrice($totalPrice->price);

            foreach ($orderDetails as $item) {
                $item->product = $this->ctrl->productModel->findById($item->product_id);
            }
            return $this->render('order-detail', [
                'order' => $order,
                'orderDetails' => $orderDetails,
                'customer' => $customer,
                'gender' => $gender,
                'status' => $status,
                'totalPrice' => $totalPrice,
            ], 'admin');
        }
    }

    public function review(Request $request, Response $response)
    {
        $reviews = $this->ctrl->productReviewModel->findAll();

        $totalShow = $this->ctrl->productReviewModel->total('status', 1);

        foreach ($reviews as $review) {
            $review->customer = $this->ctrl->customerModel->findById($review->customer_id);
            $review->product = $this->ctrl->productModel->findById($review->product_id);
            $review->editStatus = $this->ctrl->reviewStatus($review->status);
        }

        if ($request->isPost()) {
            $json = file_get_contents('php://input', true);
            $data = json_decode($json);

            if (isset($data->id) && isset($data->status)) {
                $updateStatus = [
                    'id' => $data->id,
                    'status' => $data->status
                ];
                $this->ctrl->productReviewModel->save($updateStatus);
                $status = $this->ctrl->reviewStatus($data->status);
                $text =  "<button class='btn btn-$status[css] style='color: #fff;' data-id='$data->id' data-status='$status[number]' data-toggle='modal' data-target='#edit-status-review'>$status[html]</button>";
                $totalShow = $this->ctrl->productReviewModel->total('status', 1);
                $dataJSON = ['text' => $text, 'totalShow' => $totalShow];
                // exit(json_encode($text));
                exit(json_encode($dataJSON));
                // $response->redirect('/admin/comment');
            }

            if (isset($data->reviewId)) {
                $review = $this->ctrl->productReviewModel->findById($data->reviewId);
                exit(json_encode($review->comment));
                // $response->redirect('/admin/comment');
            }

            if (isset($data->deleteId)) {
                $this->ctrl->productReviewModel->delete($data->deleteId);
                Application::$app->session->setFlash('reviewSuccess', 'Bạn đã xóa bình luận thành công');
            }
        }

        return $this->render('review', [
            'reviews' => $reviews,
            'totalShow' => $totalShow,
        ], 'admin');
    }
}
