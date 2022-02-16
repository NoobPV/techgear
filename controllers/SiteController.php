<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;

class SiteController extends Controller
{
    public MainController $ctrl;

    public function __construct()
    {
        $this->ctrl = new MainController();
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function about()
    {
        return $this->render('about', []);
    }

    public function contact(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $data = $request->getBody();
            $this->ctrl->contactModel->save($data);
            Application::$app->session->setFlash('success', 'Bạn đã gửi phản hồi thành công');
        }
        return $this->render('contact', []);
    }

    public function profile(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $customer = $request->getBody();

            $valid = true;
            $errors = [];
            if (filter_var($customer['email'], FILTER_VALIDATE_EMAIL) == false) {
                $valid = false;
                $errors[] = 'Invalid email address';
            } else {
                $customer['email'] = strtolower($customer['email']);
            }
            if ($valid == true) {
                $this->ctrl->customerModel->save($customer);
                Application::$app->session->setFlash('success', 'Bạn đã sửa thông tin thành công');
                $response->redirect('/profile');
            } else {
                return $this->render('profile', [
                    'errors' => $errors,
                ]);
            }
        }
        return $this->render('profile');
    }
}
