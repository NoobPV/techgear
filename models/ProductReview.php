<?php

namespace app\models;

use app\core\Model;

class ProductReview extends Model
{
    const SHOW = 1;
    const HIDDEN = 0;

    public $id;
    public $product_id;
    public $customer_id;
    public $rating;
    public $comment;
    public $status;
    public $created_at;
    public $updated_at;
}
