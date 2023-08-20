<?php

use Core\App;
use Core\Session;
use Http\Forms\NoteForm;

$currentUserId = Session::get("user")["id"];

$note = NoteForm::authorizeAction($_GET['id'], $currentUserId);

view("/notes/show.view.php", [
    "title" => "Note",
    "headerBannerText" => "Note",
    "note" => $note
]);