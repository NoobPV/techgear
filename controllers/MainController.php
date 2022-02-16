<?php

namespace app\controllers;

use app\core\Authentication;
use app\models\Category;
use app\models\Contact;
use app\models\Customer;
use app\models\Export;
use app\models\Import;
use app\models\Order;
use app\models\OrderDetail;
use app\models\PaymentType;
use app\models\Product;
use app\models\ProductDiscount;
use app\models\ProductImage;
use app\models\ProductReview;
use app\models\ResetPassword;
use app\models\SendProductInfo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MainController
{
    public static MainController $ctrl;
    public Category $categoryModel;
    public Customer $customerModel;
    public Export $exportModel;
    public Import $importModel;
    public Order $orderModel;
    public OrderDetail $orderDetailModel;
    public Product $productModel;
    public PaymentType $paymentTypeModel;
    public ProductDiscount $productDiscountModel;
    public ProductImage $productImageModel;
    public ProductReview $productReviewModel;
    public Contact $contactModel;
    public SendProductInfo $sendProductInfoModel;
    public ResetPassword $resetPasswordModel;
    public Authentication $auth;

    public function __construct()
    {
        self::$ctrl = $this;
        include __DIR__ . "/../config/config.php";
        $this->categoryModel = new Category($pdo, 'categories', 'id');
        $this->customerModel = new Customer($pdo, 'customers', 'id');
        $this->exportModel = new Export($pdo, 'exports', 'id');
        $this->importModel = new Import($pdo, 'imports', 'id');
        $this->orderDetailModel = new OrderDetail($pdo, 'order_details', 'id');
        $this->orderModel = new Order($pdo, 'orders', 'id');
        $this->paymentTypeModel = new PaymentType($pdo, 'payment_types', 'id');
        $this->productDiscountModel = new ProductDiscount($pdo, 'product_discounts', 'id');
        $this->productImageModel = new ProductImage($pdo, 'product_images', 'id');
        $this->productModel = new Product($pdo, 'products', 'id');
        $this->productReviewModel = new ProductReview($pdo, 'product_reviews', 'id');
        $this->contactModel = new Contact($pdo, 'contacts', 'id');
        $this->sendProductInfoModel = new SendProductInfo($pdo, 'send_product_info', 'id');
        $this->resetPasswordModel = new ResetPassword($pdo, 'reset_password', 'id');
        $this->auth = new Authentication($this->customerModel, 'username', 'password');
    }

    public function allCategory()
    {
        return $this->categoryModel->findAll();
    }

    public function ratings($productId)
    {
        return [
            'amountRating' => $this->productReviewModel->total('product_id', $productId, 'status = 1'),
            'avgRating' => $this->productReviewModel->average('rating', 'product_id', $productId, 'status = 1') * 20,
        ];
    }

    public function getRatings(mixed $fields)
    {
        if (is_object($fields)) {
            $fields->ratings = $this->ratings($fields->id);
        }
        if (is_array($fields)) {
            foreach ($fields as $item) {
                $item->ratings = $this->ratings($item->id);
            }
        }
        // return $product->rating
    }

    public function formatPrice($price)
    {
        return number_format($price, 0, ',', '.');
    }

    public function formatPriceProduct(mixed $fields)
    {
        if (is_object($fields)) {
            $fields->list_price = $this->formatPrice($fields->list_price);
            if (isset($fields->discount_price)) {
                $fields->discount_price = $this->formatPrice($fields->discount_price);
            }
        }
        if (is_array($fields)) {
            foreach ($fields as $field) {
                $field->list_price = $this->formatPrice($field->list_price);
                if (isset($field->discount_price)) {
                    $field->discount_price = $this->formatPrice($field->discount_price);
                }
            }
        }
        // return $product->list_price;
        // ?return $product->discount_price;
    }

    public function discounts($productId)
    {
        $discounts = $this->productDiscountModel->find('product_id', $productId, "end_date - CURRENT_TIMESTAMP() > 0 and CURRENT_TIMESTAMP() - start_date > 0", "discount_amount desc");
        if (count($discounts) > 0) {
            $discounts = $discounts[0];
        }
        return $discounts;
    }

    public function getDiscount(mixed $productTables)
    {
        $key = "discounts";
        if (is_object($productTables)) {
            $productTables->$key = $this->discounts($productTables->id);
            if ($productTables->$key) {
                $productTables->discount_amount = $productTables->$key->discount_amount;
                $productTables->discount_price = $productTables->list_price * (100 - $productTables->$key->discount_amount) / 100;
            }
        }
        if (is_array($productTables)) {
            foreach ($productTables as $productTable) {
                $productTable->$key = $this->discounts($productTable->id);
                if ($productTable->$key) {
                    $productTable->discount_amount = $productTable->$key->discount_amount;
                    $productTable->discount_price = $productTable->list_price * (100 - $productTable->$key->discount_amount) / 100;
                }
            }
        }
        // ?return $product->discount_amount;
        // ?return $product->discount_price;
    }

    public function gender($status)
    {
        $message['number'] = (int)$status;
        switch ($status) {
            case 1:
                // $message['css'] = 'warning';
                $message['html'] = 'Nam';
                break;
            case 0:
                // $message['css'] = 'warning';
                $message['html'] = 'Nữ';
                break;
            default:
                $message = '';
                break;
        }
        return $message;
    }

    public function orderStatus($status)
    {
        $message['number'] = (int)$status;
        switch ($status) {
            case 1:
                $message['css'] = 'warning';
                $message['html'] = 'đang xử lí';
                break;
            case 2:
                $message['css'] = 'primary';
                $message['html'] = 'đang giao';
                break;
            case 3:
                $message['css'] = 'success';
                $message['html'] = 'thành công';
                break;
            case 4:
                $message['css'] = 'danger';
                $message['html'] = 'đã hủy';
                break;
            default:
                $message = '';
                break;
        }
        return $message;
    }

    public function reviewStatus($status)
    {
        $message['number'] = (int)$status;
        switch ($status) {
            case 0:
                $message['css'] = 'danger';
                $message['html'] = 'Ẩn';
                break;
            case 1:
                $message['css'] = 'primary';
                $message['html'] = 'Hiện';
                break;
            default:
                $message = '';
                break;
        }
        return $message;
    }

    public function productStatus($status)
    {
        $message['number'] = (int)$status;
        switch ($status) {
            case 0:
                $message['css'] = 'danger';
                $message['html'] = 'Hết hàng';
                break;
            case 1:
                $message['css'] = 'primary';
                $message['html'] = 'Còn hàng';
                break;
            default:
                $message = '';
                break;
        }
        return $message;
    }

    public function checkForeignKeyProduct($id)
    {
        $alert = [];
        $product = $this->productModel->findById($id);
        // if (count($this->importModel->find('product_id', $id)) > 0) {
        //     $alert[] = "Sản phẩm $product->product_name đang có trong bảng import";
        // }
        // if (count($this->exportModel->find('product_id', $id)) > 0) {
        //     $alert[] = "Sản phẩm $product->product_name đang có trong bảng export";
        // }
        if (count($this->orderDetailModel->find('product_id', $id)) > 0) {
            $alert[] = "Sản phẩm $product->product_name đang có trong bảng order_detail";
        }
        // if (count($this->productDiscountModel->find('product_id', $id)) > 0) {
        //     $alert[] = "Sản phẩm $product->product_name đang có trong bảng product_discount";
        // }
        // if (count($this->productImageModel->find('product_id', $id)) > 0) {
        //     $alert[] = "Sản phẩm $product->product_name đang có trong bảng product_images";
        // }
        // if (count($this->productReviewModel->find('product_id', $id)) > 0) {
        //     $alert[] = "Sản phẩm $product->product_name đang có trong bảng product_reviews";
        // }
        return $alert;
    }

    public function checkForeignKeyCategory($id)
    {
        $alert = [];
        // $product = $this->productModel->findById($id);
        $category = $this->categoryModel->findById($id);
        if (count($this->productModel->find('category_id', $id)) > 0) {
            $alert[] = "Đang có sản phẩm trong danh mục $category->category_name";
        }
        return $alert;
    }

    function unique_filename($org_path, $num = 0)
    {

        if ($num > 0) {
            $info = pathinfo($org_path);
            $path = $info['dirname'] . "/" . $info['filename'] . "_" . $num;
            if (isset($info['extension'])) $path .= "." . $info['extension'];
        } else {
            $path = $org_path;
        }

        if (file_exists($path)) {
            $num++;
            return $this->unique_filename($org_path, $num);
        } else {
            return $path;
        }
    }

    public function checkImage($file, $dir)
    {
        $errors = [];

        if (!isset($file)) {
            $errors[] = "Không có dữ liệu";
        }

        if ($file['error'] != 0) {
            $errors[] = "Dữ liệu upload bị lỗi";
        }

        $target_dir    = $dir;

        $target_file   = $target_dir . basename($file["name"]);

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        $maxfilesize   = 800000;

        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

        $check = getimagesize($file["tmp_name"]);
        if ($check == false) {
            $errors[] = "Không phải file ảnh.";
        }

        if (file_exists($target_file)) {
            $target_file = $this->unique_filename($dir . basename($file["name"]));
            $fileName = array_reverse(explode('/', $target_file));
            $imageName = $fileName[0];
        } else {
            $imageName = basename($file["name"]);
        }

        if ($file["size"] > $maxfilesize) {
            $errors[] = "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
        }

        if (!in_array($imageFileType, $allowtypes)) {
            $errors[] = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
        }

        if (!empty($errors)) {
            $errors = $errors[0];
        }
        return [
            'errors' => $errors,
            'imageName' => $imageName,
            'target_file' => $target_file
        ];
    }

    public function checkMultiImage($file, $dir)
    {
        $errors = [];
        $imageNames = [];
        $target_files = [];

        for ($i = 0; $i < count($file['name']); $i++) {
            if ($file['error'][$i] != 0) {
                $errors[] = "Dữ liệu upload bị lỗi";
            }

            $target_dir    = $dir;

            $target_file   = $target_dir . basename($file["name"][$i]);

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $maxfilesize   = 800000;

            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


            $check = getimagesize($file["tmp_name"][$i]);
            if ($check == false) {
                $errors[] = "Không phải file ảnh.";
            }

            if (file_exists($target_file)) {
                $target_file = $this->unique_filename($dir . basename($file["name"][$i]));
                $fileName = array_reverse(explode('/', $target_file));
                $imageNames[] = $fileName[0];
            } else {
                $imageNames[] = basename($file["name"][$i]);
            }

            if ($file["size"][$i] > $maxfilesize) {
                $errors[] = "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            }

            if (!in_array($imageFileType, $allowtypes)) {
                $errors[] = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            }
            $target_files[] = $target_file;

            if (!empty($errors)) {
                $errors = $errors[0];
            }
        }

        return [
            'errors' => $errors,
            'imageNames' => $imageNames,
            'target_files' => $target_files,
        ];
    }
    // function resize_image_to_width($new_width, $image, $width, $height)
    // {
    //     $ratio = $new_width / $width;
    //     $new_height = $height * $ratio;
    //     return $this->resize_image($new_width, $new_height, $image, $width, $height);
    // }
    // function resize_image_to_height($new_height, $image, $width, $height)
    // {
    //     $ratio = $new_height / $height;
    //     $new_width = $width * $ratio;
    //     return $this->resize_image($new_width, $new_height, $image, $width, $height);
    // }
    // function scale_image($scale, $image, $width, $height)
    // {
    //     $new_width = $width * $scale;
    //     $new_height = $height * $scale;
    //     return $this->resize_image($new_width, $new_height, $image, $width, $height);
    // }
    function loadImage($filename, $type)
    {
        if ($type == IMAGETYPE_JPEG) {
            $image = imagecreatefromjpeg($filename);
        } elseif ($type == IMAGETYPE_PNG) {
            $image = imagecreatefrompng($filename);
        } elseif ($type == IMAGETYPE_GIF) {
            $image = imagecreatefromgif($filename);
        }
        return $image;
    }
    function resizeImage($newWidth, $newHeight, $image, $width, $height)
    {
        $new_image = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($new_image, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        return $new_image;
    }
    function saveImage($newImage, $newFilename, $newType = 'jpeg', $quality = 80)
    {
        if ($newType == 'jpeg') {
            imagejpeg($newImage, $newFilename, $quality);
        } elseif ($newType == 'png') {
            imagepng($newImage, $newFilename);
        } elseif ($newType == 'gif') {
            imagegif($newImage, $newFilename);
        }
    }
    public function fixImage($filename, $newWith, $newHeight, $newType = 'jpeg', $quality = 80)
    {
        list($width, $height, $type) = getimagesize($filename);
        $oldImage = $this->loadImage($filename, $type);
        $newImage = $this->resizeImage($newWith, $newHeight, $oldImage, $width, $height);
        $this->saveImage($newImage, $filename, $newType, $quality);
    }

    public function sendMail($subject, $body, $addressTo)
    {
        $mail = new PHPMailer(true);

        // try {
        // Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thang111220@gmail.com';                //SMTP username
        $mail->Password   = 'matran001';                            //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;
        $mail->CharSet   = "utf-8";                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->setFrom('thang111220@gmail.com', 'TechOfTTVV');

        if (is_array($addressTo)) {
            foreach ($addressTo as $item) {
                $mail->addAddress($item);                              //Name is optional
                $mail->addReplyTo($item);
                $mail->Subject = $subject;                                  //'This is the HTML message body <b>in bold!</b>';
                $mail->Body    = $body;                                     //'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                $mail->clearAddresses();
            }
        }

        if (is_string($addressTo)) {
            $mail->addAddress($addressTo);                              //Name is optional
            $mail->addReplyTo($addressTo);
            $mail->Subject = $subject;                                  //'This is the HTML message body <b>in bold!</b>';
            $mail->Body    = $body;                                     //'This is the body in plain text for non-HTML mail clients';
            if ($mail->send()) {
                return true;
            } else
                return false;
        }
    }

    function password_strength_check($password, $min_len = 8, $max_len = 70, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1)
    {
        // Build regex string depending on requirements for the password
        $regex = '/^';
        if ($req_digit == 1) {
            $regex .= '(?=.*\d)';
        }              // Match at least 1 digit
        if ($req_lower == 1) {
            $regex .= '(?=.*[a-z])';
        }           // Match at least 1 lowercase letter
        if ($req_upper == 1) {
            $regex .= '(?=.*[A-Z])';
        }           // Match at least 1 uppercase letter
        if ($req_symbol == 1) {
            $regex .= '(?=.*[^a-zA-Z\d])';
        }    // Match at least 1 character that is none of the above
        $regex .= '.{' . $min_len . ',' . $max_len . '}$/';

        if (preg_match($regex, $password)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
