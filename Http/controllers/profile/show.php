<?php

use Core\Session;

$currentUser = Session::get("user");

view("/profile/show.view.php", [
    "title" => "Profile",
    "headerBannerText" => "Profile",
    "user" => $currentUser
]);