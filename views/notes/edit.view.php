<?php

use Core\App;

view("partials/head.php", ["title" => $title]);
?>
<?php view("partials/nav.php"); ?>

<?php view("partials/header.php", ["headerBannerText" => $headerBannerText]); ?>

    <main class="container-fluid mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12 mx-auto my-auto">
                <form method="post" action="/note">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <?php
                    view("partials/components/note-body-textarea.php", [
                        "maxCharCount" => App::resolve("commonMaxCharCount"),
                        "value" => $note['body'] ?? '',
                        "marginBottom" => true
                    ])
                    ?>
                    <div class="d-flex justify-content-end mt-1">
                        <a href="/note?id=<?= $note['id'] ?>" class="btn btn-secondary me-3">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <?php view("partials/validation-errors.php", ["errors" => $errors ?? []]) ?>
    </main>
<?php view("partials/footer.php"); ?>
<?php view("partials/foot.php"); ?>