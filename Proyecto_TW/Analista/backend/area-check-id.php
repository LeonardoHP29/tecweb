<?php
    use TECWEB\MYAPI\READ\Read as Read;
    require_once __DIR__ . '/vendor/autoload.php';
    
    $areas = new Read('rehabitadv2');
    if (isset($_POST['id'])) {
        $jsonData = $_POST['id']; 
        $areas->check_id($jsonData); 
        echo $areas->getData();
    } else {
        echo json_encode(['error' => 'ID no proporcionado']);
    }
?>