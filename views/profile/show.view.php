<?php
view("partials/head.php", ["title" => $title]);
?>
<?php view("partials/nav.php"); ?>

<?php view("partials/header.php", ["headerBannerText" => $headerBannerText]); ?>

    <main class="container-fluid mb-5">
        <div class="row d-flex flex-column align-content-center px-sm-0 px-4">
            <div class="card col-lg-4 col-md-6 col-sm-8 col-12 px-0">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name'] ?></h5>
                    <p class="card-text"><?= $user['email'] ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="/profile/edit" class="btn btn-primary">Edit profile</a>
                        <form method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button type="submit" class="btn btn-danger">Delete account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php view("partials/footer.php"); ?>
<?php view("partials/foot.php"); ?>