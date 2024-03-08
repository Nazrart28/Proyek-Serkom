<?php

namespace Config;

use App\Controllers\Mitra;
use Myth\Auth\Config\Auth;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//untuk menampilkan halaman
$routes->get('/', 'Main::index');
$routes->get('/main/index', 'Main::index');
$routes->get('/main/index', 'Main::index');
$routes->get('/pengajuan/index', 'Pengajuan::index');
$routes->get('/submit_file/index', 'SubmitFileController::index');
$routes->get('/submit_file/create', 'SubmitFileController::create');
$routes->post('/submit_file/save', 'SubmitFileController::save');
$routes->get('/penilaian/index', 'PenilaianController::index');
$routes->get('/penilaian/create', 'PenilaianController::create');
$routes->post('/penilaian/save', 'PenilaianController::save');
// $routes->post('/submit_file/delete', 'SubmitFileController::delete/$1');
$routes->delete('/submit_file/(:num)', 'SubmitFileController::delete/$1');
$routes->get('/ganttchart/ganttchart', 'GanttChartController::ganttchart');
$routes->get('/logbook/index', 'Logbook::index');
$routes->get('/logbook/index', 'Logbook::index');
$routes->get('/logbook/create', 'Logbook::create');
$routes->get('/Monitoring/index', 'Monitoring::index');
//$routes->get('logbook', 'Logbook::index');

//$routes->patch('/logbook/detail', 'Logbook::detail');
//$routes->get('/logbook/(:any)', 'Logbook::detail/$1');
$routes->group("user", function ($routes) {
    $routes->get('home', 'UserController::index', ['as' => 'user.home']);
    $routes->get('kelompok', 'UserController::kelompok', ['as' => 'user.kelompok']);
    $routes->get('mitra', 'UserController::mitra', ['as' => 'user.mitra']);
    $routes->get('logbook', 'UserController::logbook', ['as' => 'user.logbook']);
    $routes->get('ganttchart', 'UserController::ganttchart', ['as' => 'user.ganttchart']);
    $routes->get('submit_file', 'UserController::submit_file', ['as' => 'user.submit_file']);
});

$routes->get('/mitra/index', 'Mitra::index');
$routes->get('/mitra/create', 'Mitra::create');
$routes->get('/mitra/create', 'Mitra::save');
//$routes->post('/mitra/(:any)', 'Mitra::update/$1');
$routes->get('/mitra/edit/(:segment)', 'Mitra::edit/$1');
$routes->get('/mitra/update', 'Mitra::update/$1');
$routes->get('/mitra/(:any)', 'Mitra::detail/$1');
$routes->delete('/mitra/(:num)', 'Mitra::delete/$1');
$routes->delete('/logbook/(:num)', 'Logbook::delete/$1');
$routes->get('/logbook/(:num)', 'Logbook::detail/$1');
$routes->get('/logbook/edit/(:segment)', 'logbook::edit/$1');
$routes->post('/logbook/index', 'Logbook::index');
$routes->post('/logbook/create', 'Logbook::create');
$routes->post('/mitra/save', 'Mitra::save');
$routes->post('/mitra/create', 'Mitra::create');
$routes->post('/mitra/edit/(:segment)', 'Mitra::edit/$1');
$routes->post('/mitra/update', 'Mitra::update/$1');
$routes->post('/mitra/(:any)', 'Mitra::update/$1');
$routes->post('/mitra/delete', 'Mitra::delete/$1');


$routes->get('/kelompok/index', 'kelompok::index');
$routes->get('/kelompok/create', 'kelompok::create');
$routes->post('/kelompok/save/(any)', 'kelompok::save');
$routes->get('/kelompok/(:any)', 'kelompok::detail/$1');
$routes->get('/kelompok/(:any)', 'kelompok::detail/$1');
$routes->post('/kelompok/update/(:segment)', 'kelompok::update/$1');
$routes->post('/kelompok/edit/(:segment)', 'kelompok::edit/$1');
$routes->post('/kelompok/(:any)', 'kelompok::save/$1');
$routes->get('/kelompok/update/(:segment)', 'kelompok::update/$1');
$routes->post('/kelompok/(:any)', 'kelompok::update/$1');
$routes->get('/kelompok/(:any)', 'kelompok::detail/$1');
$routes->get('/kelompok/(:any)', 'kelompok::detail/$1');
// $routes->post('/kelompok/edit/(:segment)', 'kelompok::edit/$1');
$routes->delete('/kelompok/(:num)', 'kelompok::delete/$1');


$routes->get('/kelompok/index', 'kelompok::index');
$routes->get('/kelompok/create', 'kelompok::create');
$routes->delete('/kelompok/(:num)', 'kelompok::delete/$1');
$routes->get('/kelompok/(:any)', 'kelompok::detail/$1');
$routes->get('/kelompok/index', 'kelompok::index');
$routes->get('/kelompok/create', 'kelompok::create');
$routes->get('/kelompok/create', 'kelompok::save');
//$routes->get('/kelompok/save/(:segment)', 'kelompok::save/$1');
$routes->get('/kelompok/detail', 'kelompok::save');
$routes->post('/kelompok/(:any)', 'kelompok::update/$1');
$routes->get('/kelompok/(:any)', 'kelompok::detail/$1');
$routes->get('/kelompok/(:any)', 'kelompok::detail/$1');
$routes->delete('/kelompok/(:num)', 'kelompok::delete/$1');
//$routes->post('/kelompok/save', 'kelompok::save');
$routes->post('/kelompok/create', 'kelompok::create');
$routes->post('/kelompok/update', 'kelompok::update');
$routes->post('/kelompok/update', 'kelompok::update/$1');
$routes->get('/Berkas', 'Berkas::create');
$routes->get('/Berkas/save', 'Berkas::save');
$routes->get('/Berkas/index', 'Berkas::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
