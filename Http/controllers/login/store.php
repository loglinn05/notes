<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$email = cleanString($email);
$password = cleanString($password);

$form = LoginForm::validate([
    'email' => $email,
    'password' => $password
]);

$signedIn = (new Authenticator())->attempt($email, $password);

if (!$signedIn) {
    $form->error("No matching account found for this email address and password.")->throw();
}

redirect('/');