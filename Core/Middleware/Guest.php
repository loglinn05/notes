<?php

namespace Core\Middleware;

use Core\Session;

class Guest
{
    public static function handle()
    {
        if (Session::has('user') ?? false) {
            redirect('/');
        }
    }
}