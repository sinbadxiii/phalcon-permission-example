<?php

declare(strict_types=1);

use Sinbadxiii\PhalconAuth\Middlewares\Accessicate;

class ProductsController extends ControllerBase implements Accessicate
{
    protected bool $authAccess = true;

    public function indexAction()
    {
    }

    public function showAction()
    {
    }

    public function authAccess(): bool
    {
        return $this->authAccess;
    }
}

