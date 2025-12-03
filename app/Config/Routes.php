<?php

    use CodeIgniter\Router\RouteCollection;


    /**
     * @var RouteCollection $routes
     */

    /**
     * /
     * /blank
     */
    $routes->get('/', 'Home::index');
    $routes->get('/blank', 'Home::blank');

    /**
     * /register
     */
    $routes->get('/register', 'AuthController::register');
    $routes->post('/register', 'AuthController::store');

    /**
     * /login
     */
    $routes->get('/login', 'AuthController::login');
    $routes->post('/login', 'AuthController::auth');

    /**
     * /logout
     */
    $routes->get('/logout', 'AuthController::logout');

    /**
     * /forgot-password
     */
    $routes->get('/forgot-password', 'Auth\PasswordController::showForgot');
    $routes->post('/forgot-password', 'Auth\PasswordController::sendResetLink');

    /**
     * /reset-password
     */
    $routes->get('/reset-password/(:any)', 'Auth\PasswordController::showReset/$1');
    $routes->post('/reset-password', 'Auth\PasswordController::resetPassword');

    /**
     * /dashboard
     */
    $routes->get('/dashboard', 'Dashboard\HomeController::index');

    /**
     * /dashboard/categories
     */
    $routes->get('/dashboard/categories', 'Dashboard\CategorieController::index');
    $routes->get('/dashboard/categories/create', 'Dashboard\CategorieController::create');
    $routes->post('/dashboard/categories/store', 'Dashboard\CategorieController::store');
    $routes->get('/dashboard/categories/edit/(:num)', 'Dashboard\CategorieController::edit/$1');
    $routes->post('/dashboard/categories/update/(:num)', 'Dashboard\CategorieController::update/$1');
    $routes->get('/dashboard/categories/delete/(:num)', 'Dashboard\CategorieController::delete/$1');

    /**
     * /dashboard/tags
     */
    $routes->get('dashboard/tags', 'Dashboard\TagController::index');
    $routes->get('dashboard/tags/create', 'Dashboard\TagController::create');
    $routes->post('dashboard/tags/store', 'Dashboard\TagController::store');
    $routes->get('dashboard/tags/edit/(:num)', 'Dashboard\TagController::edit/$1');
    $routes->post('dashboard/tags/update/(:num)', 'Dashboard\TagController::update/$1');
    $routes->get('dashboard/tags/delete/(:num)', 'Dashboard\TagController::delete/$1');
