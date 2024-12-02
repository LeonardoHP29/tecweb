<?php
    include('database.php');
    $data = array(
        'status' => 'error',
        'message' => 'Ocurrió un error inesperado.'
    );

    if (isset($_POST['Id']) && isset($_POST['Ubicacion']) && isset($_POST['Descripcion']) && isset($_POST['Prioridad']) && isset($_POST['Imagen'])) {
        $id = $_POST['Id'];
        $ubicacion = $_POST['Ubicacion'];
        $descripcion = $_POST['Descripcion'];
        $prioridad = $_POST['Prioridad'];
        $imagen = $_POST['Imagen'];

        $conexion->set_charset("utf8");
        $sql = "SELECT * FROM areas WHERE id = '{$id}'"; 
        $result = $conexion->query($sql);

        if ($result->num_rows == 0) { 
            $sql = "INSERT INTO areas (id, ubicacion, descripcion, prioridad, imagen) 
                    VALUES ('{$id}', '{$ubicacion}', '{$descripcion}', '{$prioridad}', '{$imagen}')";

            if ($conexion->query($sql)) {
                $data['status'] = "success";
                $data['message'] = "Area agregada correctamente";
            } else {
                $data['message'] = "No se ejecutó $sql. " . mysqli_error($conexion);
            }
        } else {
            $data['message'] = "Ya existe un área con el mismo identificador.";
        }
        $result->free();
    }

    $conexion->close();
    echo json_encode($data); 
?>
