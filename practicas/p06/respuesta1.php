<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Practica 6</title>
        <style type="text/css">
            p, li, ul, h2 {
                color: #FFFFFF; 
            }
        </style>
    </head>
    <?php
        echo "<h2 style='text-align:center;'>RESPUESTA DEL FORMULARIO</h2>";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $ap1 = $_POST['apellido1'];
            $ap2 = $_POST['apellido2'];
            $sexo = $_POST['sexo'];
            $edad = $_POST['edad'];
            $tel = $_POST['telefono'];
            $correo = $_POST['correo'];
            $dir = $_POST['direccion'];
        }
        if ($edad >= 18 && $edad <= 35) {
            $color_fondo="green";
            if($sexo == "Masculino"){
                echo "<p>Bienvenido, usted está en el rango de edad permitido.</p>";
            }else{
                echo "<p>Bienvenida, usted está en el rango de edad permitido.</p>";
            }
            echo "<p>Esta es tu informacion personal:</p>";
            echo "<ul>";
            echo '<li>Nombre: '.$nombre.'</li>';
            echo '<li>Apellido Paterno: '.$ap1.'</li>';
            echo '<li>Apellido Materno: '.$ap2.'</li>';
            echo '<li>Sexo: '.$sexo.'</li>';
            echo '<li>Edad: '.$edad.'</li>';
            echo '<li>Telefono: '.$tel.'</li>';
            echo '<li>Correo: '.$correo.'</li>';
            echo '<li>Dirrección: '.$dir.'</li>';
            echo "</ul>";
        } else {
            $color_fondo="red";
            echo "<p>Error: no cumple con los criterios solicitados.</p>";
        }
    ?>
    <body style="background-color: <?php echo $color_fondo; ?>">
    </body>
</html>