<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//! Rutas para el controlador de home
//? Funcion index
$routes->get('pagina_principal', 'Home::pagina_principal');
//? Funcion calendario
$routes->get('calendario', 'Home::calendario');
//? Funcion analizador_textos
$routes->get('analizador_textos', 'Home::analizador_textos');
//? Funcion autoayuda
$routes->get('auto_ayuda', 'Home::autoayuda');
//? Funcion tests
$routes->get('test/seleccion_test', 'Home::tests');
//? funcion test_ansiedad
$routes->get('test/test_ansiedad', 'Test::test_ansiedad');
//? funcion test_depresion
$routes->get('test/test_depresion', 'Test::test_depresion');
//? funcion restablecer_contrasena
$routes->get('restablecer_contrasena', 'Home::restablecer_contrasena');
//? funcion recuperar_contrasena
$routes->get('olvide_contrasena', 'Home::olvide_contrasena');
//? funcion informacion_analizador
$routes->get('analizadortextos/informacion_analizador', 'Home::informacion_analizador');
//? funcion informacion_autoayuda
$routes->get('autoayuda/informacion_auto_ayuda', 'Home::informacion_auto_ayuda');
//? funcion informacion_calendario
$routes->get('calendario/informacion_calendario', 'Home::informacion_calendario');
//? funcion informacion_tests
$routes->get('test/informacion_tests', 'Home::informacion_tests');
//? funcion resultados_test_inicial
$routes->get('test/resultados_test', 'Home::resultados_test');

//! Rutas para el controlador de Usuarios
//? Funcion registrar
$routes->post('usuarios/registrar', 'Usuarios::registrar');

//! Rutas para el controlador de Login
//? Funcion iniciar_sesion
$routes->post('login/iniciar_sesion', 'Login::iniciar_sesion');
//? Funcion salir
$routes->get('login/salir', 'Login::salir');


//! Rutas para el controlador de Test
//? Funcion test_inicial
$routes->get('test/test_inicial', 'Test::test_inicial');
//? Funcion encuesta_inicial
$routes->post('test/encuesta_inicial', 'Test::encuesta_inicial');
//? Funcion encuesta_ansiedad
$routes->post('test/encuesta_ansiedad', 'Test::encuesta_ansiedad');
//? Funcion encuesta_depresion
$routes->post('test/encuesta_depresion', 'Test::encuesta_depresion');

//! Rutas para el controlador de Calendario
//? Funcion guardar_reflexion
$routes->post('calendario/guardar_reflexion', 'Calendario::guardar_reflexion');
//? Funcion obtener_estados
$routes->get('calendario/obtener_estados', 'Calendario::obtener_estados');

//! Rutas para paginas no encontradas
//? Funcion 404
$routes->set404Override(function() {
    echo view('errors/html/error_404');
});
