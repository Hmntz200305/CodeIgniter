<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'Login::index');
$routes->post('login/process', 'Login::process');
$routes->get('logout', 'Login::logout');
$routes->get('/', 'Dashboard::index');
$routes->group('dataalternative', ['filter' => 'checkSession'], function ($routes) {
    $routes->get('/', 'DataAlternative::index');
    $routes->get('adddata', 'DataAlternative::adddata');
    $routes->post('adddata/addprocess', 'DataAlternative::addprocess');
    $routes->delete('deleteprocess/(:num)', 'DataAlternative::deleteprocess/$1');
    $routes->get('editdata/(:num)', 'DataAlternative::editdata/$1');
    $routes->post('editdata/editdataprocess/(:num)', 'DataAlternative::editDataprocess/$1');
});
$routes->group('datacriteria', ['filter' => 'checkSession'], function ($routes) {
    $routes->get('/', 'DataCriteria::index');
    $routes->get('adddata', 'DataCriteria::adddata');
    $routes->post('adddata/addprocess', 'DataCriteria::addprocess');
    $routes->delete('deleteprocess/(:num)', 'DataCriteria::deleteprocess/$1');
    $routes->get('editdata/(:num)', 'DataCriteria::editdata/$1');
    $routes->post('editdata/editdataprocess/(:num)', 'DataCriteria::editDataprocess/$1');
});
$routes->group('dataassessment', ['filter' => 'checkSession'], function ($routes) {
    $routes->get('/', 'DataAssessment::index');
    $routes->get('adddata', 'DataAssessment::adddata');
    $routes->post('adddata/addprocess', 'DataAssessment::addprocess');
    $routes->delete('deleteprocess/(:num)', 'DataAssessment::deleteprocess/$1');
    $routes->delete('clearprocess', 'DataAssessment::clearprocess');
    $routes->get('editdata/(:num)', 'DataAssessment::editdata/$1');
    $routes->post('editdata/editdataprocess/(:num)', 'DataAssessment::editDataprocess/$1');
});
$routes->get('calculationprocess', 'CalculationProcess::index', ['filter' => 'checkSession']);
$routes->get('decissionresult', 'DecissionResult::index', ['filter' => 'checkSession']);
$routes->group('usersdata', ['filter' => 'checkSession'], function ($routes) {
    $routes->get('/', 'UsersData::index');
    $routes->get('addusers', 'UsersData::addusers');
    $routes->post('addusers/addprocess', 'UsersData::addprocess');
    $routes->delete('deleteprocess/(:num)', 'UsersData::deleteprocess/$1');
    $routes->get('editUsers/(:num)', 'UsersData::editUsers/$1');
    $routes->post('editUsers/edituserprocess/(:num)', 'UsersData::editUserprocess/$1');
});
