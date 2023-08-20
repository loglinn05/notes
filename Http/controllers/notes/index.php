<?php

use Core\App;
use Core\Session;

$db = App::resolve("db");
$currentUserId = Session::get("user")["id"];

$query = "SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC";
$notes = $db->query($query, [$currentUserId])->all();

view("/notes/index.view.php", [
    "title" => "Notes",
    "headerBannerText" => "Notes",
    "notes" => $notes ?? []
]);