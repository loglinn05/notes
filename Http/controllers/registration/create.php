<?php

use Core\Session;

view("register.view.php", [
    "title" => "Register",
    "headerBannerText" => "Register",
    'errors' => Session::get('errors', true) ?? []
]);