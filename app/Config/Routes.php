<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Registros_Controller::index');
$routes->get('Registros', 'Registros_Controller::index');
