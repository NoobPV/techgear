<?php

namespace app\models;

use app\core\Model;

class Import extends Model
{
    public $id;
    public $product_id;
    public $quantity;
    public $created_at;
    public $updated_at;
}
