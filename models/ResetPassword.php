<?php

namespace app\models;

use app\core\Model;

class ResetPassword extends Model
{
    public $id;
    public $email;
    public $token;
    public $num_check;
    public $time;
}
