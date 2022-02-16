<?php

namespace app\models;

use app\core\Model;

class Order extends Model
{
    const PENDING = 1;
    const DELIVERING = 2;
    const SUCCESS = 3;
    const CANCEL = 4;

    public $id;
    public $customer_id;
    public $shipped_date;
    public $ship_address;
    public $payment_type_id;
    public $paid_date;
    public $status;
    public $comment;
    public $created_at;
    public $updated_at;
}
