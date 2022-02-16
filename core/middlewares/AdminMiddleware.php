<?php

namespace app\core\middlewares;

use app\controllers\MainController;
use app\core\Application;
use app\core\exception\ForbiddenException;

class AdminMiddleware extends BaseMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        $admin = MainController::$ctrl->auth->getUser();
        if ($admin == false) {
            throw new ForbiddenException();
        } else {
            if ($admin->username != 'admin') {
                throw new ForbiddenException();
            }
        }
    }
}
