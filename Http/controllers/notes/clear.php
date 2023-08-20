<?php

use Core\App;
use Core\Session;

$db = App::resolve("db");

$currentUserId = Session::get("user")["id"];

$query = "DELETE FROM notes WHERE user_id = ?";
$db->query($query, [$currentUserId]);

redirect('/notes');