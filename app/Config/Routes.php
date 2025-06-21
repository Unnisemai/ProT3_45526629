<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('acerca_de', 'Home::acerca_de');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('login', 'Home::login');
$routes->get('registro', 'Home::registro');
$routes->get('/usuario/registrar', 'UsuarioController::registrar');
$routes->post('/usuario/guardar', 'UsuarioController::guardar');