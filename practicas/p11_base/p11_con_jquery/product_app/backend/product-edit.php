<?php
    include('database.php');

    $data = array(
        'status' => 'error',
        'message' => 'No se pudo actualizar el producto'
    );
    $id = $_POST['producto_id'];
    $nombre = $_POST['name'];
    $descripcion = $_POST['description'];
    $jsonOBJ = json_decode($descripcion); 
    $conexion->set_charset("utf8");
    
    if (!empty($nombre)) {
        $query = "UPDATE productos SET nombre = '{$nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, 
        detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' WHERE id = {$id}"; 
        if ($conexion->query($query) === TRUE) {
            $data['status'] = "success";
            $data['message'] = "Producto actualizada correctamente";
        }
         
    } 
    echo 'status: '.$data['status'].'<br> message: '.$data['message'];
?>