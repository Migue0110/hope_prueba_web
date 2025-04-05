<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_model extends Model
{

    protected $table = 'usuarios';
    protected $id = 'id';
    protected $fecha_inicial = 'fecha_encuesta_inicial';
    protected $allowedFields = ['correo', 'token'];

    /**
     * ? Funcion para registrar un usuario en la base de datos
     * @param array $datos
     * @return void
     */
    public function registrar($datos)
    {
        $this->db->table($this->table)->insert($datos);
    }

    /**
     * ? Funcion para traer un usuario por su correo
     * @param string $correo
     * @return object
     */
    public function obtener_usuario($correo)
    {
        return $this->db->table($this->table)
            ->where('correo', $correo)
            ->get()
            ->getRow();
    }

    /**
     * ? Funcion para actualizar un usuario
     * @param array $datos
     * @param int $id
     * @return void
     */
    public function actualizar_usuario($datos, $id)
    {
        $this->db->table($this->table)
            ->where($this->id, $id)
            ->update($datos);
    }
    
    /**
     * ? Funcion para actualizar la fecha de la encuesta
     * @param int $id
     * @param string $fecha_inicial
     * @return void
     */
    public function actualizar_fecha_encuesta($id, $fecha_inicial)
    {
        return $this->db->table('usuarios')
            ->where($this->id, $id)
            ->update(['fecha_encuesta_inicial' => $fecha_inicial]);
    }

}