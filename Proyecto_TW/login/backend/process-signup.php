<?php

function enviar_alerta($mensaje) {
    echo "<script>alert('$mensaje'); window.history.back();</script>";
    exit;
}

if (empty($_POST["name"])) {
    enviar_alerta("Se requiere nombre");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    enviar_alerta("El correo electrónico no es válido");
}

if (strlen($_POST["password"]) < 8) {
    enviar_alerta("La contraseña debe tener al menos 8 caracteres");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    enviar_alerta("La contraseña debe contener al menos una letra");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    enviar_alerta("La contraseña debe contener al menos un número");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    enviar_alerta("Las contraseñas no coinciden");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO usuarios (nombre, email, password_hash, rol)
        VALUES (?, ?, ?, 'usuario_comun')";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    enviar_alerta("Error de SQL: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

if ($stmt->execute()) {
    header("Location: https://localhost/tecweb/Proyecto_TW/login/login-regristar.php");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        enviar_alerta("El correo electrónico ya está registrado");
    } else {
        enviar_alerta("Error: " . $mysqli->error . " (" . $mysqli->errno . ")");
    }
}
