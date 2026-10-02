<?php

use Config\Services;

$routes = Services::routes();

$routes->get('/', function () {
    return view('auth/login');
});

$routes->get('login', function () {
    return view('auth/login');
});

$routes->post('login', 'Auth::attempt');

$routes->get('logout', 'Auth::logout');

$routes->get('dashboard', 'Dashboard::index');

$routes->get('products', 'Products::index');
$routes->get('products/create', 'Products::create');
$routes->post('products/create', 'Products::create');
$routes->get('products/edit/(:num)', 'Products::edit/$1');
$routes->post('products/edit/(:num)', 'Products::edit/$1');
$routes->get('products/delete/(:num)', 'Products::delete/$1');

$routes->get('customers', 'Customers::index');
$routes->get('customers/create', 'Customers::create');
$routes->post('customers/create', 'Customers::create');
$routes->get('customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('customers/edit/(:num)', 'Customers::edit/$1');
$routes->get('customers/delete/(:num)', 'Customers::delete/$1');

$routes->get('users', 'Users::index');
$routes->get('users/create', 'Users::create');
$routes->post('users/create', 'Users::create');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/edit/(:num)', 'Users::edit/$1');
$routes->get('users/delete/(:num)', 'Users::delete/$1');

$routes->get('sales', 'Sales::index');
$routes->get('sales/create', 'Sales::create');
$routes->post('sales/create', 'Sales::create');