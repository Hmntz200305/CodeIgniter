<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'Login::index');
$routes->post('login/process', 'Login::process');
$routes->get('logout', 'Login::logout');
$routes->get('/', 'Dashboard::index');
$routes->group('dataalternative', function ($routes) {
    $routes->get('/', 'DataAlternative::index');
    $routes->get('adddata', 'DataAlternative::adddata');
    $routes->post('adddata/addprocess', 'DataAlternative::addprocess');
    $routes->delete('deleteprocess/(:num)', 'DataAlternative::deleteprocess/$1');
    $routes->get('editdata/(:num)', 'DataAlternative::editdata/$1');
    $routes->post('editdata/editdataprocess/(:num)', 'DataAlternative::editDataprocess/$1');
});
$routes->group('datacriteria', function ($routes) {
    $routes->get('/', 'DataCriteria::index');
    $routes->get('adddata', 'DataCriteria::adddata');
    $routes->post('adddata/addprocess', 'DataCriteria::addprocess');
    $routes->delete('deleteprocess/(:num)', 'DataCriteria::deleteprocess/$1');
    $routes->get('editdata/(:num)', 'DataCriteria::editdata/$1');
    $routes->post('editdata/editdataprocess/(:num)', 'DataCriteria::editDataprocess/$1');
});
$routes->group('dataassessment', function ($routes) {
    $routes->get('/', 'DataAssessment::index');
    $routes->get('adddata', 'DataAssessment::adddata');
    $routes->get('editdata', 'DataAssessment::editdata');
});
$routes->get('calculationprocess', 'CalculationProcess::index');
$routes->get('decissionresult', 'DecissionResult::index');
$routes->group('usersdata', function ($routes) {
    $routes->get('/', 'UsersData::index');
    $routes->get('addusers', 'UsersData::addusers');
    $routes->get('editusers', 'UsersData::editusers');
});
