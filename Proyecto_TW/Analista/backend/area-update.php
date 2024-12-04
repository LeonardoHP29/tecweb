<?php
    use TECWEB\MYAPI\UPDATE\Update as Update;
    require_once __DIR__ . '/vendor/autoload.php';

    $areas = new Update('rehabitadv2');
    $areas->edit( json_decode( json_encode($_POST) ) );
    echo $areas->getData();
?>
