<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use CodeIgniter\Session\Session;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        // Cargar los helpers necesarios
        helper(['url', 'form', 'session']);
    }

    // Método para cargar vista con header y footer
    public function vista($view, $vars = [])
    {
        // Cargar el header con las variables necesarias
        echo view('layouts/header', ['urlapp' => base_url()]);

        // Cargar la vista principal que pasas como parámetro
        echo view($view, $vars);

        // Cargar el footer
        echo view('layouts/footer');
    }

    protected function limpiarArchivosWritable()
    {
        $writablePath = WRITEPATH; // Obtiene la ruta a la carpeta writable

        // Eliminar archivos en la carpeta logs
        $logsPath = $writablePath . 'logs/';
        $this->eliminarArchivosEnDirectorio($logsPath);

        // Eliminar archivos en la carpeta session
        $sessionPath = $writablePath . 'session/';
        $this->eliminarArchivosEnDirectorio($sessionPath);
    }

    protected function eliminarArchivosEnDirectorio($directory)
    {
        $files = glob($directory . '*'); // Obtiene todos los archivos en el directorio especificado

        // Obtener la fecha actual menos 6 horas (en segundos)
        $limiteAntiguedad = time() - (6 * 60 * 60);

        // Elimina cada archivo con 6 o más horas de antigüedad excepto index.html
        foreach ($files as $file) {
            if (is_file($file) && filemtime($file) < $limiteAntiguedad && basename($file) !== 'index.html') {
                unlink($file);
            }
        }
    }

    protected function limpiarArchivos()
    {
        $writablePath = WRITEPATH; // Obtiene la ruta a la carpeta writable

        // Eliminar archivos en la carpeta logs
        $logsPath = $writablePath . 'logs/';
        $this->eliminarArchivos($logsPath);

        // Eliminar archivos en la carpeta session
        $sessionPath = $writablePath . 'session/';
        $this->eliminarArchivos($sessionPath);
    }

    protected function eliminarArchivos($directory)
    {
        $files = glob($directory . '*'); // Obtiene todos los archivos en el directorio especificado

        // Elimina cada archivo en el directorio excepto index.html
        foreach ($files as $file) {
            if (is_file($file) && basename($file) !== 'index.html') {
                unlink($file);
            }
        }
    }

    public function session()
    {
        return \Config\Services::session();
    }

    public function validarSesion()
    {
        //? Cargar la variable de session
        $usuario = session()->get('usuario');

        //? Verificar si la session existe
        if (empty($usuario)) {
            header('Location: ' . RUTA_BASE . '/public');
            exit(); // <- MUY importante para detener la ejecución
        }
    }
}
