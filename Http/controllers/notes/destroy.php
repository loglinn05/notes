<?php

use Core\App;
use Core\Session;
use Http\Forms\NoteForm;

$db = App::resolve("db");

$currentUserId = Session::get("user")["id"];

NoteForm::authorizeAction($_POST['id'], $currentUserId);

$query = "DELETE FROM notes WHERE id = ?";
$db->query($query, [$_POST['id']]);

redirect('/notes');