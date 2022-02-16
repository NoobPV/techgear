<?php

namespace app\core\exception;

class ForbiddenException extends \Exception
{
    protected $message = 'Bạn không có quyền truy cập trang <br/> 
                          Đăng nhập để truy cập trang';
    protected $code = 403;
}
