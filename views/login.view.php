<?php

use Core\App;

view("partials/head.php", ["title" => $title]);
?>
<?php view("partials/nav.php"); ?>

<?php view("partials/header.php", ["headerBannerText" => $headerBannerText]); ?>

    <main class="container-fluid mb-5">
        <div class="row">
            <form class="col-lg-4 col-md-6 col-sm-8 col-12 mx-auto" action="/login" method="POST">
                <?php
                view("partials/components/email-input.php", [
                    "maxCharCount" => App::resolve("commonMaxCharCount"),
                    "value" => old('email'),
                    "marginBottom" => true
                ])
                ?>
                <?php
                view("partials/components/password-input.php", [
                    "maxCharCount" => App::resolve("commonMaxCharCount"),
                    "marginBottom" => true
                ])
                ?>
                <div class="d-flex justify-content-between">
                    <p class="form-text m-0">Don't have an account?</p>
                    <a href="/register" class="form-text link-primary m-0">Register.</a>
                </div>
                <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Sign in</button>
            </form>
        </div>
        <?php view("partials/validation-errors.php", ["errors" => $errors ?? []]) ?>
    </main>
<?php view("partials/footer.php"); ?>
<?php view("partials/foot.php"); ?>