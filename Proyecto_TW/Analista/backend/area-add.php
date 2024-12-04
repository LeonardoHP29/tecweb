<?php
    use TECWEB\MYAPI\CREATE\Create as Create;
    require_once __DIR__ . '/vendor/autoload.php';
    $areas = new Create('rehabitadv2');
    $areas->add( json_decode( json_encode($_POST) ) );
    echo $areas->getData();
?>
