<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'Anime2905',
        'marketzone'
    );
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>