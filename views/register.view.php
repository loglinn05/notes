<?php

use Core\App;

view("partials/head.php", ["title" => $title]);
?>
<?php view("partials/nav.php"); ?>

<?php view("partials/header.php", ["headerBannerText" => $headerBannerText]); ?>

    <main class="container-fluid mb-5">
        <div class="row">
            <form class="col-xl-4 col-md-6 col-sm-8 col-12 mx-auto" action="/register" method="POST">
                <?php
                view("partials/components/name-input.php", [
                    "maxCharCount" => App::resolve("commonMaxCharCount"),
                    "value" => old('name'),
                    "marginBottom" => true
                ])
                ?>
                <?php
                view("partials/components/email-input.php", [
                    "maxCharCount" => App::resolve("commonMaxCharCount"),
                    "value" => old('email'),
                    "marginBottom" => false
                ])
                ?>
                <p class="form-text text-end mt-0 mb-3">Email should be valid and have up to 255 characters.</p>
                <?php
                view("partials/components/password-input.php", [
                    "maxCharCount" => App::resolve("commonMaxCharCount"),
                    "marginBottom" => true
                ])
                ?>
                <?php
                view("partials/components/password-input.php", [
                    "id" => "password-confirmation",
                    "name" => "password_confirmation",
                    "placeholder" => "Password confirmation",
                    "maxCharCount" => App::resolve("commonMaxCharCount"),
                    "marginBottom" => false
                ])
                ?>
                <p class="form-text mt-0 mb-3 text-end">Password should have 7 to 255 characters.</p>
                <div class="d-flex justify-content-between mb-4">
                    <p class="form-text m-0">Already have an account?</p>
                    <a href="/login" class="form-text link-primary m-0">Log In.</a>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
            </form>
        </div>
        <?php view("partials/validation-errors.php", ["errors" => $errors ?? []]) ?>
    </main>
<?php view("partials/footer.php"); ?>
<?php view("partials/foot.php"); ?>