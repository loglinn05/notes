<?php

use Core\App;
use Core\Authenticator;
use Core\Container;
use Core\Database;
use Http\Forms\LoginForm;

const BASE_PATH = __DIR__ . "/../../";

require_once BASE_PATH . "Core/functions.php";
require_once BASE_PATH . "bootstrap.php";

test('attempt to login a user', function () {
    if (!session_id()) {
        session_start();
    }

    $attributes = [
        'email' => "amy.jane@gmail.com",
        'password' => "mpEF33$%"
    ];

    $form = LoginForm::validate($attributes);

    expect($form)->toBeObject("Login form validation failed.");

    $signedIn = (new Authenticator())->attempt($attributes['email'], $attributes['password']);

    expect($signedIn)->toBeTrue("Login attempt failed.");
});
