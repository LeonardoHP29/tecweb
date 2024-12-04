<?php
    namespace TECWEB\MYAPI\Update;

    use TECWEB\MYAPI\DataBase;
    require_once __DIR__ . '/../database.php';

    class Update extends Database {
        public function __construct($db, $user='root', $pass='Anime2905') {
            parent::__construct($db, $user, $pass);
        }
    
        public function edit($jsonOBJ) {
            $this->data = array(
                'status' => 'error',
                'message' => 'Ocurrió un error inesperado.'
            );
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if( isset($jsonOBJ->Id) ) {
                    $id = $jsonOBJ->Id;
                    $ubicacion = isset($jsonOBJ->Ubicacion) ? $jsonOBJ->Ubicacion : '';
                    $descripcion = isset($jsonOBJ->Descripcion) ? $jsonOBJ->Descripcion : '';
                    $prioridad = isset($jsonOBJ->Prioridad) ? $jsonOBJ->Prioridad : '';
                    $porcentaje = isset($jsonOBJ->Porcentaje) ? $jsonOBJ->Porcentaje : '';
                    $imagen = isset($jsonOBJ->Imagen) ? $jsonOBJ->Imagen : '';
    
                    $id = mysqli_real_escape_string($this->conexion, $id);
                    $ubicacion = mysqli_real_escape_string($this->conexion, $ubicacion);
                    $descripcion = mysqli_real_escape_string($this->conexion, $descripcion);
                    $prioridad = mysqli_real_escape_string($this->conexion, $prioridad);
                    $porcentaje = mysqli_real_escape_string($this->conexion, $porcentaje);
                    $imagen = mysqli_real_escape_string($this->conexion, $imagen);
    
                    $sql = "UPDATE areas SET Ubicacion = '$ubicacion', Descripcion = '$descripcion', Prioridad = '$prioridad', Porcentaje = '$porcentaje' ,Imagen = '$imagen' WHERE Id = '$id'";
    
                    $this->conexion->set_charset("utf8");
    
                    if ($this->conexion->query($sql)) {
                        $this->data['status'] = 'success';
                        $this->data['message'] = 'Area actualizada correctamente.';
                    } else {
                        $this->data['message'] = 'Error al ejecutar la consulta de actualización: ' . mysqli_error($this->conexion);
                    }
    
                    $this->conexion->close();
                }
            }
        }
    }
    
?>