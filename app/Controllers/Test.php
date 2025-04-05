<?php

namespace App\Controllers;

use CodeIgniter\Session\Session;
use CodeIgniter\Controller;
use App\Models\Preguntas_tests_model;
use App\Models\Usuarios_model;

class Test extends BaseController
{
    protected $session;

    public function __construct()
    {
        // Cargar la clase de sesión en el constructor
        $this->session = \Config\Services::session();

        // if (empty($this->session->datosusuario->correo)) {
        //     return redirect()->to(base_url('public/login'));
        // }
    }

    /**
     * ? Funcion para cargar la vista de la encuesta inicial
     * @return void
     */
    public function test_inicial()
    {
        // ? cargar funcion validarSsesion para verificar si el usuario ha iniciado sesion
        $this->validarSesion();
        //? Cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Obtener las preguntas de la encuesta inicial
        $preguntas = $preguntasModel->obtener_preguntas('1');
        $this->vista('test/test_inicial', ['preguntas' => $preguntas]);
    }

    /**
     * ? Funcion para cargar la vista del test de ansiedad
     * @return void
     */
    public function test_ansiedad()
    {
        // ? cargar funcion validarSsesion para verificar si el usuario ha iniciado sesion
        $this->validarSesion();
        //? cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Obtener las preguntas de la encuesta de ansiedad
        $preguntas = $preguntasModel->obtener_preguntas('2');
        $this->vista('test/test_ansiedad', ['preguntas' => $preguntas]);
    }

    /**
     * ? Funcion para cargar la vista del test de depresion
     * @return void
     */
    public function test_depresion()
    {
        // ? cargar funcion validarSsesion para verificar si el usuario ha iniciado sesion
        $this->validarSesion();
        //? cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Obtener las preguntas de la encuesta de depresion
        $preguntas = $preguntasModel->obtener_preguntas('3');
        $this->vista('test/test_depresion', ['preguntas' => $preguntas]);
    }

    /**
     * ? Funcion para guardar los datos de la encuesta inicial
     * @return void
     */
    public function encuesta_inicial()
    {
        //? Recoger las respuestas del formulario
        $respuestas = $this->request->getPost('respuestas');

        //? Verificar si todas las respuestas fueron proporcionadas
        foreach ($respuestas as $respuesta) {
            if (!isset($respuesta['puntaje'])) {
                return json_encode(['resp' => 0, 'msg' => 'Hay preguntas sin responder']);
            }
        }

        //? Extraer el Id de la variable session
        $usuario = session()->get('usuario');

        //? Cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Guardar las respuestas en la base de datos
        $puntaje_total = 0;
        foreach ($respuestas as $respuesta) {
            $data = [
                'id_usuario' => $usuario->id_usuario,
                'id_pregunta' => $respuesta['id_pregunta'],
                'puntaje' => $respuesta['puntaje']
            ];
            $puntaje_total += $respuesta['puntaje'];
            $preguntasModel->guardar_respuestas($data);
        }

        //? Actualizar la fecha de la encuesta en la tabla usuarios
        $usuariosModel = new Usuarios_model();
        $usuariosModel->actualizar_fecha_encuesta($usuario->id_usuario, date('Y-m-d'));

        //? validaciones para el puntaje 
        $valoracion = "";
        if ($puntaje_total >= 0 && $puntaje_total <= 15) {
            $valoracion = 'Es normal que en la vida haya momentos en los que se encuentre más desanimado, no obstante, eso no significa que usted esté deprimido. Revise su forma de pensar y utilice las herramientas adecuadas para vencer dichas adversidades.';
        } elseif ($puntaje_total > 15 && $puntaje_total <= 25) {
            $valoracion = 'Usted podría beneficiarse de la ayuda de un profesional para recuperar el optimismo y entrenarse en técnicas eficaces de solución de problemas.';
        } elseif ($puntaje_total > 25) {
            $valoracion = 'Ha perdido la esperanza en el futuro y no es capaz de encontrar fuerzas para seguir adelante. Puede recuperar su motivación y superar éste problema si trabaja en equipo con un especialista.';
        }

        //? Encriptar datos antes de enviar.
        $puntaje_total = base64_encode($puntaje_total);
        $valoracion = base64_encode($valoracion);

        //? Retornar la respuesta a resultados_test_inicial
        return json_encode(['resp' => 1, 'msg' => 'Respuestas guardadas correctamente', 'puntaje' => $puntaje_total, 'valoracion' => $valoracion]);
    }

    /**
     * ? Funcion para guardar los datos de la encuesta de ansiedad
     * @return void
     */
    public function encuesta_ansiedad()
    {
        //? Recoger las respuestas del formulario
        $respuestas = $this->request->getPost('respuestas');

        //? Verificar si todas las respuestas fueron proporcionadas
        foreach ($respuestas as $respuesta) {
            if (!isset($respuesta['puntaje']) || $respuesta['puntaje'] === 'NaN') {
                return json_encode(['resp' => 0, 'msg' => 'Hay preguntas sin responder']);
            }
        }

        //? Extraer el Id de la variable session
        $usuario = session()->get('usuario');

        //? Cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Calcular el puntaje total correctamente
        $puntaje_total = 0;
        foreach ($respuestas as $respuesta) {
            $puntaje_total += $respuesta['puntaje'];
        }

        //? Determinar el nivel de ansiedad
        if ($puntaje_total >= 0 && $puntaje_total <= 4) {
            $nivel_resultado = 'Mínimo o no ansiedad';
        } elseif ($puntaje_total >= 5 && $puntaje_total <= 10) {
            $nivel_resultado = 'Ansiedad al borde';
        } elseif ($puntaje_total >= 11 && $puntaje_total <= 20) {
            $nivel_resultado = 'Ansiedad leve';
        } elseif ($puntaje_total >= 21 && $puntaje_total <= 30) {
            $nivel_resultado = 'Ansiedad Moderada';
        } elseif ($puntaje_total >= 31 && $puntaje_total <= 50) {
            $nivel_resultado = 'Ansiedad Grave';
        } else {
            $nivel_resultado = 'Ansiedad Extrema-pánico';
        }

        //? Guardar las respuestas en la base de datos
        $data = [
            'id_usuario' => $usuario->id_usuario,
            'tipo' => '1',
            'puntaje_total' => $puntaje_total,
            'nivel_resultado' => $nivel_resultado
        ];

        $preguntasModel->guardar_respuestas_burns($data);

        //? Actualizar la fecha de la encuesta en la tabla pruebas_burns
        $preguntasModel->actualizar_fecha_encuesta($usuario->id_usuario, date('Y-m-d'));

        //? Validaciones para el puntaje de ansiedad
        $valoracion = "";

        if ($puntaje_total >= 0 && $puntaje_total <= 4) {
            $valoracion = "Parece que tu nivel de ansiedad es mínimo o inexistente. ¡Eso es genial! Sigue cuidando tu bienestar emocional y no olvides dedicar tiempo a actividades que disfrutes.";
        } elseif ($puntaje_total >= 5 && $puntaje_total <= 10) {
            $valoracion = "Tu ansiedad está en el borde, es decir, puedes sentirte inquieto en algunos momentos, pero aún puedes gestionarlo. Intenta técnicas de respiración o pequeños descansos para evitar que aumente.";
        } elseif ($puntaje_total >= 11 && $puntaje_total <= 20) {
            $valoracion = "Estás experimentando ansiedad leve. No te preocupes, es algo común. Practicar ejercicios de relajación o escribir tus pensamientos puede ayudarte a mantener el equilibrio.";
        } elseif ($puntaje_total >= 21 && $puntaje_total <= 30) {
            $valoracion = "Tu ansiedad es moderada. Es importante prestar atención a lo que te está afectando. Prueba con mindfulness, actividades físicas o hablar con alguien de confianza para aliviar el estrés.";
        } elseif ($puntaje_total >= 31 && $puntaje_total <= 50) {
            $valoracion = "Estás en un nivel de ansiedad grave. Es posible que sientas mucha tensión o preocupación. No estás solo, y buscar apoyo puede marcar la diferencia. Considera hablar con un profesional o practicar hábitos saludables.";
        } elseif ($puntaje_total >= 51 && $puntaje_total <= 99) {
            $valoracion = "Tu ansiedad es extrema, e incluso puedes estar experimentando episodios de pánico. Respira profundo, recuerda que esto es temporal y que hay herramientas y personas dispuestas a ayudarte. No dudes en buscar apoyo profesional.";
        }

        //? Encriptar datos antes de enviar.
        $puntaje_total = base64_encode($puntaje_total);
        $valoracion = base64_encode($valoracion);

        //? Retornar la respuesta a resultados_test_ansiedad
        return json_encode(['resp' => 1, 'msg' => 'Respuestas guardadas correctamente', 'puntaje' => $puntaje_total, 'valoracion' => $valoracion]);
    }

    //? Funcion para guardar los datos de la encuesta de depresion
    public function encuesta_depresion()
    {
        //? Recoger las respuestas del formulario
        $respuestas = $this->request->getPost('respuestas');

        //? Verificar si todas las respuestas fueron proporcionadas
        foreach ($respuestas as $respuesta) {
            if (!isset($respuesta['puntaje']) || $respuesta['puntaje'] === 'NaN') {
                return json_encode(['resp' => 0, 'msg' => 'Hay preguntas sin responder']);
            }
        }

        //? Extraer el Id de la variable session
        $usuario = session()->get('usuario');

        //? Cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Calcular el puntaje total correctamente
        $puntaje_total = 0;
        foreach ($respuestas as $respuesta) {
            $puntaje_total += $respuesta['puntaje'];
        }

        //? Determinar el nivel de depresión
        if ($puntaje_total >= 0 && $puntaje_total <= 4) {
            $nivel_resultado = 'Mínimo o no depresión';
        } elseif ($puntaje_total >= 5 && $puntaje_total <= 10) {
            $nivel_resultado = 'Depresión al borde';
        } elseif ($puntaje_total >= 11 && $puntaje_total <= 20) {
            $nivel_resultado = 'Depresión leve';
        } elseif ($puntaje_total >= 21 && $puntaje_total <= 30) {
            $nivel_resultado = 'Depresión Moderada';
        } elseif ($puntaje_total >= 31 && $puntaje_total <= 50) {
            $nivel_resultado = 'Depresión Grave';
        } else {
            $nivel_resultado = 'Depresión Extrema-pánico';
        }

        //? Guardar las respuestas en la base de datos
        $data = [
            'id_usuario' => $usuario->id_usuario,
            'tipo' => '2',
            'puntaje_total' => $puntaje_total,
            'nivel_resultado' => $nivel_resultado
        ];

        $preguntasModel->guardar_respuestas_burns($data);

        //? Actualizar la fecha de la encuesta en la tabla pruebas_burns
        $preguntasModel->actualizar_fecha_encuesta($usuario->id_usuario, date('Y-m-d'));

        //? Validaciones para el puntaje de depresión
        $valoracion = "";

        if ($puntaje_total >= 0 && $puntaje_total <= 5) {
            $valoracion = "Tu estado emocional es estable, sin signos de depresión. ¡Sigue cultivando hábitos positivos y disfrutando de lo que te hace feliz!";
        } elseif ($puntaje_total >= 6 && $puntaje_total <= 10) {
            $valoracion = "Es normal tener momentos de tristeza o insatisfacción. Escucha tus emociones y busca actividades que te brinden bienestar y satisfacción.";
        } elseif ($puntaje_total >= 11 && $puntaje_total <= 25) {
            $valoracion = "Tienes signos de depresión mínima. Tal vez sientas algunas cargas emocionales, pero recuerda que pequeños cambios en tu rutina pueden marcar la diferencia.";
        } elseif ($puntaje_total >= 26 && $puntaje_total <= 50) {
            $valoracion = "Tu depresión es moderada. Es importante prestar atención a lo que sientes. Hablar con alguien de confianza o escribir tus pensamientos puede ayudarte a encontrar claridad.";
        } elseif ($puntaje_total >= 51 && $puntaje_total <= 75) {
            $valoracion = "Tu depresión es severa. Es comprensible que puedas sentirte abrumado, pero no estás solo. Buscar apoyo puede ser un paso clave para empezar a sentirte mejor.";
        } elseif ($puntaje_total >= 76 && $puntaje_total <= 100) {
            $valoracion = "Estás experimentando una depresión extrema. Puede ser difícil manejarlo solo, pero hay personas y recursos dispuestos a ayudarte. No dudes en buscar apoyo profesional.";
        }

        //? Encriptar datos antes de enviar.
        $puntaje_total = base64_encode($puntaje_total);
        $valoracion = base64_encode($valoracion);

        //? Retornar la respuesta a resultados_test_depresion
        return json_encode(['resp' => 1, 'msg' => 'Respuestas guardadas correctamente', 'puntaje' => $puntaje_total, 'valoracion' => $valoracion]);
    }

    //? Funcion para cargar la vista de seleccion de test
    public function seleccion_test()
    {
        $this->vista('test/seleccion_test');
    }
}
