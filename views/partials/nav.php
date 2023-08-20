<nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-center px-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-lg-0 mb-2">
            <li class="nav-item text-center">
                <a href="/"
                   class="nav-link <?php makeLinkActive('/'); ?>"
                    <?php setAriaCurrent('/'); ?>>Home</a>
            </li>
            <?php if (\Core\Session::has('user') ?? false) : ?>
                <li class="nav-item text-center">
                    <a href="/notes"
                       class="nav-link <?php makeLinkActive('/notes'); ?>"
                        <?php setAriaCurrent('/notes'); ?>>Notes</a>
                </li>
            <?php endif; ?>
        </ul>
        <div class="navbar-nav">
            <?php if (\Core\Session::has('user') ?? false) : ?>
                <li class="nav-item text-center">
                    <p class="navbar-text mb-0 me-lg-3">Hey, <a href="/profile"><?= \Core\Session::get('user')['name'] ?></a>!</p>
                </li>
                <li class="nav-item text-center">
                    <form action="/logout" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-secondary">Log Out</button>
                    </form>
                </li>
            <?php else : ?>
                <li class="nav-item text-center">
                    <a href="/login"
                       class="nav-link <?php makeLinkActive('/login'); ?>"
                        <?php setAriaCurrent('/login'); ?>>Log In</a>
                </li>
                <li class="nav-item text-center">
                    <a href="/register"
                       class="nav-link <?php makeLinkActive('/register'); ?>"
                        <?php setAriaCurrent('/register'); ?>>Register</a>
                </li>
            <?php endif; ?>
        </div>
    </div>
</nav>