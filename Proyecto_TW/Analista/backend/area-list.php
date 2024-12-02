<?php
    include('database.php');
    $result = mysqli_query($conexion, "SELECT * FROM areas");
    if(!$result){
        die('Query Failed: '.mysqli_error($conexion));
    }
    $arreglo = array();
    while($row = mysqli_fetch_array($result)){
        $arreglo[] = array(
            'id'=> $row['Id'],
            'ubicacion'=> $row['Ubicacion'], 
            'descripcion'=> $row['Descripcion'],
            'prioridad'=> $row['Prioridad'],
            'imagen'=> $row['Imagen']
        );
    }
    $jsonstring = json_encode($arreglo);
    echo $jsonstring;
    
?>