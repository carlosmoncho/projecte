<?php

namespace BatoiPOP\Exceptions;

class passwordIsNotSame extends \Exception
{
    protected $field;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->message = $message." Les contrasenyes no son iguals";
        $this->field = $message;
    }

    public function getField(): mixed
    {
        return $this->field;
    }
}