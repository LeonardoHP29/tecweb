<?php
    include('database.php');

    $search = $_POST['search'];

    if(!empty($search)){
        $query = "SELECT * FROM areas WHERE Id LIKE '%{$search}%'";
        $result = mysqli_query($conexion, $query);
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
                'imagen'=> $row['Imagen']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring; 
    }
?>