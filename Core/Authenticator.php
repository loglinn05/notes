<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $db = App::resolve("db");
        $query = "SELECT * FROM users WHERE email = ?";

        $user = $db->query($query, [$email])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                static::login([
                    "id" => $user['id'],
                    "name" => $user['name'],
                    "email" => $user['email']
                ]);

                return true;
            }
        }
        return false;
    }

    public static function login($user) {
        Session::put('user', $user);
        session_regenerate_id(true);
    }

    public static function logout() {
        Session::destroy();
    }
}