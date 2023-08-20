<label for="note-body" class="form-label">Note body</label>
<textarea id="note-body" class="form-control" name="body" rows="3"><?= $value ?></textarea>
<p class="char-counter form-text m-0 text-end <?= $marginBottom ? "mb-3" : "" ?>">
    <span class="num-of-entered-chars">0</span>/<span class="max-num-of-chars"><?= $maxCharCount ?></span>
</p>
<script type="module">
    import {countCharacters} from "/assets/js/character-count.js";
    document.addEventListener("DOMContentLoaded", function () {
        let noteBodyInput = document.getElementById("note-body");
        countCharacters(noteBodyInput, false);
        noteBodyInput.addEventListener("input", countCharacters.bind(null, noteBodyInput, false));
    })
</script>