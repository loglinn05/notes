<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{
    public function __construct(public array $attributes)
    {
        $validator = new Validator();
        $validator->isEmptyString($this->attributes['email'], "email");
        $validator->isEmptyString($this->attributes['password'], "password");
        $validator->maxLengthLimitExceeded($this->attributes['email'], 255, "email");
        $validator->email($this->attributes['email'], "email");
        $this->errors = $validator->getErrors();
    }
}