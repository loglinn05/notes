<?php

use Core\Response;
use Core\Session;

function dd($var): void
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

function isCurrentPage($uri): bool
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] == $uri;
}

function makeLinkActive($uri): void
{
    echo isCurrentPage($uri) ?
        "active" :
        "";
}

function setAriaCurrent($uri): void
{
    echo isCurrentPage($uri) ?
        'aria-current="page"' :
        "";
}

function abort($code = Response::NOT_FOUND): void
{
    http_response_code($code);

    require_once base_path("views/{$code}.php");

    die();
}

function authorize($condition, int $statusCode = Response::ACCESS_DENIED)
{
    if (!$condition) {
        abort($statusCode);
    } else {
        return true;
    }
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($viewName, $attributes = []): void
{
    extract($attributes);
    include base_path("views/" . $viewName);
}

function cleanString($string): string
{
    return trim(htmlspecialchars(strip_tags($string)));
}

function redirect($path): void
{
    header("Location: {$path}");
    exit();
}

function old($key, $default = ''): mixed
{
    return Session::old($key, $default);
}