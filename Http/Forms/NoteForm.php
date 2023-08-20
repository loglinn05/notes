<?php

namespace Http\Forms;

use Core\App;
use Core\Validator;

class NoteForm extends Form
{
    public function __construct(public array $attributes)
    {
        $maxNoteBodyLength = App::resolve("commonMaxCharCount");

        $validator = new Validator();
        $validator->isEmptyString($this->attributes["body"], "note body");
        $validator->maxLengthLimitExceeded($this->attributes["body"], $maxNoteBodyLength, "note body");

        $this->errors = $validator->getErrors();
    }

    public static function authorizeAction($noteId, $currentUserId)
    {
        $db = App::resolve("db");
        $query = "SELECT * FROM notes WHERE id = ?";
        $note = $db->query($query, [$noteId])->findOrFail();

        return authorize($note['user_id'] == $currentUserId) ? $note : null;
    }
}