<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 6</title>
    <style type="text/css">
        ol, ul { 
      list-style-type: none;
        }
    </style>
</head>
<body>
    <h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
    sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
    bienvenida apropiado. Por ejemplo:</p>
    <p><em>Bienvenida, usted está en el rango de edad permitido.</em></p>
    <p>En caso contrario, deberá devolverse otro mensaje indicando el error.</p>
    <ul>
        <li>Los valores para $edad y $sexo se deben obtener por medio de un formulario en HTML.</li>
        <li>Utilizar el la Variable Superglobal $_POST (revisar documentación).</li>
    </ul>
    <b>Solucion:</b>
    <!--Formulario-->
    <h3 style="text-align:center;">FORMULARIO</h3>
    <form action="respuesta1.php" method="post">
        <fieldset>
            <legend>Información Personal</legend>
            <ul>
                <li>Nombre: <input type="text" name="nombre"></li>
                <li>Apellido Paterno: <input type="text" name="apellido1"></li>
                <li>Apellido Materno: <input type="text" name="apellido2"></li>
                <li>Sexo: 
                    <select name="sexo">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </li>
                <li>Edad: <input type="number" name="edad"></li>
                <li>Telefono: <input type="text" name="telefono"></li>
                <li>Correo: <input type="text" name="correo"></li>
                <li>Dirección: <input type="text" name="direccion"></li>
                <li><br>
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Reiniciar">
                </li>
            </ul>
        </fieldset>
    </form>
</body>
</html>