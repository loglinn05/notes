<?php

use Core\App;
use Core\Router;
use Core\Session;
use Core\ValidationException;
use Http\Forms\NoteForm;

session_start();

const BASE_PATH = __DIR__ . "/../";
require_once BASE_PATH . "Core/functions.php";

require_once base_path("vendor/autoload.php");

require_once base_path('bootstrap.php');

$router = new Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $e) {
    Session::flash('errors', $e->errors);
    Session::flash('old', $e->old);

    redirect(Router::previousUrl());
}

Session::unflash();