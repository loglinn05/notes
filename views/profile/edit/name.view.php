<?php

use Core\App;

view("partials/head.php", ["title" => $title]);
?>
<?php view("partials/nav.php"); ?>

<?php view("partials/header.php", ["headerBannerText" => $headerBannerText]); ?>

    <main class="container-fluid mb-5">
        <div class="row">
            <div class="col-xl-4 col-md-6 col-sm-8 col-12 mx-auto my-auto">
                <form method="post" action="/profile/update/name">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <?php
                    view("partials/components/name-input.php", [
                        "maxCharCount" => App::resolve("commonMaxCharCount"),
                        "value" => $name
                    ])
                    ?>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="/profile/edit" class="btn btn-secondary me-3">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <?php view("partials/validation-errors.php", ["errors" => $errors ?? []]) ?>
    </main>
<?php view("partials/footer.php"); ?>
<?php view("partials/foot.php"); ?>