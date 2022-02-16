<?php

namespace app\models;

use app\core\Model;

class Export extends Model
{
    // const WARNING = 50; //Product almost out of stock
    // const DANGER = 20; //Product out of stock

    public $id;
    public $product_id;
    public $quantity;
    public $created_at;
    public $updated_at;
}
