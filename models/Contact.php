<?php

namespace app\models;

use app\core\Model;

class Contact extends Model
{
    public $id;
    public $email;
    public $full_name;
    public $body;
    public $created_at;
}
