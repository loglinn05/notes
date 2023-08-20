<?php

use Core\App;
use Core\Session;
use Http\Forms\NoteForm;

$db = App::resolve("db");
$currentUserId = Session::get("user")["id"];
$maxNoteBodyLength = App::resolve("commonMaxCharCount");

$noteId = $_POST['id'];
$noteBody = $_POST['body'];
$noteBody = cleanString($noteBody);

NoteForm::authorizeAction($noteId, $currentUserId);

$form = NoteForm::validate([
    "id" => $noteId, // this attribute won't be validated, it will only be passed to the view
    "body" => $noteBody
]);

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'id' => $noteId,
    'body' => $noteBody
]);

redirect('/notes');