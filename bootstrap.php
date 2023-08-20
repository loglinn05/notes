<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('db', function () {
    $config = require base_path("config.php");
    return new Database($config['database']);
});

$container->bind('commonMaxCharCount', function () {
    return 255;
});

App::setContainer($container);