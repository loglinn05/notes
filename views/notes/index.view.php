<?php
view("partials/head.php", ["title" => $title]);
?>
<?php view("partials/nav.php"); ?>

<?php view("partials/header.php", ["headerBannerText" => $headerBannerText]); ?>

    <main class="container-fluid mb-3">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-center">
                <a href="/notes/create" class="btn btn-primary me-2">
                    Create a note
                </a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#clearNotesConfirmationModal">Clear notes</button>
            </div>
        </div>
        <?php if (count($notes) > 0) : ?>
            <div class="row d-flex justify-content-center align-items-stretch flex-wrap px-sm-0 px-4">
                <?php foreach ($notes as $note) : ?>
                    <div class="d-inline-flex card col-xxl-2 col-xl-3 col-md-4 col-sm-6 col-12 m-2">
                        <div class="card-body">
                            <a href="/note?id=<?= $note['id'] ?>">
                                <?= $note['body'] ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="modal fade" id="clearNotesConfirmationModal" tabindex="-1"
             aria-labelledby="clearNotesConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="clearNotesConfirmationModalLabel">Confirm your decision</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to delete all your notes?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php view("partials/footer.php"); ?>
<?php view("partials/foot.php"); ?>