<?php
    include('database.php');

    $id= $_POST['id'];
    $query = "SELECT * FROM areas WHERE Id='$id'";
    $result= mysqli_query($conexion,$query);
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
        'imagen'=> $row['Imagen']
    );

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>