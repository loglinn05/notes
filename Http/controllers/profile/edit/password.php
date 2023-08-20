<?php

use Core\App;
use Core\Session;

$id = Session::get("user")['id'];

view("/profile/edit/password.view.php", [
    "title" => "Change password",
    "headerBannerText" => "Change your password",
    "id" => $id,
    "maxCharCount" => App::resolve("commonMaxCharCount"),
    "errors" => Session::get('errors', true) ?? []
]);