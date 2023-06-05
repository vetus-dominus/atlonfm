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

// RESTful API
$routes->group('api', ['namespace' => 'App\API\v1'], static function ($routes) {
    /* Ctypes */
    $routes->get('ctypes', 'Ctypes::index');
    $routes->get('ctype/(.*)', 'Ctypes::show/$1');
    $routes->post('ctype', 'Ctypes::create');
    $routes->patch('ctype/(.*)', 'Ctypes::update/$1');
    $routes->put('ctype/(.*)', 'Ctypes::update/$1');
    $routes->delete('ctype/(.*)', 'Ctypes::delete/$1');
    /* Constructions */
    $routes->get('constructions', 'Constructions::index');
    $routes->get('construction/(.*)', 'Constructions::show/$1');
    $routes->post('construction', 'Constructions::create');
    $routes->patch('construction/(.*)', 'Constructions::update/$1');
    $routes->put('construction/(.*)', 'Constructions::update/$1');
    $routes->delete('construction/(.*)', 'Constructions::delete/$1');
});

// All paths to only one route to [🙥 𝕽𝖔𝖒𝖊 🙧] React routing
$routes->get('(.*)', 'Home::index');

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
