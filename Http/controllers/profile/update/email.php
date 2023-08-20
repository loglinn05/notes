<?php

use Core\App;
use Core\Session;
use Http\Forms\ProfileEmailEditionForm;

$db = App::resolve("db");
$currentUserId = Session::get("user")["id"];

$email = $_POST['email'];
$email = cleanString($email);

$form = ProfileEmailEditionForm::validate([
    "email" => $email
]);

$db->query('UPDATE users SET email = :email WHERE id = :id', [
    'id' => $currentUserId,
    'email' => $email
]);

Session::put("user", array_merge(Session::get("user"), ["email" => $email]));

redirect('/profile/edit');