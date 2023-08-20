<?php

use Core\App;
use Core\Session;

$id = Session::get("user")['id'];
$name = old('name', null) ?? Session::get("user")['name'];

view("/profile/edit/name.view.php", [
    "title" => "Edit name",
    "headerBannerText" => "Edit your name",
    "id" => $id,
    "name" => $name,
    "maxCharCount" => App::resolve("commonMaxCharCount"),
    "errors" => Session::get('errors', true) ?? []
]);