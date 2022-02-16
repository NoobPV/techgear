<?php

namespace app\models;

use app\core\Model;

class Product extends Model
{
    const OUT_OF_STOCKING = 0;
    const STOCKING = 1;

    public $id;
    public $product_code;
    public $product_name;
    public $image;
    public $description;
    public $standard_cost;
    public $list_price;
    public $status;
    public $is_new;
    public $category_id;
    public $created_at;
    public $updated_at;
}
