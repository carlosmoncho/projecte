<?php

namespace BatoiPOP\Exceptions;

class isNotAnImageFile extends \Exception
{
    protected $field;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->message = $message." no es una imagen ";
        $this->field = $message;
    }

    public function getField(): mixed
    {
        return $this->field;
    }
}