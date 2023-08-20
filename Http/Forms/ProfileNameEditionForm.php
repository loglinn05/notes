<?php

namespace Http\Forms;

use Core\Validator;

class ProfileNameEditionForm extends Form
{
    public function __construct(public array $attributes)
    {
        $validator = new Validator();
        $validator->isEmptyString($this->attributes['name'], "name");
        $validator->maxLengthLimitExceeded($this->attributes['name'], 255, "name");
        $this->errors = $validator->getErrors();
    }
}