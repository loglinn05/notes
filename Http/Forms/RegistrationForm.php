<?php


namespace Http\Forms;


use Core\App;
use Core\Validator;

class RegistrationForm extends Form
{
    public function __construct(public array $attributes)
    {
        $validator = new Validator();
        $validator->isEmptyString($this->attributes['name'], "name");
        $validator->isEmptyString($this->attributes['email'], "email");
        $validator->isEmptyString($this->attributes['password'], "password");
        $validator->maxLengthLimitExceeded($this->attributes['name'], 255, "name");
        $validator->maxLengthLimitExceeded($this->attributes['email'], 255, "email");
        $validator->maxLengthLimitExceeded($this->attributes['password'], 255, "password");
        $validator->minLengthLimitNotReached($this->attributes['password'], 7, "password");
        $validator->email($this->attributes['email'], "email");
        $validator->confirmed([
            'password' => $this->attributes['password'],
            'password_confirmation' => $this->attributes['password_confirmation']
        ], true);
        $this->errors = $validator->getErrors();
    }

    public static function checkIfUserExists($email)
    {
        $db = App::resolve("db");
        $query = "SELECT * FROM users WHERE email = ?";
        $user = $db->query($query, [$email])->find();

        return (bool)$user;
    }
}