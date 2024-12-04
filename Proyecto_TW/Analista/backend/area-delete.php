<?php
    use TECWEB\MYAPI\DELETE\Delete as Delete;
    header('Content-Type: application/json');
    require_once __DIR__ . '/vendor/autoload.php';
    
    $area = new Delete('rehabitadv2');
    $area->delete( $_POST['id'] );
    echo $area->getData();
?>