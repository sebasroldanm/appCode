<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/**
 * Rutas de Home
 */
$routes->get('/', 'HomeController::index');
$routes->post('/addNewsLetter', 'HomeController::addNewsLetter');
$routes->get('/destroy', 'HomeController::destroy');

/**
 * Rutas de Category
 */
$routes->get('/category/(:any)', 'CategoryController::list/$1');

/**
 * Rutas del Post
 */

$routes->get('/post/create', 'PostController::create');
$routes->post('/post/save', 'PostController::save');
$routes->get('/post/(:any)/(:any)', 'PostController::list/$1/$2');
/**
 * Rutas de Usuarios
 */

$routes->get('/user', 'UserController::index');
$routes->get('/user/index', 'UserController::index');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/save', 'UserController::save');
$routes->post('/user/update', 'UserController::update');
$routes->get('/user/edit/(:any)', 'UserController::edit/$1');
$routes->get('/user/delete/(:any)', 'UserController::delete/$1');
// $routes->get('/user/create', 'UserController::create');
// $routes->post('/user/save', 'UserController::save');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
