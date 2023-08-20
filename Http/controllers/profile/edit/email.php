<?php

use Core\App;
use Core\Session;

$id = Session::get("user")['id'];
$email = old('email', null) ?? Session::get("user")['email'];

view("/profile/edit/email.view.php", [
    "title" => "Edit e-mail",
    "headerBannerText" => "Edit your e-mail",
    "id" => $id,
    "email" => $email,
    "maxCharCount" => App::resolve("commonMaxCharCount"),
    "errors" => Session::get('errors', true) ?? []
]);