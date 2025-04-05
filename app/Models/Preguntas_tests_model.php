<?php

namespace App\Models;

use CodeIgniter\Model;

class Preguntas_tests_model extends Model
{

    protected $table = 'preguntas_tests';
    protected $tabla_intermedia = 'usuarios_preguntas';
    protected $tabla_burns = 'pruebas_burns';
    protected $id = 'id';
    protected $fecha = 'fecha_prueba';

    /**
     * ? funcion para traer las preguntas dependiendo la encuesta
     * @param enum $encuesta
     * @return object
     */
    public function obtener_preguntas($encuesta)
    {
        return $this->db->table($this->table)
            ->where('encuesta', $encuesta)
            ->get()
            ->getResult();
    }

    /**
     * ? funcion para guardar las respuestas dependiendo la encuesta
     * @param array $data
     * @return void
     */
    public function guardar_respuestas($data)
    {
        $this->db->table($this->tabla_intermedia)->insert($data);
    }

    /**
     * ? funcion para guardar las respuestas del test de burns
     * @param array $data
     * @return void
     */
    public function guardar_respuestas_burns($data)
    {
        $this->db->table($this->tabla_burns)->insert($data);
    }

    /**
     * ? Funcion para actualizar la fecha en la que se hizo la encuesta
     * @param int $id
     * @param string $fecha
     * @return void
     */
    public function actualizar_fecha_encuesta($id, $fecha)
    {
        return $this->db->table('pruebas_burns')
            ->where($this->id, $id)
            ->update(['fecha_prueba' => $fecha]);
    }
}
