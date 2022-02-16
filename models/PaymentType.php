<?php

namespace app\models;

use app\core\Model;

class PaymentType extends Model
{
    public $id;
    public $payment_name;
    public $description;
    public $image;
    public $created_at;
    public $updated_at;
}
