<?php

namespace BatoiPOP\Exceptions;

use Throwable;

class RequiredField extends \Exception
{
    protected $field;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->message = $message." és requerid";
        $this->field = $message;
    }

    public function getField(): mixed
    {
        return $this->field;
    }

}