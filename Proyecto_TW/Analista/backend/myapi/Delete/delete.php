<?php
namespace TECWEB\MYAPI\Delete;

use TECWEB\MYAPI\dataBase;

require_once __DIR__ . '/../database.php';

class Delete extends Database {
    public function __construct($db, $user = 'root', $pass = 'Anime2905') {
        parent::__construct($db, $user, $pass);
    }

    public function delete($id) {
        $this->data = array(
            'status'  => 'error',
            'message' => 'La consulta falló'
        );
        if( isset($id) ) {
            $id = $this->conexion->real_escape_string($id);
            $sql = "DELETE FROM areas WHERE Id = '{$id}'";
            if ( $this->conexion->query($sql) ) {
                $this->data['status'] =  "success";
                $this->data['message'] =  "Area eliminada";
            } else {
                $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        } 
    }
}
