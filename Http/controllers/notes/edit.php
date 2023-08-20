<?php

use Core\App;
use Core\Session;
use Http\Forms\NoteForm;

$maxNoteBodyLength = App::resolve("commonMaxCharCount");

if (!Session::has('note')) {
    $currentUserId = Session::get("user")["id"];
    $note = NoteForm::authorizeAction($_GET['id'], $currentUserId);
}

view("/notes/edit.view.php", [
    "title" => "Edit the note",
    "headerBannerText" => "Edit the note",
    "maxNoteBodyLength" => $maxNoteBodyLength,
    "note" => Session::get('old', true) ?? $note,
    "errors" => Session::get('errors', true) ?? []
]);