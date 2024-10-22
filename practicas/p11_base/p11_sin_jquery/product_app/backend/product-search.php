<?php
    include_once __DIR__.'/database.php';

       // Lógica de buscar un producto
       $search = $_POST['search'];
       if(!empty($search)){
           $search = mysqli_real_escape_string($conexion, $search);

           $query = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
           $result = mysqli_query($conexion, $query);

           if(!$result) {
               die('Query Error: '.mysqli_error($conexion)); 
           }

           $json = array();
           while($row = mysqli_fetch_array($result)){
               $json[] = array(
                   'id' => $row['id'],
                   'nombre' => $row['nombre'],
                   'marca' => $row['marca'],
                   'modelo' => $row['modelo'],
                   'precio' => $row['precio'],
                   'detalles' => $row['detalles'],
                   'unidades' => $row['unidades']
               );
           }
       $jsonstring = json_encode($json);
       echo $jsonstring;
   }
?>