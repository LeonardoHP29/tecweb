<?php
    include('database.php');
    if (isset($_POST['id'])) {
        $id = $conexion->real_escape_string($_POST['id']);
        $consulta = "SELECT Id FROM areas WHERE Id = '$id'";
        $resultado = $conexion->query($consulta);
    
        if ($resultado->num_rows > 0) {
            echo 'existe';
        } else {
            echo 'disponible';
        }
    }
?>