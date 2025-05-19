<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->view('dashboard','dashboard/layout');


$routes->view('dashboard/index','dashboard/index');

// Create a route group for pengaduan CRUD operations
$routes->group('pengaduan', function ($routes) {
    $routes->get('/', 'PengaduanController::index'); // List all pengaduan
    $routes->get('create', 'PengaduanController::create'); // Show form to create a new pengaduan
    $routes->post('store', 'PengaduanController::store'); // Handle form submission for creating a new pengaduan
    $routes->get('edit/(:num)', 'PengaduanController::edit/$1'); // Show form to edit an existing pengaduan
    $routes->post('update/(:num)', 'PengaduanController::update/$1'); // Handle form submission for updating a pengaduan
    $routes->get('delete/(:num)', 'PengaduanController::delete/$1'); // Delete a specific pengaduan
});



