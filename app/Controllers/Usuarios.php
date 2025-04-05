<?php

namespace App\Controllers;

//? Importar el modelo de usuarios
use App\Models\Usuarios_model;

class Usuarios extends BaseController
{
    /**  
     * ? Funcion para registrar un usuario en la base de datos
     * @return void
     */
     public function registrar(){

          // Obtener los datos enviados por AJAX
          $nombre = $this->request->getPost('nombre');
          $correo = $this->request->getPost('correo');
          $contrasena = $this->request->getPost('contrasena');
          $confirmarContrasena = $this->request->getPost('confirmar_contrasena');
          $edad = $this->request->getPost('edad');
          $telefono = $this->request->getPost('telefono');

          //? Cargar el form_validation
          $validation = \Config\Services::validation();

          //? Definir las reglas de validacion
          $validation->setRules([
               'nombre' => 'required|alpha_space',
               'correo' => 'required|valid_email|is_unique[usuarios.correo]',
               'contrasena' => 'required|min_length[8]',
               'confirmar_contrasena' => 'required|matches[contrasena]',
               'edad' => 'required|numeric|greater_than[17]',
               'telefono' => 'required|numeric|is_unique[usuarios.telefono]|max_length[10]|min_length[10]'
          ],
          [
               'nombre' => [
                    'required' => 'El nombre es requerido',
                    'alpha_space' => 'El nombre solo puede contener letras y espacios'
               ],
               'correo' => [
                    'required' => 'El correo es requerido',
                    'valid_email' => 'El correo no es valido',
                    'is_unique' => 'El correo ya esta registrado'
               ],
               'contrasena' => [
                    'required' => 'La contraseña es requerida',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres'
               ],
               'confirmar_contrasena' => [
                    'required' => 'La confirmación de la contraseña es requerida',
                    'matches' => 'Las contraseñas no coinciden'
               ],
               'edad' => [
                    'required' => 'La edad es requerida',
                    'numeric' => 'La edad debe ser un numero',
                    'greater_than' => 'Debes ser mayor de edad para registrarte'
               ],
               'telefono' => [
                    'required' => 'El teléfono es requerido',
                    'numeric' => 'El teléfono debe ser un numero',
                    'is_unique' => 'El teléfono ya esta registrado',
                    'max_length' => 'El teléfono debe tener 10 digitos',
                    'min_length' => 'El número de teléfono no es valido'
               ]
          ]);

          //? Correr la validacion
          if(!$validation->run($_POST)){
               //? Separar los errores y unificarlos en un solo texto
               $errores = $validation->getErrors();
               $erroresTexto = '';
               foreach($errores as $error){
                    $erroresTexto .= $error . '<br>';
               }
               return json_encode(['resp' => 0, 'msg' => $erroresTexto]);
          }else{
               //? hashear la contraseña
               $contrasena = hash('sha256', $contrasena);

               //? Crear el objeto con los datos
               $datos = 
               [
                    'nombre' => $nombre,
                    'correo' => strtolower($correo),
                    'contrasena' => $contrasena,
                    'edad' => $edad,
                    'telefono' => $telefono
               ];

               //? Crear el objeto del modelo
               $usuarios_model = new Usuarios_model();

               //? Llamar a la funcion del modelo
               $usuarios_model->registrar($datos);

               //? Retornar la respuesta
               return json_encode(['resp' => 1, 'msg' => 'Usuario registrado correctamente, ahora puedes iniciar sesión']);
          }
     }
}