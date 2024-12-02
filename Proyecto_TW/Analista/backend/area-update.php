<?php
include('database.php');

$data = array(
    'status' => 'error',
    'message' => 'Ocurrió un error inesperado.'
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['Id'];  
    $ubicacion = $_POST['Ubicacion'];  
    $descripcion = $_POST['Descripcion'];  
    $prioridad = $_POST['Prioridad'];  
    $imagen = $_POST['Imagen'];  

    $id = mysqli_real_escape_string($conexion, $id);
    $ubicacion = mysqli_real_escape_string($conexion, $ubicacion);
    $descripcion = mysqli_real_escape_string($conexion, $descripcion);
    $prioridad = mysqli_real_escape_string($conexion, $prioridad);
    $imagen = mysqli_real_escape_string($conexion, $imagen);

    $sql = "UPDATE areas SET ubicacion = '$ubicacion', descripcion = '$descripcion', prioridad = '$prioridad', imagen = '$imagen' WHERE id = '$id'";

    if ($result = $conexion->query($sql)) {
        $data = array(
            'status' => 'success',
            'message' => 'Producto actualizado correctamente.'
        );
    } else {
        $data = array(
            'status' => 'error',
            'message' => 'Error al ejecutar la consulta de actualización.'
        );
    }
}

$conexion->close();
echo json_encode($data);
?>
