<?php

namespace DelisendApi\Exceptions;

use Psr\Http\Message\RequestInterface;

class RequestException extends DelisendException
{
    private $request;

    public function setRequest(RequestInterface $request)
    {
        $this->request = $request;

        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }
}