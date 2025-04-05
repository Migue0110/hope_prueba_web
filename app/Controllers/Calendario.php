<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Calendario_model;

class Calendario extends BaseController
{

    public function obtener_estados()
    {
        //? Cargar el modelo de calendario
        $calendarioModel = new Calendario_model();

        //? Extraer el Id de la variable session
        $usuario = session()->get('usuario');

        //? Obtener los estados emocionales del usuario
        $estados = $calendarioModel->obtener_estados($usuario->id_usuario);

        //? Retornar la respuesta en formato JSON
        return $this->response->setJSON($estados);
    }

    public function guardar_reflexion()
    {
        //? Cargar el modelo de calendario
        $calendarioModel = new Calendario_model();

        //? Obtener los datos del formulario
        $datos = $this->request->getPost();

        //? Validar los datos
        $validacion = $this->validate([
            'fecha' => 'required',
            'emocion' => 'required',
            'reflexion' => 'required'
        ]);

        //? Verificar si el texto tiene contenido semántico (no solo espacios o símbolos)
        if (preg_match('/^\s*$/', $datos['reflexion'])) {
            return json_encode(['error' => 'El texto no puede estar vacío o contener solo espacios.']);
        }

        //? Comprobar si tiene palabras reales (mínimo 3 palabras)
        if (str_word_count($datos['reflexion']) < 3) {
            return json_encode(['error' => 'El texto debe contener al menos tres palabras.']);
        }

        //? Detectar spam o repetición excesiva
        if (preg_match('/(.)\1{5,}/', $datos['reflexion'])) {
            return json_encode(['error' => 'El texto no es coherente.']);
        }

        //? Verifica que no tenga repeticiones excesivas
        if (preg_match('/(.)\1{5,}/', $datos['reflexion'])) {
            return json_encode(['error' => 'El texto no puede contener repeticiones excesivas de caracteres.']);
        }

        //? Verificar si el texto tiene menos de 800 caracteres y mas de 10 caracteres
        if (strlen($datos['reflexion']) < 10 || strlen($datos['reflexion']) > 800) {
            return json_encode(['error' => 'El texto debe tener entre 10 y 800 caracteres']);
        }

        //? Verificar que no tenga una lista de palabras sueltas 
        if (preg_match('/^(?:\w+\s*)+$/', $datos['reflexion']) && !preg_match('/[.,;:!?]/', $datos['reflexion'])) {
            return json_encode(['error' => 'El texto parece una lista de palabras, intenta formar oraciones.']);
        }

        //? Verificar estructura básica (sujeto + verbo) usando una lógica simple
        $palabras = explode(" ", $datos['reflexion']);
        if (count($palabras) < 4) {
            return json_encode(['error' => 'El texto parece demasiado simple, intenta agregar más contexto.']);
        }

        //? Extraer el Id de la variable session
        $usuario = session()->get('usuario');

        //? Obtener el id_registro del formulario
        $id_registro = $this->request->getPost('id_registro');

        //? Guardar los datos en la base de datos
        $datos =
            [
                'id_usuario' => $usuario->id_usuario,
                'fecha' => $datos['fecha'],
                'estado_emocional' => $datos['emocion'],
                'descripcion' => $datos['reflexion'],
            ];

        //? Verificar si ya existe una reflexion para el dia actual
        $msg = 'Reflexión guardada correctamente';
        if ($id_registro) {
            //? Actualizar la reflexion existente
            $calendarioModel->actualizar_reflexion($id_registro, $datos);
            $msg = 'Reflexión actualizada correctamente';
        } else {
            $calendarioModel->guardar_fecha_emocion($datos);
        }
        
        //? Retornar la respuesta
        return json_encode(['resp' => 1, 'msg' => $msg]);
    }
}
