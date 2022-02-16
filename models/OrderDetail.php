<?php

namespace app\models;

use app\core\Model;

class OrderDetail extends Model
{
    public $id;
    public $order_id;
    public $product_id;
    public $quantity;
    public $unit_price;
    public $date_allocated;

}
