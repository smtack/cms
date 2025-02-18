<?php

use App\Controllers\Admin\Auth;
use App\Controllers\Pages;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Pages::class, 'index']);

$routes->get('posts', [Pages::class, 'posts']);
$routes->get('posts/(:segment)', [Pages::class, 'post']);

// Admin Section
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('/', 'Admin::index', ['filter' => 'authFilter']);

    $routes->get('login', [Auth::class, 'login'], ['filter' => 'adminFilter']);
    $routes->post('login', [Auth::class, 'authenticate'], ['filter' => 'adminFilter']);
    $routes->get('logout', [Auth::class, 'logout']);

    $routes->presenter('posts', ['filter' => 'authFilter']);
});

// Pages
$routes->get('(:segment)', [Pages::class, 'view']);