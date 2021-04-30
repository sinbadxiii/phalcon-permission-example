<?php

class ErrorController extends ControllerBase
{
    protected bool $authAccess = false;

    public function error403Action()
    {
        $this->response->setStatusCode(403 , 'Forbidden');
        if ($this->request->isAjax() ) {
            $this->jsonResponse([ 'success' => false , 'message' => '403' ]);
        }
    }

    public function authAccess(): bool
    {
        return $this->authAccess;
    }
}

