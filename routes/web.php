<?php

require "../bootstrap/bootstrap.php";

use app\classes\Layout;
use app\classes\Routes;
use app\classes\Uri;

$code = Uri::make(Uri::load());

empty($code[2]) ? $code[2] = '' : $code[2];

$routes = [

    '/'                             => 'app/controllers/dashboard',
    '/profile'                      => 'app/controllers/profile',
    '/user_create'                  => 'app/controllers/user_create',
    '/user_search/' . $code[2] . '' => 'app/controllers/user_search',
    '/user_edit/' . $code[2] . ''   => 'app/controllers/user_edit',
    '/user_delete/' . $code[2] . '' => 'app/controllers/user_delete',
];

$uri = Uri::load();

$layout = new Layout;

require Routes::load($routes, $uri);

require $layout->master('layout');
