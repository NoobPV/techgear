<?php

namespace app\core;

use app\core\middlewares\BaseMiddleware;

class Controller
{
    public string $action = '';
    protected array $middlewares = [];

    public function render($view, $params = [], $layout = 'user'): string
    {
        return Application::$app->view->renderView($view, $params, $layout);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
