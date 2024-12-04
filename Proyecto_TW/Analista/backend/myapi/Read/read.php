<?php
    namespace TECWEB\MYAPI\Read;
    use TECWEB\MYAPI\DataBase;
    require_once __DIR__ . '/../database.php';

    class Read extends Database {
        public function __construct($db, $user='root', $pass='Anime2905') {
            parent::__construct($db, $user, $pass);
        }
        public function list() {
            $result = mysqli_query($this->conexion, "SELECT * FROM areas");
            if(!$result){
                die('Query Failed: '.mysqli_error($this->conexion));
            }
            $arreglo = array();
            while($row = mysqli_fetch_array($result)){
                $arreglo[] = array(
                    'id'=> $row['Id'],
                    'ubicacion'=> $row['Ubicacion'], 
                    'descripcion'=> $row['Descripcion'],
                    'prioridad'=> $row['Prioridad'],
                    'porcentaje'=> $row['Porcentaje'],
                    'imagen'=> $row['Imagen'],
                );
            }
                $this->data=$arreglo;
            }
            public function check_id($jsonOBJ) {
                header('Content-Type: application/json');
                if (isset($jsonOBJ)) {
                    // Escapar el id de la entrada
                    $id = $this->conexion->real_escape_string($jsonOBJ);
                    
                    // Realizar la consulta para verificar si el ID existe
                    $consulta = "SELECT Id FROM areas WHERE Id = '$id'";
                    $resultado = $this->conexion->query($consulta);
            
                    // Crear un arreglo de respuesta
                    $arreglo = array();
            
                    if ($resultado->num_rows > 0) {
                        $arreglo['resultado'] = 'existe';
                    } else {
                        $arreglo['resultado'] = 'disponible';
                    }
            
                    $this->data = $arreglo; 
                }
            }
    }  
?>