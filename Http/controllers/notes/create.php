<?php

use Core\App;
use Core\Session;

$maxNoteBodyLength = App::resolve("commonMaxCharCount");

view("/notes/create.view.php", [
    "title" => "Create a note",
    "headerBannerText" => "Create a note",
    "maxNoteBodyLength" => $maxNoteBodyLength,
    "errors" => Session::get('errors', true) ?? []
]);