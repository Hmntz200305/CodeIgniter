<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->group('test', function ($routes) {
    $routes->get('/', 'Test::index');
    $routes->get('satu', 'Test::satu');
    // $routes->group('satu', function ($routes) {
    //     $routes->get('/', 'Test::satu');
    //     $routes->get('satusatu', 'Test::satusatu');
    // });
    $routes->get('dua', 'Test::dua');
    $routes->get('tiga', 'Test::tiga');
});
