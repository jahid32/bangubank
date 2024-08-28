<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('home', new Route('/', [
    '_controller' => 'App\Controllers\PageController::index',
]));
$routes->add('user_profile', new Route('/user/profile', [
    '_controller' => 'App\Controllers\UserController::edit',
]));

$routes->add('user', new Route('/user', [
    '_controller' => 'App\Controllers\UserController::index',
]));



$routes->add('login', new Route('/login', [
    '_controller' => 'App\Controllers\PageController::login',
]));