<?php

$router->get('/', 'index.php');

$router->get('/notes', 'notes/index.php')->only('auth');

$router->delete('/notes', 'notes/clear.php')->only('auth');

$router->get('/note', 'notes/show.php')->only('auth');

$router->delete('/note', 'notes/destroy.php')->only('auth');

$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');

$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'login/create.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');
$router->delete('/logout', 'login/destroy.php')->only('auth');

$router->get('/profile', 'profile/show.php')->only('auth');
$router->delete('/profile', 'profile/destroy.php')->only('auth');

$router->get('/profile/edit', 'profile/edit/index.php')->only('auth');
$router->get('/profile/edit/name', 'profile/edit/name.php')->only('auth');
$router->get('/profile/edit/email', 'profile/edit/email.php')->only('auth');
$router->get('/profile/edit/password', 'profile/edit/password.php')->only('auth');

$router->patch('/profile/update/name', 'profile/update/name.php')->only('auth');
$router->patch('/profile/update/email', 'profile/update/email.php')->only('auth');
$router->patch('/profile/update/password', 'profile/update/password.php')->only('auth');