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
