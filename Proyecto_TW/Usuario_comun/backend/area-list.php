<?php
    use TECWEB\MYAPI\READ\Read as Read;
    require_once __DIR__ . '/vendor/autoload.php';
    $areas = new Read('rehabitadv2');
    $areas->list();
    echo $areas->getData();
    
?>