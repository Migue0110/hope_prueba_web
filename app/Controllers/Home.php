<?php

namespace App\Controllers;

use CodeIgniter\Session\Session;
use App\Models\Calendario_model;

class Home extends BaseController
{
    /**
     * ? Funcion para cargar la vista de inicio de sesion
     * @return void
     */
    public function index()
    {
        return view('login');
    }

    /**
     * ? Funcion de prueba, para cargar la vista de la pagina principal
     * @return void
     */
    public function pagina_principal()
    {
        $this->vista('pagina_principal');
    }

    /**
     * ? Funcion de prueba, para cargar la vista de Calendario
     * @return void
     */
    public function calendario()
    {
        // ? cargar funcion validarSsesion para verificar si el usuario ha iniciado sesion
        $this->validarSesion();
        $calendarioModel = new Calendario_model();
        // ? Extraer el Id de la variable session
        $usuario = session()->get('usuario');
        // ? Obtener los estados emocionales del usuario del mes actual
        $estados = $calendarioModel->obtener_estados($usuario->id_usuario);       
        $this->vista('calendario/calendario', ['estados' => $estados]);

    }

    /**
     * ? Funcion de prueba, para cargar la vista de analizadortextos
     * @return void
     */
    public function analizador_textos()
    {
        // ? cargar funcion validarSsesion para verificar si el usuario ha iniciado sesion
        $this->validarSesion();
        $this->vista('analizadortextos/analizador_textos');
    }

    /**
     * ? Funcion de prueba, para cargar la vista de autoayuda
     * @return void
     */
    public function autoayuda()
    {
        // ? cargar funcion validarSsesion para verificar si el usuario ha iniciado sesion
        $this->validarSesion();
        $this->vista('autoayuda/auto_ayuda');
    }

    /**
     * ? Funcion de prueba, para cargar la vista de tests
     * @return void
     */
    public function tests()
    {
        // ? cargar funcion validarSsesion para verificar si el usuario ha iniciado sesion
        $this->validarSesion();
        $this->vista('/test/seleccion_test');
    }

    /**
     * ? funcion para cargar la vista de restablecer contraseña
     * @return void
     */

    public function restablecer_contrasena()
    {
        $this->vista('restablecer_contrasena');
    }

    /**
     * ? funcion para cargar la vista de recuperar contraseña
     * @return void
     */
    public function olvide_contrasena()
    {
        $this->vista('recuperarcontraseña/olvide_contrasena');
    }

    /**
     * ? funcion para cargar la vista informacion_analizador
     * @return void
     */
    public function informacion_analizador()
    {
        $this->vista('analizadortextos/informacion_analizador');
    }

    /**
     * ? funcion para cargar la vista informacion_autoayuda
     * @return void
     */
    public function informacion_auto_ayuda()
    {
        $this->vista('autoayuda/informacion_auto_ayuda');
    }

    /**
     * ? funcion para cargar la vista informacion_calendario
     * @return void
     */
    public function informacion_calendario()
    {
        $this->vista('calendario/informacion_calendario');
    }

    /**
     * ? funcion para cargar la vista informacion_tests
     * @return void
     */
    public function informacion_tests()
    {
        $this->vista('test/informacion_tests');
    }

    /**
     * ? funcion para cargar la vista resultados_test_inicial 
     * @return void
     */
    public function resultados_test()
    {
        $puntaje = $this->request->getGet('puntaje');
        $valoracion = $this->request->getGet('valoracion');

        $puntaje = base64_decode($puntaje);
        $valoracion = base64_decode($valoracion);

        $this->vista('test/resultados_test', ['puntaje' => $puntaje, 'valoracion' => $valoracion]);
    }
}