<?php

namespace app\core\exception;

class NotFoundData extends \Exception
{
    protected $message = 'Không tìm thấy dữ liệu';
    protected $code = '';
}
