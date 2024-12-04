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
                    'imagen'=> $row['Imagen']
                );
            }
            $this->data=$arreglo;
        }
        public function search($search){
            if(!empty($search)){
                $query = "SELECT * FROM areas WHERE Id LIKE '%{$search}%'";
                $result = mysqli_query($this->conexion, $query);
                if(!$result){
                    die('Query Failed'. mysqli_error($conexion));
                }
                $json = array();
                while($row = mysqli_fetch_array($result)){
                    $json[] = array(
                        'id'=> $row['Id'],
                        'ubicacion'=> $row['Ubicacion'], 
                        'descripcion'=> $row['Descripcion'],
                        'prioridad'=> $row['Prioridad'],
                        'porcentaje'=> $row['Porcentaje'],
                        'imagen'=> $row['Imagen']
                    );
                }
                $this->data=$json;
            }
        }
        public function single($id){
            $query = "SELECT * FROM areas WHERE Id='$id'";
            $result= mysqli_query($this->conexion,$query);
            if(!$result){
                die('Query Failed');
            }
            $json = array();
            $row = mysqli_fetch_array($result);
            $json = array(
                'id'=> $row['Id'],
                'ubicacion'=> $row['Ubicacion'], 
                'descripcion'=> $row['Descripcion'],
                'prioridad'=> $row['Prioridad'],
                'porcentaje'=> $row['Porcentaje'],
                'imagen'=> $row['Imagen']
            );

            $this->data=$json;
        }
    } 
?>