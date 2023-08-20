<?php
view("partials/head.php", ["title" => $title]);
?>
<?php view("partials/nav.php"); ?>

<?php view("partials/header.php", ["headerBannerText" => $headerBannerText]); ?>

    <main class="container-fluid mb-5">
        <div class="row d-flex flex-column align-content-center px-sm-0 px-4">
            <div class="card col-lg-4 col-md-6 col-sm-8 col-12 px-0 text-center">
                <div class="card-body">
                    <a href="/profile/edit/name" class="profile-edition-link">
                        <h5 class="card-title"><?= $user['name'] ?><i class="fa-solid fa-pen ps-2"></i></h5>
                    </a>
                    <hr>
                    <a href="/profile/edit/email" class="profile-edition-link">
                        <p class="card-text"><?= $user['email'] ?><i class="fa-solid fa-pen ps-2"></i></p>
                    </a>
                    <hr>
                    <a href="/profile/edit/password" class="btn btn-primary">
                        Change password
                    </a>
                </div>
            </div>
        </div>
    </main>
<?php view("partials/footer.php"); ?>
<?php view("partials/foot.php"); ?>