<?php

    use CodeIgniter\Router\RouteCollection;


    /**
     * @var RouteCollection $routes
     */

    /**
     * /
     * /blank
     * /product/:id
     */
    $routes->get('/', 'HomeController::index');
    $routes->get('/blank', 'HomeController::blank');
    $routes->get('/product/(:num)', 'ProductController::show/$1');

    /**
     * /frete/calcular
     */
    $routes->get('/frete/calcular', 'FreteController::calcular');

    /**
     * Favorites
     */
    $routes->post('/favorites/add',    'FavoriteController::add');
    $routes->post('/favorites/remove', 'FavoriteController::remove');

    /**
     * /register
     */
    $routes->get('/register', 'RegisterController::index');
    $routes->post('/register', 'RegisterController::store');

    /**
     * /login
     * /logout
     */
    $routes->get('/login', 'LoginController::index');
    $routes->post('/login', 'LoginController::auth');
    $routes->get('/logout', 'LoginController::logout');

    /**
     * /forgot
     * /reset
     */
    $routes->get('/forgot', 'PasswordController::forgot');
    $routes->post('/forgot', 'PasswordController::sendResetLink');
    $routes->get('/reset/(:segment)', 'PasswordController::reset/$1');
    $routes->post('/reset-password', 'PasswordController::updatePassword');

    /**
     * /dashboard
     */
    $routes->get('/dashboard', 'DashboardController::index');

    /**
     * /dashboard/contact
     */
    $routes->get('/dashboard/contact', 'PhoneController::index');
    $routes->post('/dashboard/contact', 'PhoneController::save');

    /**
     * /dashboard/address
     */
    $routes->get('/dashboard/address', 'AddressController::index');
    $routes->post('/dashboard/address', 'AddressController::save');

    /**
     * /dashboard/categories
     */
    $routes->get('/dashboard/categories', 'CategoryController::index');
    $routes->get('/dashboard/categories/create', 'CategoryController::create');
    $routes->post('/dashboard/categories/store', 'CategoryController::store');
    $routes->get('/dashboard/categories/edit/(:num)', 'CategoryController::edit/$1');
    $routes->post('/dashboard/categories/update/(:num)', 'CategoryController::update/$1');
    $routes->get('/dashboard/categories/delete/(:num)', 'CategoryController::delete/$1');

    /**
     * /dashboard/sell
     */
    $routes->get('/dashboard/sell', 'SellController::index', ['filter' => 'auth']);
    $routes->post('/dashboard/sell/store', 'SellController::store', ['filter' => 'auth']);

    /**
     * /dashboard/products
     */
    $routes->get('/dashboard/products', 'ProductsController::index', ['filter' => 'auth']);
    $routes->get('/dashboard/products/delete/(:num)', 'ProductsController::delete/$1', ['filter' => 'auth']);

    /**
     * /dashboard/favorites
     */
    $routes->get('/dashboard/favorites',  'FavoriteController::list');