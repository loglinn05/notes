<input type="text" class="form-control" id="name" name="name"
       placeholder="Jane Doe" value="<?= $value ?>">
<p class="char-counter form-text m-0 text-end <?= $marginBottom ? "mb-3" : "" ?>">
    <span class="num-of-entered-chars">0</span>/<span class="max-num-of-chars"><?= $maxCharCount ?></span>
</p>
<script type="module">
    import {countCharacters} from "/assets/js/character-count.js";
    document.addEventListener("DOMContentLoaded", function () {
        let nameInput = document.getElementById("name");
        countCharacters(nameInput, false);
        nameInput.addEventListener("input", countCharacters.bind(null, nameInput, false));
    })
</script>