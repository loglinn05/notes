<?php

\Core\Authenticator::logout();

header('Location: /');
exit();