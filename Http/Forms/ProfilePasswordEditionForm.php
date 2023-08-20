<?php

namespace Http\Forms;

use Core\Validator;

class ProfilePasswordEditionForm extends Form
{
    public function __construct(public array $attributes)
    {
        $validator = new Validator();
        $validator->isEmptyString($this->attributes['password'], "password");
        $validator->maxLengthLimitExceeded($this->attributes['password'], 255, "password");
        $validator->minLengthLimitNotReached($this->attributes['password'], 7, "password");
        $validator->confirmed($this->attributes, true);
        $this->errors = $validator->getErrors();
    }
}