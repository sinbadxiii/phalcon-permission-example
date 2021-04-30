<?php

declare(strict_types=1);

namespace App\Security;

use Sinbadxiii\PhalconPermission\Middlewares\Permissive as PermissionMiddleware;

/**
 * Class Permissive
 * @package App\Security
 */
class Permissive extends PermissionMiddleware
{
    public function redirectTo()
    {
        if ($this->request->isAjax()) {
            $this->response->setJsonContent([
                'success' => false,
                'message' => "You do not have permission to access this function"
            ]);
     //       $this->response->setStatusCode(403);
            return $this->response->send();
        }

        $this->dispatcher->forward(
            [
                'controller' => 'error',
                'action' => 'error403'
            ]
        );
    }
}