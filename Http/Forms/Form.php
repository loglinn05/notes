<?php

namespace Http\Forms;

use Core\ValidationException;

class Form
{
    protected $errors = [];

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    protected function failed()
    {
        return count($this->errors());
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($message)
    {
        $this->errors[] = $message;

        return $this;
    }
}