<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('weather', 'Weather::index', ['as' => 'weather_show']);
$routes->post('weather', 'Weather::getLocation');
