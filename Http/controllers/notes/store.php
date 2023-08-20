<?php

use Core\App;
use Core\Session;
use Http\Forms\NoteForm;

$db = App::resolve("db");

$noteBody = $_POST['body'];
$noteBody = cleanString($noteBody);

$form = NoteForm::validate([
    "body" => $noteBody
]);

$currentUserId = Session::get("user")["id"];

$db->query('INSERT INTO notes (body, user_id) VALUES (?, ?);', [
    $noteBody,
    $currentUserId
]);
redirect('/notes');