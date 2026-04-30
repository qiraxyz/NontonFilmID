<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes (ga perlu auth check)
$routes->group('', function ($routes) {
    $routes->get('/auth-user', 'AuthController::index');
    $routes->post('/auth/register', 'AuthController::register');
    $routes->post('/auth/login', 'AuthController::login');
    $routes->get('/auth/logout', 'AuthController::logout');
    $routes->get('/auth/google', 'AuthController::googleRedirect');
    $routes->get('/auth/google/callback', 'AuthController::googleCallback');
});

// auth check login user (ini wajib woi biar DRY = don't repeat yourself)
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/seat', 'SeatController::index');
    $routes->get('/', 'HomeController::index');
});

$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/dashboard-detail', 'DashboardController::detail');