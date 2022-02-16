<?php

namespace app\core;

class View
{
    public string $title = '';

    public function renderView($view, array $params = [], $layout = null)
    {
        $viewContent = $this->renderViewOnly($view, $params, $layout);
        ob_start();
        include_once dirname(__DIR__) . "/views/layouts/$layout.php";
        $layoutContent = ob_get_clean();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderViewOnly($view, array $params = [], $layout = null)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once dirname(__DIR__) . "/views/$layout/$view.php";
        return ob_get_clean();
    }
}
