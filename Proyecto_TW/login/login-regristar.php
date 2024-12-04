<?php

session_start();

if (isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . '/backend/database.php';
    $sql  ="SELECT * FROM usuarios
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . '/backend/database.php';
    $sql = sprintf("SELECT * FROM usuarios
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if ($user){
      if (password_verify($_POST["password"], $user["password_hash"])){
        session_start();

        session_regenerate_id();
        
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["rol"] = $user["rol"];

        if ($user["rol"] === "analista") {
            header("Location: ../Analista/menu.php");
        } else {
            header("Location: ../Usuario_comun/Monitoreo_Usuario.html");
        }
        exit;
      }
    }
    $is_invalid = true;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>Login/Regristo</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
   
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    </head>
    <body>
    
    <div class="container">
        <header class="blog-header py-3">
            <div class="row justify-content-center align-items-center" style="height: 150px;">
                <div class="col-4 d-flex flex-column justify-content-center align-items-center" id="logoContainer">
                    <a href="#">
                        <img src="../css/img/t.webp" alt="Rehabitad" class="small-image" style="width: 90px; height: auto;">
                    </a>
                    <a class="blog-header-logo text-dark mt-2" href="#">Rehabitad</a>
                </div>
            </div>
        </header>
        <!---INICIO DE SECION-->
        <div class="d-flex justify-content-center mb-3">
        <label class="switch">
            <input type="checkbox" id="toggleForm" onchange="toggleForms()">
            <span class="slider round"></span>
        </label>
        <span id="formLabel" class="ms-2">Iniciar sesión</span>
        </div>
    
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-login" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Iniciar sesión</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Registrar</a>
        </li>
        </ul>
    
        <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <!-- Formulario de inicio de sesión -->
    
            <?php if ($is_invalid): ?>
                <em>Inicio de sesion invalido</em>
            <?php endif; ?>
    
            <form method="POST">
            <!-- Contenido del formulario de inicio de sesión aquí -->
            
            <p class="text-center">Ingrese sus datos:</p>
            <div class="form-outline mb-4">
                <input type="email" name="email" id="email"  class="form-control" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
    
                <label class="form-label" for="loginName">Correo o usuario</label>
            </div>
            <div class="form-outline mb-4">
                <input type="password" name="password" id="Password" class="form-control" />
                <label class="form-label" for="loginPassword">Contraseña</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Iniciar sesión</button>
            
            </form>
        </div>
        
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <!-- Formulario de registro -->
                <form action="https://localhost/tecweb/Proyecto_TW/login/backend/process-signup.php" method="POST" id="signup" novalidate>
                
                <p class="text-center">Ingrese sus Datos</p>
                <div class="form-outline mb-4">
                    <input type="text"id="name" name="name" class="form-control" />
                    <label class="form-label" for="registerName">Nombre</label>
                </div>
                
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" />
                    <label class="form-label" for="registerEmail">Correo</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="password"name="password" id="password" class="form-control" />
                    <label class="form-label" for="registerPassword">Contraseña</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="password"  id="password_confirmation" name="password_confirmation" class="form-control" />
                    <label class="form-label" for="registerRepeatPassword">Repite la contraseña</label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block mb-3">Registrarse</button>
                </form>
                <script src="js/validation.js" defer></script>
            </div>
        </div>
    
            <!--fIN INICIO DE SECION-->
            <script src="js/style.js" defer></script>
            </div>
        </div>
    
    </body>
</html>