<?php

$host = "localhost";
$dbname = "rehabitadv2";
$username = "root";
$password = "Anime2905";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno){
    die("Error de conexion: " . $mysqli->connect_error);
}

return $mysqli;