<?php

use Core\App;
use Core\Authenticator;
use Core\Session;
use Http\Forms\ProfilePasswordEditionForm;

$db = App::resolve("db");
$currentUserId = Session::get("user")["id"];

$password = $_POST['password'];
$password = cleanString($password);
$passwordConfirmation = $_POST['password_confirmation'];
$passwordConfirmation = cleanString($passwordConfirmation);

$form = ProfilePasswordEditionForm::validate([
    "password" => $password,
    "password_confirmation" => $passwordConfirmation
]);

$db->query('UPDATE users SET password = :password WHERE id = :id', [
    'id' => $currentUserId,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

Authenticator::logout();

redirect('/login');