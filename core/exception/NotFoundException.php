<?php

namespace app\core\exception;
class NotFoundException extends \Exception
{
    protected $message = 'Không tìm thấy trang';
    protected $code = 404;
}