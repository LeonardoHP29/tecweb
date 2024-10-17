<?php
include_once __DIR__ . '/database.php';

// SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
$data = array();

// SE VERIFICA HABER RECIBIDO LA BÚSQUEDA
if (isset($_POST['search'])) {
    $search = $_POST['search'];

    // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    if ($result = $conexion->query("SELECT * FROM productos WHERE nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%'")) {
        
        // SE OBTIENEN LOS RESULTADOS
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
            $data[] = array_map('utf8_encode', $row); // Codifica y agrega cada fila al arreglo
        }

        $result->free();
    } else {
        die('Query Error: ' . $conexion->error);
    }
    
    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
if (empty($data)) {
    echo json_encode(["message" => "No se encontraron resultados."], JSON_PRETTY_PRINT);
} else {
    echo json_encode($data, JSON_PRETTY_PRINT);
}
?>
