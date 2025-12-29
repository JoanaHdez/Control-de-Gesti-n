<?php

namespace Config;
use CodeIgniter\Router\RouteCollection;
use Config\Services;

/**
 * @var RouteCollection $routes
 */

$routes = Services::routes();

$routes->get('/', 'Registros_Controller::index');
$routes->get('Registros', 'Registros_Controller::index');

$routes->get('oficios/crear', 'Registros_Controller::crear');
$routes->post('oficios/guardar', 'Oficios_Controller::guardar');
$routes->get('oficios/detalles/(:any)', 'Oficios_Controller::detalles/$1');


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}