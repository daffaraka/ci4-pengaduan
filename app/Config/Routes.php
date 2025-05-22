<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return redirect()->to('/beranda');
});



// Create a route group for pengaduan CRUD operations
$routes->group('admin', ['filter' => ['auth', 'is_admin']], static function ($routes) {

    $routes->view('dashboard', 'dashboard/layout');

    $routes->view('index', 'dashboard/index');

    $routes->group('pengaduan', function ($routes) {
        $routes->get('/', 'Admin\PengaduanController::index', ['as' => 'dashboard.pengaduan.index']); // List all pengaduan
        $routes->get('create', 'Admin\PengaduanController::create', ['as' => 'dashboard.pengaduan.create']); // Show form to create a new pengaduan
        $routes->post('store', 'Admin\PengaduanController::store', ['as' => 'dashboard.pengaduan.store']); // Handle form submission for creating a new pengaduan
        $routes->get('edit/(:num)', 'Admin\PengaduanController::edit/$1', ['as' => 'dashboard.pengaduan.edit']); // Show form to edit an existing pengaduan
        $routes->get('show/(:num)', 'Admin\PengaduanController::show/$1', ['as' => 'dashboard.pengaduan.show']); // Show form to edit an existing pengaduan
        $routes->post('update/(:num)', 'Admin\PengaduanController::update/$1', ['as' => 'dashboard.pengaduan.update']); // Handle form submission for updating a pengaduan
        $routes->post('delete/(:num)', 'Admin\PengaduanController::delete/$1', ['as' => 'dashboard.pengaduan.delete']); // Delete a specific pengaduan

    });


    $routes->group('user', function ($routes) {
        $routes->get('/', 'Admin\UserController::index', ['as' => 'dashboard.user.index']); // List all users
        $routes->get('create', 'Admin\UserController::create', ['as' => 'dashboard.user.create']); // Show form to create a new user
        $routes->post('store', 'Admin\UserController::store', ['as' => 'dashboard.user.store']); // Handle form submission for creating a new user
        $routes->get('edit/(:num)', 'Admin\UserController::edit/$1', ['as' => 'dashboard.user.edit']); // Show form to edit an existing user
        $routes->post('update/(:num)', 'Admin\UserController::update/$1', ['as' => 'dashboard.user.update']); // Handle form submission for updating a user
        $routes->post('delete/(:num)', 'Admin\UserController::delete/$1', ['as' => 'dashboard.user.delete']); // Delete a specific user
        $routes->get('show/(:num)', 'Admin\UserController::show/$1', ['as' => 'dashboard.user.show']); // Show a specific user

    });
    $routes->group('pengaduan', function ($routes) {
        $routes->group('(:num)/tanggapan', function ($routes) {
            $routes->get('/', 'TanggapanController::tanggapan/$1'); // List all pengaduan
            $routes->get('create', 'TanggapanController::createTanggapan/$1'); // Show form to create a new pengaduan
            $routes->post('store', 'TanggapanController::storeTanggapan/$1'); // Handle form submission for creating a new pengaduan
            $routes->get('edit/(:num)', 'TanggapanController::editTanggapan/$1/$2'); // Show form to edit an existing pengaduan
            $routes->post('update/(:num)', 'TanggapanController::updateTanggapan/$1/$2'); // Handle form submission for updating a pengaduan
            $routes->get('delete/(:num)', 'TanggapanController::deleteTanggapan/$1/$2'); // Delete a specific pengaduan

        });
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
