<div class="input-group custom-password">
    <input type="password" class="form-control custom-password-input"
           id="<?= $id ?? "password" ?>" name="<?= $name ?? "password" ?>" placeholder="<?= $placeholder ?? "Password" ?>">
    <button class="btn btn-primary custom-password-button">
        <i class="fa-solid fa-eye"></i>
    </button>
</div>
<p class="char-counter form-text m-0 text-end <?= $marginBottom ? "mb-3" : "" ?>">
    <span class="num-of-entered-chars">0</span>/<span class="max-num-of-chars"><?= $maxCharCount ?></span>
</p>

<script type="module">
    import {countCharacters} from "/assets/js/character-count.js";
    import {showPassword} from "/assets/js/show-password.js";
    document.addEventListener("DOMContentLoaded", function () {
        let passwordInput = document.getElementById("<?= $id ?? "password" ?>");
        countCharacters(passwordInput, true);
        passwordInput.addEventListener("input", countCharacters.bind(null, passwordInput, true));
        passwordInput.nextElementSibling.addEventListener('click', showPassword.bind(null, passwordInput));
    })
</script>