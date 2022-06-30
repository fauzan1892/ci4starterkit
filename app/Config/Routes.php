<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('admin/dashboard/', 'Admin\Dashboard::index',['filter' => 'authGuard']);


$routes->group('admin', function ($routes) {
    /**
     * --------------------------------------------------------------------
     * Routes Admin/Users 
     * --------------------------------------------------------------------
     */
    $routes->group('users', ['namespace' => 'App\Controllers\Admin'], static function ($routes) {
        $routes->get('/', 'Users::index',['filter' => 'authGuard']);
        $routes->get('profil', 'Users::profil',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'data', 'Users::data',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'edit', 'Users::edit',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'store', 'Users::store',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'update', 'Users::update',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'delete', 'Users::delete',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'update_avatar', 'Users::update_avatar',['filter' => 'authGuard']);
    });
    
    /**
     * --------------------------------------------------------------------
     * Routes AdminRoles
     * --------------------------------------------------------------------
     */
    $routes->group('roles', ['namespace' => 'App\Controllers\Admin'], static function ($routes) {
        $routes->get('/', 'Roles::index',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'store', 'Roles::store',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'update', 'Roles::update',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'delete', 'Roles::delete',['filter' => 'authGuard']);
    });
    
    /**
     * --------------------------------------------------------------------
     * Routes Settings
     * --------------------------------------------------------------------
     */
    $routes->group('settings', ['namespace' => 'App\Controllers\Admin'], static function ($routes) {
        $routes->get('/', 'Settings::index',['filter' => 'authGuard']);
        $routes->match(["get", "post"], 'update', 'Roles::update',['filter' => 'authGuard']);
    });
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
