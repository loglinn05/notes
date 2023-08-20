<?php

use Core\Session;

$currentUser = Session::get("user");

view("/profile/edit/index.view.php", [
    "title" => "Edit profile",
    "headerBannerText" => "Edit profile",
    "user" => $currentUser
]);