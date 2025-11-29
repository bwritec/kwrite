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
