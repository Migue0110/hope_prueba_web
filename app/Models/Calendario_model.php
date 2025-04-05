<?php

namespace App\Models;

use CodeIgniter\Model;

class Calendario_model extends Model
{
    protected $table = 'calendario_emocional';
    protected $id = 'id_usuario';
    protected $fecha = 'fecha';
    protected $emocion = 'estado_emocional';
    protected $texto = 'descripcion';

    /**
     * ? Funcion para guardar la fecha, reflexion y estado emocional del usuario
     * @param array $datos
     * @return void
     */
    public function guardar_fecha_emocion($datos)
    {
        $this->db->table($this->table)->insert($datos);
    }

    /**
     * ? Funcion para obtener los estados emocionales del usuario
     * @param int $id_usuario
     * @return array
     */
    public function obtener_estados($id_usuario)
    {
        return $this->db->table($this->table)
            ->select('DAY(fecha) AS dia, estado_emocional, id_registro, descripcion')
            ->where($this->id, $id_usuario)
            ->where('MONTH(fecha)', date('m'))
            ->where('YEAR(fecha)', date('Y'))
            ->orderBy('fecha', 'ASC')
            ->get()
            ->getResultArray();
    }

    /**
     * ? Funcion para actualizar la reflexión del dia actual
     * @param int $id_registro
     * @param array $datos
     * return void
     */
    public function actualizar_reflexion($id_registro, $datos)
    {
        $this->db->table($this->table)
            ->where('id_registro', $id_registro)
            ->update($datos);
    }

    
}
