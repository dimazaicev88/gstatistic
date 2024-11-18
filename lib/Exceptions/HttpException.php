<?php

namespace GStatistics\Exceptions;

use Exception;

class HttpException extends Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message);
    }

    public function __toString(): string
    {
        return $this->message;
    }
}