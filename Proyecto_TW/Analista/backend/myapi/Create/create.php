<?php
namespace TECWEB\MYAPI\Create;

use TECWEB\MYAPI\dataBase;

require_once __DIR__ . '/../database.php';

class Create extends Database {
    public function __construct($db, $user = 'root', $pass = 'Anime2905') {
        parent::__construct($db, $user, $pass);
    }

    public function add($jsonOBJ) {
        $this->data = array(
            'status'  => 'error',
            'message' => 'Ocurrió un error inesperado.'
        );

        if (isset($jsonOBJ->Id, $jsonOBJ->Ubicacion, $jsonOBJ->Descripcion, $jsonOBJ->Prioridad, $jsonOBJ->Imagen)) {
            $id = $this->conexion->real_escape_string($jsonOBJ->Id);
            $ubicacion = $this->conexion->real_escape_string($jsonOBJ->Ubicacion);
            $descripcion = $this->conexion->real_escape_string($jsonOBJ->Descripcion);
            $prioridad = $this->conexion->real_escape_string($jsonOBJ->Prioridad);
            $porcentaje = $this->conexion->real_escape_string($jsonOBJ->Porcentaje);
            $imagen = $this->conexion->real_escape_string($jsonOBJ->Imagen);

            $this->conexion->set_charset("utf8");

            $sql = "SELECT * FROM areas WHERE id = '{$id}'";
            $result = $this->conexion->query($sql);

            if ($result->num_rows == 0) {
                $sql = "INSERT INTO areas (id, ubicacion, descripcion, prioridad, porcentaje , imagen) 
                        VALUES ('{$id}', '{$ubicacion}', '{$descripcion}', '{$prioridad}',  '{$porcentaje}','{$imagen}')";

                if ($this->conexion->query($sql)) {
                    $this->data['status'] = "success";
                    $this->data['message'] = "Área agregada correctamente.";
                } else {
                    $this->data['message'] = "ERROR: No se ejecutó $sql. " . mysqli_error($this->conexion);
                }
            } else {
                $this->data['message'] = "Ya existe un área con el mismo identificador.";
            }

            $result->free();
        }

        return $this->data;
    }
}
