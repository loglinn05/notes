<?php

use Core\App;

view("partials/head.php", ["title" => $title]);
?>
<?php view("partials/nav.php"); ?>

<?php view("partials/header.php", ["headerBannerText" => $headerBannerText]); ?>

    <main class="container-fluid mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12 mx-auto my-auto">
                <form method="post" action="/notes">
                    <?php
                    view("partials/components/note-body-textarea.php", [
                        "maxCharCount" => App::resolve("commonMaxCharCount"),
                        "value" => old('noteBody'),
                        "marginBottom" => true
                    ])
                    ?>
                    <div class="d-flex justify-content-end">
                        <a href="/notes" class="btn btn-secondary me-3">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <?php view("partials/validation-errors.php", ["errors" => $errors ?? []]) ?>
    </main>
<?php view("partials/footer.php"); ?>
<?php view("partials/foot.php"); ?>