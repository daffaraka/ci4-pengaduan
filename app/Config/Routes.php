<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return redirect()->to('/beranda');
});



// Create a route group for pengaduan CRUD operations
$routes->group('dashboard', static function ($routes) {

    $routes->view('/', 'dashboard/layout');


    $routes->view('index', 'dashboard/index');

    $routes->group('pengaduan', function ($routes) {
        $routes->get('/', 'Admin\PengaduanController::index'); // List all pengaduan
        $routes->get('create', 'Admin\PengaduanController::create'); // Show form to create a new pengaduan
        $routes->post('store', 'Admin\PengaduanController::store'); // Handle form submission for creating a new pengaduan
        $routes->get('edit/(:num)', 'Admin\PengaduanController::edit/$1'); // Show form to edit an existing pengaduan
        $routes->post('update/(:num)', 'Admin\PengaduanController::update/$1'); // Handle form submission for updating a pengaduan
        $routes->get('delete/(:num)', 'Admin\PengaduanController::delete/$1'); // Delete a specific pengaduan

    });
     $routes->group('tanggapan', function ($routes) {
        $routes->get('/', 'PengaduanController::index'); // List all pengaduan
        $routes->get('create', 'PengaduanController::create'); // Show form to create a new pengaduan
        $routes->post('store', 'PengaduanController::store'); // Handle form submission for creating a new pengaduan
        $routes->get('edit/(:num)', 'PengaduanController::edit/$1'); // Show form to edit an existing pengaduan
        $routes->post('update/(:num)', 'PengaduanController::update/$1'); // Handle form submission for updating a pengaduan
        $routes->get('delete/(:num)', 'PengaduanController::delete/$1'); // Delete a specific pengaduan

    });
});


$routes->get('/login', 'Auth\LoginController::showLoginForm');
$routes->post('/login', 'Auth\LoginController::login');
$routes->post('/logout', 'Auth\LoginController::logout');

$routes->get('/register', 'Auth\RegisterController::showRegistrationForm');
$routes->post('/register', 'Auth\RegisterController::register');

$routes->get('/profile', 'Auth\ProfileController::index', ['filter' => 'auth']);

$routes->group('beranda', static function ($routes) {
    $routes->view('/', 'home/beranda');
    $routes->get('buat-pengaduan', 'BerandaController::createPengaduan', ['filter' => 'auth']);
    $routes->post('store-pengaduan', 'BerandaController::storePengaduan', ['filter' => 'auth']);
    $routes->get('pengaduan/daftar-pengaduan', 'BerandaController::daftar', ['filter' => 'auth']);
    $routes->get('pengaduan/riwayat', 'BerandaController::riwayat', ['filter' => 'auth']);
    $routes->get('pengaduan/status', 'BerandaController::status', ['filter' => 'auth']);
    $routes->get('pengaduan/tanggapan', 'BerandaController::tanggapan', ['filter' => 'auth']);
});
