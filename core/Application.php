<?php

namespace app\core;
class Application
{
    public static Application $app;
    public Session $session;
    public Request $request;
    public Response $response;
    public View $view;
    public ?Controller $controller = null;
    public Router $router;

    public function __construct()
    {
        self::$app = $this;
        $this->session = new Session();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->view->renderView('_error', [
                'exception' => $e,
            ], 'error');
        }
    }
}
