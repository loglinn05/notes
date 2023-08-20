<?php
view("partials/head.php", ["title" => $title]);
?>
<?php view("partials/nav.php"); ?>

<?php view("partials/header.php", ["headerBannerText" => $headerBannerText]); ?>

    <main class="container-fluid mb-5">
        <div class="row d-flex flex-column align-content-center px-sm-0 px-4">
            <div class="card col-lg-4 col-md-6 col-sm-8 col-12">
                <div class="card-body">
                    <h5>Note <?= $note['id'] ?></h5>
                    <p class="card-text"><?= $note['body'] ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="/note/edit?id=<?= $note['id'] ?>" class="btn btn-primary">Edit the note</a>
                        <form method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $note['id'] ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-4">
            <a class="col-md-2 col-sm-4 col-6 btn btn-primary btn-lg" href="/notes">All notes</a>
        </div>
    </main>
<?php view("partials/footer.php"); ?>
<?php view("partials/foot.php"); ?>