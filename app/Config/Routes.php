<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// en esta ruta se configura para poder mandar datos desde la url a la funcion de algun controlador
/*
    - Se tiene que especificar el tipo de dato que se va a enviar, en este caso el (:any).
    - Al final de la url se coloca la pocision donde se lva recibir el dato en est caso como solo es un paraetro se coloca el $1,
    en caso de haber mas parametros esto puede incremtar hasta $n segun la cantidad de parametrs.
    - Si no se mndan los parametros solicitados en la url se obtendra un herror.
*/

/*
    NOMBRE EN LAS RUTAS 
     
    se puede acceder a la ruta con el nombre que se le ponga  a la misma medinate un metodo, 
    para asi en caso de que se tenga qie modicfiar la url no haya problemas dentro del codigo
*/
$routes->get('/contactarme/(:any)', 'Home::contacto/$1',['as' => 'contacto']);
//$routes->get('/contacto', 'Home::contacto');

$routes->get('/category', 'dashboard\CategoryController::index');

/*
    Agrupacion de URL.

    en este  caso se agrupan las urls del controlador movie.
    Para acceder a ellas se tiene que hacer de la sig manera mgarcia.com/dashboard/"url del controlador"
*/

$routes->group('dashboard', function($routes){
    $routes->resource('movie');
    /*$routes->get('movie', 'dashboard\MovieController::index');
    $routes->get('movie/test/(:any)', 'dashboard\MovieController::test/$1');
    $routes->get('movie/show', 'dashboard\MovieController::show');*/
});



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
