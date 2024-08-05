<?php

namespace Config;

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
$routes->setAutoRoute(true);
// $routes->get('/', 'Home::index', ['filter' => 'auth']);
// $routes->get('/home', 'Home::index', ['filter' => 'auth']);
// $routes->get('/laporan', 'Home::laporan', ['filter' => 'auth']);
// $routes->get('/exportLaporan/(.*)/(.*)', 'Home::exportLaporan/$1/$2', ['filter' => 'auth']);
// $routes->get('/exportLaporanSubscription/(.*)/(.*)', 'Home::exportLaporanSubscription/$1/$2', ['filter' => 'auth']);
// $routes->get('/home/laporanStatistik', 'Home::laporanStatistik', ['filter' => 'auth']);

$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/login/makeCookie/(.*)/(.*)', 'Login::makeCookie/$1/$2');
$routes->post('/login/auth', 'Login::auth');

$routes->get('/leaderagent', 'Agent::leaderAgent');
$routes->get('/pengumuman', 'Informasi::index');
$routes->get('/lengkapidataagent/(.*)', 'Agent::lengkapiDataAgent/$1');
$routes->post('/savedataagent', 'Agent::saveData');

$routes->get('/agentarea/produk', 'Aproduk::index');
$routes->get('/agentarea/produk/travel', 'Aproduk::travel');
$routes->get('/agentarea/knowledgeproduktravel/(.*)', 'Aproduk::knowledgeproduktravel/$1');
$routes->get('/agentarea/knowledgeproduk/(.*)', 'Aproduk::knowledgeproduk/$1');

$routes->get('/agentarea/travel', 'Atravel::index');
$routes->get('/agentarea/customer', 'Acustomer::index');

$routes->get('/agentarea/penjualan/produk', 'Apenjualan::produk');
$routes->get('/agentarea/penjualan/travel', 'Apenjualan::travel');

$routes->get('/agentarea/komisi/produk', 'Akomisi::produk');
$routes->get('/agentarea/komisi/produktravel', 'Akomisi::produkTravel');

$routes->get('/agentarea/profile', 'Aprofile::index');

$routes->get('/agentarea/agent', 'Aagent::index');
$routes->get('/agentarea/pengumuman', 'Ainformasi::index');
$routes->get('/agentarea/kelas', 'Akelas::index');

$routes->get('/agentarea/home', 'Agreetingagent::index');

$routes->get('/agentarea/kelas/(.*)', 'Akelas::kelas/$1');
$routes->get('/agentarea/materi/(.*)', 'Akelas::materi/$1');

$routes->get('/registrasiulangagent', 'Aagent::registrasi');




// $routes->get('/pendaftar/getListMember', 'AdminPendaftaranArea::getListMember', ['filter' => 'authAdminPendaftaran']);
// authAdminPendaftaran

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
