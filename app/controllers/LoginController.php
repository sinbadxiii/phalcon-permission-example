<?php

declare(strict_types=1);

use Sinbadxiii\PhalconAuth\Middlewares\Accessicate;

class LoginController extends ControllerBase implements Accessicate
{
    protected bool $authAccess = false;

    public function loginFormAction()
    {

    }

    public function loginAction()
    {
        $remember = $this->request->getPost('remember') ? true : false;

        if ($this->auth->attempt($this->credentials(), $remember)) {
            return $this->response->redirect("/admin");
        }
        $this->flashSession->error(
            "The username or password you entered is incorrect"
        );

        return $this->response->redirect("/login");
    }

    public function logoutAction()
    {
        $this->auth->logout();

        return $this->response->redirect(
            $this->url->get(['for' => 'login'], true)
        );
    }

    private function credentials()
    {
        $username = $this->request->getPost($this->usernameKey(), 'string');
        $password = $this->request->getPost('password', 'string');

        return [$this->usernameKey() => $username, 'password' => $password];
    }

    public function authAccess(): bool
    {
        return $this->authAccess;
    }

    public function usernameKey()
    {
        return 'email'; //or maybe for example username
    }
}