<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'Anime2905',
        'rehabitadv2'
    );
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>