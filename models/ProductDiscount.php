<?php

namespace app\models;

use app\core\Model;

class ProductDiscount extends Model
{
    public $id;
    public $product_id;
    public $discount_name;
    public $discount_amount;
    public $start_date;
    public $end_date;
}
