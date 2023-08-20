<?php

use Core\Session;

view("login.view.php", [
    "title" => "Log In",
    "headerBannerText" => "Log In",
    "errors" => Session::get('errors', true) ?? []
]);