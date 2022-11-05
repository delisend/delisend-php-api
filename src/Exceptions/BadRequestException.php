<?php

namespace DelisendApi\Exceptions;

class BadRequestException extends DelisendException
{
    public function __construct($message = '', $code = 0, $previous = null)
    {
        if (!$message) {
            $message = 'Impossible to connect, please check your Delisend Tracking Id and Auth Token.';
        }

        parent::__construct($message, $code, $previous);
    }
}