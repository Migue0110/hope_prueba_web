<?php

namespace App\Controllers;

//? Importar el modelo de usuarios
use App\Models\Usuarios_model;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;



class Login extends BaseController
{
    protected $session;

    public function __construct()
    {
        // Cargar la clase de sesión en el constructor
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        echo view('login');
    }
    /**
     * ? Funcion para iniciar sesion
     * @return void
     */
    public function iniciar_sesion()
    {
        // Obtener los datos enviados por AJAX
        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');

        //? Cargar el modelo de usuarios
        $usuariosModel = new Usuarios_model();

        $usuario = $usuariosModel->obtener_usuario(strtolower($correo));

        //? Verificar si el usuario existe
        if ($usuario) {
            //? Verificar si la contraseña es correcta
            $contrasena = hash('sha256', $contrasena);
            if ($usuario->contrasena === $contrasena) {
                //? Crear la sesion
                $token = bin2hex(random_bytes(16));
                $this->limpiarArchivosWritable();

                $datos_usuario = (object)[
                    'id_usuario' => $usuario->id,
                    'nombre' => $usuario->nombre,
                    'correo' => $usuario->correo,
                    'telefono' => $usuario->telefono,
                    'edad' => $usuario->edad,
                    'token' => $token
                ];

                //? agregar los datos del usuario a la sesion
                $this->session->set('usuario', $datos_usuario);

                //? Actualizar token en la base de datos
                $usuariosModel->actualizar_usuario(['token' => $token], $usuario->id);

                $url = '';
                //? validar si el usuario ingreso tuvo un primer ingreso
                if ($usuario->fecha_encuesta_inicial == null) {
                    $url = RUTA_PUBLICA . 'test/test_inicial';
                } else {
                    $url = RUTA_PUBLICA . 'pagina_principal';
                }

                //? Retornar la respuesta
                return json_encode(['resp' => 1, 'url' => $url]);
            } else {
                return json_encode(['resp' => 0, 'msg' => 'El correo y/o contraseña son incorrectos']);
            }
        } else {
            return json_encode(['resp' => 0, 'msg' => 'El usuario no se encuentra registrado']);
        }
    }

    /**
     * ? Funcion para cerrar sesion
     * @return void
     */
    public function salir()
    {
        $this->session->destroy();
        $this->limpiarArchivos();
        return redirect()->to(base_url('public/pagina_principal'));
    }
}
