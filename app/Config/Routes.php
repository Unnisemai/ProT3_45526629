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
$routes->get('/login', 'Login_controller::index');
$routes->post('/login/autenticar', 'Login_controller::autenticar');
$routes->get('/logout', 'Login_controller::salir');
$routes->get('/usuarios', 'UsuarioController::index');
$routes->get('/usuarios/deshabilitar/(:num)', 'UsuarioController::deshabilitar/$1');
$routes->get('/usuarios/habilitar/(:num)', 'UsuarioController::habilitar/$1');
$routes->get('/usuarios/haceradmin/(:num)', 'UsuarioController::haceradmin/$1');
$routes->get('/usuarios/eliminar/(:num)', 'UsuarioController::eliminar/$1');
$routes->post('/usuarios/crear', 'UsuarioController::crear');
$routes->post('/verificar', 'Login_controller::verificar');
