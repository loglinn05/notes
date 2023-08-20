<?php if (!empty($errors ?? [])) : ?>
    <div class="position-absolute top-0 end-0 mt-3 me-3">
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger alert-dismissible fade show me-2" role="alert">
                <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
