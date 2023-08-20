<?php

use Core\App;
use Core\Session;
use Http\Forms\ProfileNameEditionForm;

$db = App::resolve("db");
$currentUserId = Session::get("user")["id"];

$name = $_POST['name'];
$name = cleanString($name);

$form = ProfileNameEditionForm::validate([
    "name" => $name
]);

$db->query('UPDATE users SET name = :name WHERE id = :id', [
    'id' => $currentUserId,
    'name' => $name
]);

Session::put("user", array_merge(Session::get("user"), ["name" => $name]));

redirect('/profile/edit');