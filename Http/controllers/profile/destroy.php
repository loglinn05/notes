<?php


use Core\App;
use Core\Authenticator;
use Core\Session;

$db = App::resolve("db");

$currentUserId = Session::get("user")["id"];

$query = "DELETE FROM users WHERE id = ?";
$db->query($query, [$currentUserId]);

Authenticator::logout();

redirect('/');