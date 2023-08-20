<input type="email" class="form-control" id="email" name="email"
       placeholder="jane@example.com" value="<?= $value ?>">
<p class="char-counter form-text m-0 text-end <?= $marginBottom ? "mb-3" : "" ?>">
    <span class="num-of-entered-chars">0</span>/<span class="max-num-of-chars"><?= $maxCharCount ?></span>
</p>
<script type="module">
    import {countCharacters} from "/assets/js/character-count.js";
    document.addEventListener("DOMContentLoaded", function () {
        let emailInput = document.getElementById("email");
        countCharacters(emailInput, false);
        emailInput.addEventListener("input", countCharacters.bind(null, emailInput, false));
    })
</script>