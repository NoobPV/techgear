<?php

namespace app\core\middlewares;

use app\controllers\MainController;
use app\core\Application;
use app\core\exception\NotFoundData;

class GetIdToShow extends BaseMiddleware
{
    protected array $actions = [];
    protected string $model;
    protected string $column;
    protected string $get;

    public function __construct($actions = [], $model, $column, $get)
    {
        $this->actions = $actions;
        $this->model = $model;
        $this->column = $column;
        $this->get = $get;
    }

    public function execute()
    {
        if (!isset($_GET[$this->get]) || !MainController::$ctrl->{$this->model}->find($this->column, $_GET[$this->get])) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new NotFoundData();
            }
        }
    }
}
