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

/* Rutas de Pelicuas practica de rutas

    $routes->get('/', 'Home::index');

    $routes->get("pelicula", "Pelicula::index");
    $routes->get("pelicula/new", "Pelicula::new");
    $routes->post("pelicula", "Pelicula::create");

    $routes->get("pelicula/xx/edit", "Pelicula::edit");
    $routes->put("pelicula", "Pelicula::create");

*/

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
/* Rutas de la version antigua del video
    $routes->get('/contactarme/(:any)', 'Home::contacto/$1',['as' => 'contacto']);
    //$routes->get('/contacto', 'Home::contacto');

    $routes->get('/category', 'dashboard\CategoryController::index');
    $routes->post('/movie/post', 'Movie::testPost');
    $routes->post('/movie/delete/(:num)', 'Movie::delete/$1');

    /*
        Agrupacion de URL.

        en este  caso se agrupan las urls del controlador movie.
        Para acceder a ellas se tiene que hacer de la sig manera mgarcia.com/dashboard/"url del controlador"
    
    
    $routes->group('dashboard', function($routes){
        
        /*$routes->get('movie', 'dashboard\MovieController::index');
        $routes->get('movie/test/(:any)', 'dashboard\MovieController::test/$1');
        $routes->get('movie/show', 'dashboard\MovieController::show');
    });

    $routes->get('movie', 'Movie::index');
    $routes->get('movie/show', 'Movie::show');
    $routes->get('movie/new', 'Movie::new');
    $routes->get("movie/(:any)/edit", "Movie::edit/$1");
    $routes->post("movie/update/(:any)", "Movie::update/$1");

*/

/*$routes->get('/', 'Home::index');
$routes->get('pelicula',"PeliculaController::index");*/

// This is used to group the paths
$routes->group("dashboard",function($routes){
    // to access the path correctly is required set "dashboard"
    // Example: host/dashbord/pelicula/.. 
    /**
     * When the path of controller chenge is required specify like parameter
     */
    $routes->presenter("pelicula",["controller" => "Dashboard\Pelicula"]/*With this parameter specify the of the controller */);
    
    // Example: host/dashbord/categoria/..
    // we can include especific routes with "only"
    //$routes->presenter("categoria",["only" => ["index","new", "create"]]);
    // Also we can exclude routes whit exept.
    // example 
    $routes->presenter("categoria",["except" => "show", "controller" => "Dashboard\Categoria"]);
    

    //Routes with name
    // We can't access to route with the name from the browser
    //$routes->get("test", "Pelicula::test",["as" => "pelicula.test"]);
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
