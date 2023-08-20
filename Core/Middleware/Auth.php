<?php

namespace Core\Middleware;

use Core\Session;

class Auth
{
    public static function handle()
    {
        if (!Session::has('user') ?? false) {
            redirect('/login');
        }
    }
}